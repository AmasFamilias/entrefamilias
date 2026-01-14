<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class FileValidatorService
{
    /**
     * MIME types permitidos por tipo de archivo
     */
    private const ALLOWED_MIME_TYPES = [
        'image' => ['image/jpeg', 'image/jpg', 'image/png'],
        'pdf' => ['application/pdf'],
    ];

    /**
     * Magic bytes para validar tipos de archivo
     */
    private const MAGIC_BYTES = [
        'image/jpeg' => ["\xFF\xD8\xFF"],
        'image/png' => ["\x89\x50\x4E\x47\x0D\x0A\x1A\x0A"],
        'application/pdf' => ["%PDF"],
    ];

    /**
     * Patrones peligrosos que indican código ejecutable
     */
    private const DANGEROUS_PATTERNS = [
        '<?php',
        '<?=',
        '<? ',
        '<script',
        'eval(',
        'exec(',
        'system(',
        'shell_exec(',
        'passthru(',
        'proc_open(',
        'popen(',
    ];

    /**
     * Valida que un archivo de imagen es realmente una imagen
     */
    public function validateImage(UploadedFile $file): array
    {
        $errors = [];

        // Validar MIME type
        $mimeType = $file->getMimeType();
        if (!in_array($mimeType, self::ALLOWED_MIME_TYPES['image'])) {
            $errors[] = 'El archivo no es una imagen válida (JPEG o PNG).';
            return ['valid' => false, 'errors' => $errors];
        }

        // Validar magic bytes
        if (!$this->validateMagicBytes($file, $mimeType)) {
            $errors[] = 'El contenido del archivo no coincide con su tipo MIME.';
            return ['valid' => false, 'errors' => $errors];
        }

        // Validar que no contiene código ejecutable
        if ($this->containsDangerousContent($file)) {
            $errors[] = 'El archivo contiene contenido potencialmente peligroso.';
            Log::warning('Intento de subir archivo con contenido peligroso', [
                'user_id' => auth()->id(),
                'filename' => $file->getClientOriginalName(),
                'mime_type' => $mimeType,
            ]);
            return ['valid' => false, 'errors' => $errors];
        }

        return ['valid' => true, 'errors' => []];
    }

    /**
     * Valida que un archivo PDF es realmente un PDF
     */
    public function validatePdf(UploadedFile $file): array
    {
        $errors = [];

        // Validar MIME type
        $mimeType = $file->getMimeType();
        if (!in_array($mimeType, self::ALLOWED_MIME_TYPES['pdf'])) {
            $errors[] = 'El archivo no es un PDF válido.';
            return ['valid' => false, 'errors' => $errors];
        }

        // Validar magic bytes
        if (!$this->validateMagicBytes($file, $mimeType)) {
            $errors[] = 'El contenido del archivo no coincide con su tipo MIME.';
            return ['valid' => false, 'errors' => $errors];
        }

        // Validar que no contiene código ejecutable
        if ($this->containsDangerousContent($file)) {
            $errors[] = 'El archivo contiene contenido potencialmente peligroso.';
            Log::warning('Intento de subir PDF con contenido peligroso', [
                'user_id' => auth()->id(),
                'filename' => $file->getClientOriginalName(),
                'mime_type' => $mimeType,
            ]);
            return ['valid' => false, 'errors' => $errors];
        }

        return ['valid' => true, 'errors' => []];
    }

    /**
     * Valida magic bytes del archivo
     */
    private function validateMagicBytes(UploadedFile $file, string $mimeType): bool
    {
        if (!isset(self::MAGIC_BYTES[$mimeType])) {
            return false;
        }

        $fileHandle = fopen($file->getRealPath(), 'rb');
        if (!$fileHandle) {
            return false;
        }

        $header = fread($fileHandle, 10);
        fclose($fileHandle);

        if ($header === false) {
            return false;
        }

        $expectedBytes = self::MAGIC_BYTES[$mimeType];
        foreach ($expectedBytes as $magicBytes) {
            if (strpos($header, $magicBytes) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Verifica si el archivo contiene contenido peligroso
     */
    private function containsDangerousContent(UploadedFile $file): bool
    {
        $fileHandle = fopen($file->getRealPath(), 'rb');
        if (!$fileHandle) {
            return true; // Si no podemos leer, asumimos peligroso
        }

        // Leer solo los primeros 8192 bytes para verificar
        $content = fread($fileHandle, 8192);
        fclose($fileHandle);

        if ($content === false) {
            return true;
        }

        // Convertir a minúsculas para búsqueda case-insensitive
        $contentLower = strtolower($content);

        foreach (self::DANGEROUS_PATTERNS as $pattern) {
            if (strpos($contentLower, strtolower($pattern)) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Sanitiza el nombre de archivo
     */
    public function sanitizeFileName(string $fileName): string
    {
        // Eliminar caracteres peligrosos
        $fileName = preg_replace('/[^a-zA-Z0-9._-]/', '', $fileName);
        
        // Limitar longitud
        $fileName = substr($fileName, 0, 255);
        
        // Eliminar puntos múltiples
        $fileName = preg_replace('/\.{2,}/', '.', $fileName);
        
        return $fileName;
    }

    /**
     * Genera un nombre de archivo único y seguro
     */
    public function generateSafeFileName(UploadedFile $file, string $prefix = 'file'): string
    {
        $extension = $file->getClientOriginalExtension();
        $extension = $this->sanitizeFileName($extension);
        
        // Solo permitir extensiones seguras
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf'];
        if (!in_array(strtolower($extension), $allowedExtensions)) {
            $extension = 'bin';
        }

        return uniqid($prefix . '_', true) . '_' . time() . '.' . $extension;
    }
}
