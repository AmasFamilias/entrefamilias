<?php
namespace App\Livewire;

use App\Models\User;
use App\Models\Mensaje;
use App\Models\Vacante;
use App\Models\Candidato;
use Livewire\Component;
use App\Notifications\NuevoMensaje;
use Livewire\WithFileUploads; // Importar el trait para manejo de archivos
use App\Services\FileValidatorService;
use Illuminate\Support\Facades\RateLimiter;

class Messenger extends Component
{
    use WithFileUploads;

    public $vacante_id;
    public $user_id;
    public $message;
    public $messages;
    public $archivo;

    protected $rules = [
        'message' => 'required|string|max:1000', // Aumentado de 255 a 1000 caracteres
        'archivo' => 'nullable|file|mimes:pdf|max:10240', // Validación para asegurarse de que es un PDF
    ];

    public function mount($vacante_id, $user_id)
    {
        // Validar que la vacante existe
        $vacante = Vacante::findOrFail($vacante_id);
        
        // Validar que el usuario existe
        $user = User::findOrFail($user_id);
        
        $usuarioAutenticado = auth()->id();
        
        // Verificar autorización: el usuario debe estar relacionado con la vacante o el mensaje
        // Casos permitidos:
        // 1. El usuario es el propietario de la vacante
        // 2. El usuario es el otro participante en la conversación (user_id)
        // 3. El usuario es candidato de la vacante Y está intentando hablar con el propietario
        // 4. Hay mensajes entre el usuario autenticado y el user_id para esta vacante
        
        $esPropietario = $vacante->user_id === $usuarioAutenticado;
        $esParticipante = (int)$user_id === $usuarioAutenticado;
        $esPropietarioVacante = $vacante->user_id === (int)$user_id;
        
        // Si no es propietario ni participante directo, verificar otras condiciones
        if (!$esPropietario && !$esParticipante) {
            // Verificar si el usuario es candidato de la vacante
            // Y está intentando hablar con el propietario de la vacante
            $esCandidato = Candidato::where('vacante_id', $vacante_id)
                ->where('user_id', $usuarioAutenticado)
                ->exists();
            
            // Si es candidato y está intentando hablar con el propietario, permitir acceso
            if ($esCandidato && $esPropietarioVacante) {
                // Permitir acceso: candidato hablando con propietario
            }
            // Si no, verificar si hay mensajes entre estos usuarios
            else {
                $tieneMensajes = Mensaje::where('vacante_id', $vacante_id)
                    ->where(function($query) use ($usuarioAutenticado, $user_id) {
                        $query->where(function($q) use ($usuarioAutenticado, $user_id) {
                            $q->where('sender_id', $usuarioAutenticado)
                              ->where('receiver_id', $user_id);
                        })->orWhere(function($q) use ($usuarioAutenticado, $user_id) {
                            $q->where('sender_id', $user_id)
                              ->where('receiver_id', $usuarioAutenticado);
                        });
                    })->exists();
                
                // Si no hay mensajes, denegar acceso
                if (!$tieneMensajes) {
                    abort(403, 'No tienes permiso para acceder a esta conversación.');
                }
            }
        }
        
        $this->vacante_id = $vacante_id;
        $this->user_id = $user_id;
        $this->loadMessages();
    }

    public function loadMessages()
    {
        // Consulta corregida: agrupar correctamente las condiciones para que siempre filtre por vacante
        $this->messages = Mensaje::where('vacante_id', $this->vacante_id) // Filtra por vacante
                             ->where(function($query) {
                                 // Agrupar las condiciones de usuarios dentro del filtro de vacante
                                 $query->where(function($q) {
                                     // Mensajes donde el usuario autenticado es el remitente
                                     $q->where('sender_id', auth()->id())
                                       ->where('receiver_id', $this->user_id);
                                 })
                                 ->orWhere(function($q) {
                                     // Mensajes donde el usuario autenticado es el receptor
                                     $q->where('sender_id', $this->user_id)
                                       ->where('receiver_id', auth()->id());
                                 });
                             })
                             ->orderBy('created_at', 'asc')
                             ->get()
                             ->map(function($message) {
                                 return [
                                     'id' => $message->id,
                                     'sender_id' => $message->sender_id,
                                     'receiver_id' => $message->receiver_id,
                                     'message' => $message->message,
                                     'archivo' => $message->archivo,
                                     'created_at' => $message->created_at,
                                 ];
                             })
                             ->toArray(); // Convertimos los mensajes a un array con ID
    }

    public function sendMessage()
    {
        $datos = $this->validate();

        //Almacenar archivo en el disco duro y solo guardar el nombre del archivo
        if ($this->archivo) {
            // Rate limiting para subidas de archivos: máximo 20 subidas por minuto
            $key = 'upload-file:' . auth()->id();
            if (RateLimiter::tooManyAttempts($key, 20)) {
                $seconds = RateLimiter::availableIn($key);
                $this->addError('archivo', "Demasiadas subidas. Intenta de nuevo en {$seconds} segundos.");
                return;
            }
            
            // Incrementar contador de rate limiting solo si hay archivo
            RateLimiter::hit($key, 60); // 60 segundos = 1 minuto
            $fileValidator = new FileValidatorService();
            $validation = $fileValidator->validatePdf($this->archivo);
            
            if (!$validation['valid']) {
                foreach ($validation['errors'] as $error) {
                    $this->addError('archivo', $error);
                }
                return;
            }
            
            // Generar nombre único y seguro
            $fileName = $fileValidator->generateSafeFileName($this->archivo, 'msg');
            $archivo = $this->archivo->storeAs('public/mensajes', $fileName);
            $datos['archivo'] = basename($archivo);
        }

        // Almacenar el mensaje
        $mensaje = Mensaje::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $this->user_id,
            'vacante_id' => $this->vacante_id,
            'message' => $this->message,
            'archivo' => $datos['archivo'] ?? null,
        ]);

        // Notificar al receptor
        $receiver = User::find($this->user_id);
        $sender = auth()->user();
        $vacante = Vacante::find($this->vacante_id);

        $receiver->notify(new NuevoMensaje($vacante, $mensaje, $sender, $receiver));

        // Recargar los mensajes
        $this->loadMessages();

        // Desplazarse al final de la lista de mensajes después de enviar
        $this->dispatch('scrollToBottom');

        // Enviar un evento al frontend para limpiar el textarea
        $this->dispatch('limpiarTextarea');

        // Limpiar los campos en el backend
        $this->reset('message', 'archivo');
    }

    public function clearFields()
    {
        // Limpiar los campos de entrada
        $this->reset('message', 'archivo');
    }

    public function render()
    {
        $user = User::find($this->user_id);
        $vacante = Vacante::find($this->vacante_id);

        return view('livewire.messenger', [
            'user' => $user,
            'vacante' => $vacante,
            'messages' => $this->messages,
        ]);
    }
}
