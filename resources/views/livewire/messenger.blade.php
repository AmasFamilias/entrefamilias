<div>
   <!-- Mostrar el nombre del usuario y la vacante -->
    <div class="mb-5">
        <h3 class="text-lg font-semibold">Contactando a: {{ $user->name }}</h3>
        <p class="text-sm text-gray-600">Anuncio: {{ $vacante->titulo }}</p>
    </div>

    <!-- Mostrar mensajes existentes -->
    <div id="message-list" class="message-list space-y-4 mb-5 max-h-80 overflow-y-auto">
        @forelse($messages as $message)
            @if($message['sender_id'] == auth()->id())
                <!-- Mensajes del usuario autenticado (Emisor) -->
                <div class="flex justify-end items-start space-x-2">
                    <!-- Imagen del usuario autenticado -->
                    <img loading="lazy" 
                        src="{{ Auth::user()->profile_image ? asset('storage/profiles/' . Auth::user()->profile_image) : asset('images/datospersonales.png') }}" 
                        alt="Imagen de Perfil del Emisor" 
                        class="h-10 w-10 rounded-full object-cover border border-gray-300 shadow-sm">
                    
                    <div class="bg-indigo-500 text-white p-4 rounded-lg max-w-xs shadow">
                        <p>{{ $message['message'] }}</p>
                        @if($message['archivo'])
                            <!-- Mostrar ícono para el archivo adjunto -->
                            <a href="{{ asset('storage/mensajes/' . $message['archivo']) }}" class="text-gray-300 underline" target="_blank" rel="noopener noreferrer">
                                Ver Archivo Adjunto
                            </a>
                        @endif
                        <span class="text-xs text-gray-300 block mt-2">{{ \Carbon\Carbon::parse($message['created_at'])->diffForHumans() }}</span>
                    </div>
                </div>
            @else
                <!-- Mensajes del receptor -->
                <div class="flex justify-start items-start space-x-2">
                    <!-- Imagen del receptor -->
                    <img loading="lazy" 
                        src="{{ $user->profile_image ? asset('storage/profiles/' . $user->profile_image) : asset('images/datospersonales.png') }}" 
                        alt="Imagen de Perfil del Receptor" 
                        class="h-10 w-10 rounded-full object-cover border border-gray-300 shadow-sm">
                    
                    <div class="bg-gray-300 text-gray-800 p-4 rounded-lg max-w-xs shadow">
                        <p>{{ $message['message'] }}</p>
                        @if($message['archivo'])
                            <!-- Mostrar ícono para el archivo adjunto -->
                            <a href="{{ asset('storage/mensajes/' . $message['archivo']) }}" class="text-blue-600 underline" target="_blank" rel="noopener noreferrer">
                                Ver Archivo Adjunto
                            </a>
                        @endif
                        <span class="text-xs text-gray-600 block mt-2">{{ \Carbon\Carbon::parse($message['created_at'])->diffForHumans() }}</span>
                    </div>
                </div>
            @endif
        @empty
            <div class="p-4 bg-gray-100 rounded-lg">
                <p class="text-gray-700">No tienes mensajes aún.</p>
            </div>
        @endforelse
    </div>


<!-- Formulario de envío de mensajes -->
<form wire:submit.prevent="sendMessage">
    <div class="space-y-4">
        <div class="relative">
            <textarea 
                wire:model.defer="message" 
                id="message" 
                class="w-full p-4 border-gray-300 rounded-t-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-800" 
                rows="2" 
                placeholder="Escribe un mensaje..."
            ></textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
        </div>

        <!-- Botón para mostrar/ocultar emoji picker -->
        <button 
            type="button" 
            id="emoji-toggle" 
            class="bg-gray-200 text-gray-700 py-2 px-4 rounded-lg text-xs font-bold uppercase mt-2">
            😊 Emoji
        </button>

        <!-- Emoji Picker -->
        <div id="emoji-picker-container" class="hidden mt-2" >
            <emoji-picker class="h-64 w-full border rounded-lg"></emoji-picker>
        </div>

        <!-- Campo para adjuntar archivo -->
        <div>
            <label for="archivo" class="block text-sm font-medium text-gray-700">Adjuntar archivo (PDF)</label>
            <input 
                type="file" 
                wire:model="archivo" 
                id="archivo" 
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-800 focus:border-blue-800"
                accept=".pdf"
            />
        </div>

        <div class="flex justify-end space-x-2">
            <!-- Botón para enviar mensaje -->
            <x-primary-button wire:loading.attr="disabled">
                Enviar Mensaje
                <div 
                    wire:loading wire:target="sendMessage"
                    class="inline-block h-4 w-4 mr-1 animate-spin rounded-full border-4 border-solid 
                    border-current border-r-transparent align-[-0.125em] text-white 
                    motion-reduce:animate-[spin_1.5s_linear_infinite]" 
                    role="status">
                </div>
            </x-primary-button>
        </div>
    </div>
</form>
</div>

<!-- Script para manejar el Emoji Picker -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const emojiToggle = document.getElementById('emoji-toggle');
        const emojiPickerContainer = document.getElementById('emoji-picker-container');
        const messageInput = document.getElementById('message');
        const messageList = document.querySelector('.message-list');

        // Mostrar y ocultar el Emoji Picker
        emojiToggle.addEventListener('click', function () {
            emojiPickerContainer.classList.toggle('hidden');
        });

        // Escuchar el evento cuando se selecciona un emoji
        emojiPickerContainer.addEventListener('emoji-click', function (event) {
            const emoji = event.detail.unicode;
            messageInput.value += emoji;
            @this.set('message', messageInput.value);
        });

        // Permitir enviar el mensaje con Enter
        messageInput.addEventListener('keydown', function (event) {
            if (event.key === "Enter" && !event.shiftKey) {
                event.preventDefault(); // Evita el salto de línea en el textarea
                @this.call('sendMessage'); // Llama al método de Livewire para enviar el mensaje
            }
        });

        // Escuchar el evento de Livewire para hacer scroll al final
        window.addEventListener('scrollToBottom', function () {
            setTimeout(() => {
                messageList.scrollTop = messageList.scrollHeight;
            }, 100); // Pequeño retraso para asegurar que el mensaje nuevo se renderice
        });

        // Escuchar el evento de Livewire para limpiar el textarea
        window.addEventListener('limpiarTextarea', function () {
            borrartxt(); // Llama a la función borrartxt
        });
    });

    // Función para limpiar el textarea
    function borrartxt() {
        document.getElementById('message').value = ''; // Limpia el valor del textarea
    }
</script>
