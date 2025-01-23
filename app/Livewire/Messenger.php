<?php
namespace App\Livewire;

use App\Models\User;
use App\Models\Mensaje;
use App\Models\Vacante;
use Livewire\Component;
use App\Notifications\NuevoMensaje;
use Livewire\WithFileUploads; // Importar el trait para manejo de archivos

class Messenger extends Component
{
    use WithFileUploads;

    public $vacante_id;
    public $user_id;
    public $message;
    public $messages;
    public $archivo;

    protected $rules = [
        'message' => 'required|string|max:255',
        'archivo' => 'nullable|file|mimes:pdf|max:10240', // Validación para asegurarse de que es un PDF
    ];

    public function mount($vacante_id, $user_id)
    {
        $this->vacante_id = $vacante_id;
        $this->user_id = $user_id;
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = Mensaje::where('vacante_id', $this->vacante_id) // Filtra por vacante
                             ->where(function($query) {
                                 $query->where('sender_id', auth()->id())
                                       ->where('receiver_id', $this->user_id);
                             })
                             ->orWhere(function($query) {
                                 $query->where('sender_id', $this->user_id)
                                       ->where('receiver_id', auth()->id());
                             })
                             ->orderBy('created_at', 'asc')
                             ->get()
                             ->toArray(); // Convertimos los mensajes a un array  
    }

    public function sendMessage()
    {
        $datos = $this->validate();

        //Almacenar archivo en el disco duro y solo guardar el nombre del archivo
        if ($this->archivo) {
            $archivo = $this->archivo->store('public/mensajes');
            $datos['archivo'] = str_replace('public/mensajes/','',$archivo);
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
