<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\Vacante;
use App\Models\User;
use App\Models\Organizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    /**
     * Servir archivo de mensaje de forma segura
     */
    public function serveMessageFile($messageId, $filename): BinaryFileResponse|Response
    {
        // Validar que el ID es numérico
        if (!is_numeric($messageId)) {
            abort(404, 'Archivo no encontrado');
        }

        // Buscar el mensaje
        $mensaje = Mensaje::findOrFail($messageId);

        // Validar que el usuario tiene permiso para ver el archivo
        $usuarioAutenticado = Auth::id();
        if (!$usuarioAutenticado) {
            abort(403, 'Debes estar autenticado para acceder a este archivo.');
        }

        if ($usuarioAutenticado !== $mensaje->sender_id && $usuarioAutenticado !== $mensaje->receiver_id) {
            abort(403, 'No tienes permiso para acceder a este archivo.');
        }

        // Validar que el nombre del archivo coincide
        if (basename($mensaje->archivo) !== basename($filename)) {
            abort(404, 'Archivo no encontrado');
        }

        // Construir la ruta del archivo
        $filePath = storage_path('app/public/mensajes/' . basename($mensaje->archivo));

        // Verificar que el archivo existe
        if (!file_exists($filePath) || !is_file($filePath)) {
            abort(404, 'Archivo no encontrado');
        }

        // Validar que es realmente un PDF
        $mimeType = mime_content_type($filePath);
        if ($mimeType !== 'application/pdf') {
            abort(403, 'Tipo de archivo no permitido');
        }

        return response()->file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . basename($filename) . '"',
        ]);
    }

    /**
     * Servir imagen de perfil de forma segura
     */
    public function serveProfileImage($userId, $filename): BinaryFileResponse|Response
    {
        // Validar que el ID es numérico
        if (!is_numeric($userId)) {
            abort(404, 'Imagen no encontrada');
        }

        // Buscar el usuario
        $user = User::findOrFail($userId);

        // Sanitizar el filename para seguridad (previene path traversal)
        $filename = basename($filename);

        // Si el usuario no tiene imagen de perfil o el filename es 'datospersonales.png', servir la imagen por defecto
        if (empty($user->profile_image) || $filename === 'datospersonales.png') {
            $defaultPath = public_path('images/datospersonales.png');
            if (file_exists($defaultPath)) {
                return response()->file($defaultPath, [
                    'Content-Type' => 'image/png',
                    'Cache-Control' => 'public, max-age=31536000',
                ]);
            }
            abort(404, 'Imagen no encontrada');
        }

        // Sanitizar el nombre de imagen del usuario
        $userImageBasename = basename($user->profile_image);

        // Validar que el nombre del archivo coincide con el del usuario
        if ($userImageBasename !== $filename) {
            // Si no coincide, retornar imagen por defecto (más seguro que devolver 404)
            $defaultPath = public_path('images/datospersonales.png');
            if (file_exists($defaultPath)) {
                return response()->file($defaultPath, [
                    'Content-Type' => 'image/png',
                    'Cache-Control' => 'public, max-age=31536000',
                ]);
            }
            abort(404, 'Imagen no encontrada');
        }

        // Construir la ruta del archivo
        $filePath = storage_path('app/public/profiles/' . $userImageBasename);

        // Verificar que el archivo existe
        if (!file_exists($filePath) || !is_file($filePath)) {
            // Retornar imagen por defecto si el archivo no existe
            $defaultPath = public_path('images/datospersonales.png');
            if (file_exists($defaultPath)) {
                return response()->file($defaultPath, [
                    'Content-Type' => 'image/png',
                    'Cache-Control' => 'public, max-age=31536000',
                ]);
            }
            abort(404, 'Imagen no encontrada');
        }

        // Validar que es realmente una imagen
        $mimeType = mime_content_type($filePath);
        if (!in_array($mimeType, ['image/jpeg', 'image/jpg', 'image/png'])) {
            // Si el tipo no es válido, retornar imagen por defecto
            $defaultPath = public_path('images/datospersonales.png');
            if (file_exists($defaultPath)) {
                return response()->file($defaultPath, [
                    'Content-Type' => 'image/png',
                    'Cache-Control' => 'public, max-age=31536000',
                ]);
            }
            abort(403, 'Tipo de archivo no permitido');
        }

        return response()->file($filePath, [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    }

    /**
     * Servir imagen de vacante de forma segura
     */
    public function serveVacanteImage($vacanteId, $filename): BinaryFileResponse|Response
    {
        // Validar que el ID es numérico
        if (!is_numeric($vacanteId)) {
            abort(404, 'Imagen no encontrada');
        }

        // Buscar la vacante
        $vacante = Vacante::findOrFail($vacanteId);

        // Sanitizar el filename para seguridad (previene path traversal)
        $filename = basename($filename);

        // Si la vacante no tiene imagen o el filename es 'default-vacante.png', servir la imagen por defecto
        if (empty($vacante->imagen) || $filename === 'default-vacante.png') {
            $defaultPath = public_path('images/default-vacante.png');
            if (file_exists($defaultPath)) {
                return response()->file($defaultPath, [
                    'Content-Type' => 'image/png',
                    'Cache-Control' => 'public, max-age=31536000',
                ]);
            }
            abort(404, 'Imagen no encontrada');
        }

        // Sanitizar el nombre de imagen de la vacante
        $vacanteImageBasename = basename($vacante->imagen);

        // Validar que el nombre del archivo coincide con el de la vacante
        if ($vacanteImageBasename !== $filename) {
            // Si no coincide, retornar imagen por defecto (más seguro que devolver 404)
            $defaultPath = public_path('images/default-vacante.png');
            if (file_exists($defaultPath)) {
                return response()->file($defaultPath, [
                    'Content-Type' => 'image/png',
                    'Cache-Control' => 'public, max-age=31536000',
                ]);
            }
            abort(404, 'Imagen no encontrada');
        }

        // Construir la ruta del archivo
        $filePath = storage_path('app/public/vacantes/' . $vacanteImageBasename);

        // Verificar que el archivo existe
        if (!file_exists($filePath) || !is_file($filePath)) {
            // Retornar imagen por defecto si el archivo no existe
            $defaultPath = public_path('images/default-vacante.png');
            if (file_exists($defaultPath)) {
                return response()->file($defaultPath, [
                    'Content-Type' => 'image/png',
                    'Cache-Control' => 'public, max-age=31536000',
                ]);
            }
            abort(404, 'Imagen no encontrada');
        }

        // Validar que es realmente una imagen
        $mimeType = mime_content_type($filePath);
        if (!in_array($mimeType, ['image/jpeg', 'image/jpg', 'image/png'])) {
            // Si el tipo no es válido, retornar imagen por defecto
            $defaultPath = public_path('images/default-vacante.png');
            if (file_exists($defaultPath)) {
                return response()->file($defaultPath, [
                    'Content-Type' => 'image/png',
                    'Cache-Control' => 'public, max-age=31536000',
                ]);
            }
            abort(403, 'Tipo de archivo no permitido');
        }

        return response()->file($filePath, [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    }

    /**
     * Servir imagen de organización de forma segura
     */
    public function serveOrganizacionImage($organizacionId, $filename): BinaryFileResponse|Response
    {
        // Validar que el ID es numérico
        if (!is_numeric($organizacionId)) {
            abort(404, 'Imagen no encontrada');
        }

        // Buscar la organización
        $organizacion = Organizacion::findOrFail($organizacionId);

        // Validar que el nombre del archivo coincide
        if (basename($organizacion->imagen) !== basename($filename)) {
            abort(404, 'Imagen no encontrada');
        }

        // Construir la ruta del archivo
        $filePath = storage_path('app/public/' . $organizacion->imagen);

        // Verificar que el archivo existe
        if (!file_exists($filePath) || !is_file($filePath)) {
            // Retornar imagen por defecto
            $defaultPath = public_path('images/perfil_ong.png');
            if (file_exists($defaultPath)) {
                return response()->file($defaultPath);
            }
            abort(404, 'Imagen no encontrada');
        }

        // Validar que es realmente una imagen
        $mimeType = mime_content_type($filePath);
        if (!in_array($mimeType, ['image/jpeg', 'image/jpg', 'image/png'])) {
            abort(403, 'Tipo de archivo no permitido');
        }

        return response()->file($filePath, [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    }
}
