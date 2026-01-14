<div class="flex flex-col h-full">
    <!-- Header mejorado con información del chat -->
    <div class="bg-gradient-to-r from-amber-500 via-amber-600 to-slate-800 rounded-t-xl p-4 sm:p-6 mb-4 shadow-lg">
        <div class="flex items-center space-x-3 sm:space-x-4">
            <!-- Avatar del contacto -->
            <div class="relative">
                <img loading="lazy" 
                    src="{{ $user->profile_image ? route('file.profile', ['userId' => $user->id, 'filename' => basename($user->profile_image)]) : asset('images/datospersonales.png') }}" 
                    alt="{{ $user->name }}" 
                    class="h-12 w-12 sm:h-14 sm:w-14 rounded-full object-cover border-2 border-white shadow-lg ring-2 ring-white/50">
                <span class="absolute bottom-0 right-0 h-3 w-3 sm:h-4 sm:w-4 bg-green-400 border-2 border-white rounded-full"></span>
            </div>
            <div class="flex-1 min-w-0">
                <h3 class="text-lg sm:text-xl font-bold text-white truncate">{{ $user->name }}</h3>
                <p class="text-sm text-white/90 truncate flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="truncate">{{ $vacante->titulo }}</span>
                </p>
            </div>
        </div>
    </div>

    <!-- Área de mensajes mejorada -->
    <div id="message-list" class="message-list flex-1 space-y-3 sm:space-y-4 mb-4 max-h-96 sm:max-h-[500px] overflow-y-auto px-2 sm:px-4 py-4 bg-gradient-to-br from-gray-50 via-gray-100 to-gray-50 rounded-xl shadow-inner scroll-smooth">
        @forelse($messages as $message)
            @if($message['sender_id'] == auth()->id())
                <!-- Mensajes del usuario autenticado (Emisor) - Alineados a la derecha -->
                <div class="flex justify-end items-end gap-2 group">
                    <div class="flex flex-col max-w-[85%] sm:max-w-md">
                        <div class="bg-gradient-to-br from-amber-500 to-amber-600 text-white p-3 sm:p-4 rounded-2xl rounded-br-sm shadow-md hover:shadow-lg transition-all duration-200 group-hover:scale-[1.02]">
                            <p class="text-sm sm:text-base leading-relaxed break-words whitespace-pre-wrap">{{ $message['message'] }}</p>
                            @if($message['archivo'])
                                <div class="mt-3 pt-3 border-t border-amber-400/30">
                                    <a href="{{ route('file.message', ['messageId' => $message['id'], 'filename' => basename($message['archivo'])]) }}" 
                                       class="inline-flex items-center gap-2 text-amber-100 hover:text-white underline transition-colors text-sm" 
                                       target="_blank" 
                                       rel="noopener noreferrer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Ver PDF Adjunto
                                    </a>
                                </div>
                            @endif
                        </div>
                        <span class="text-xs text-gray-500 mt-1 px-2 self-end">{{ \Carbon\Carbon::parse($message['created_at'])->diffForHumans() }}</span>
                    </div>
                    <!-- Avatar del usuario autenticado -->
                    <img loading="lazy" 
                        src="{{ Auth::user()->profile_image ? route('file.profile', ['userId' => Auth::id(), 'filename' => basename(Auth::user()->profile_image)]) : asset('images/datospersonales.png') }}" 
                        alt="Tu avatar" 
                        class="h-8 w-8 sm:h-10 sm:w-10 rounded-full object-cover border-2 border-amber-200 shadow-md flex-shrink-0">
                </div>
            @else
                <!-- Mensajes del receptor - Alineados a la izquierda -->
                <div class="flex justify-start items-end gap-2 group">
                    <!-- Avatar del contacto -->
                    <img loading="lazy" 
                        src="{{ $user->profile_image ? route('file.profile', ['userId' => $user->id, 'filename' => basename($user->profile_image)]) : asset('images/datospersonales.png') }}" 
                        alt="{{ $user->name }}" 
                        class="h-8 w-8 sm:h-10 sm:w-10 rounded-full object-cover border-2 border-gray-200 shadow-md flex-shrink-0">
                    <div class="flex flex-col max-w-[85%] sm:max-w-md">
                        <div class="bg-white text-gray-800 p-3 sm:p-4 rounded-2xl rounded-bl-sm shadow-md hover:shadow-lg transition-all duration-200 group-hover:scale-[1.02] border border-gray-200">
                            <p class="text-sm sm:text-base leading-relaxed break-words whitespace-pre-wrap">{{ $message['message'] }}</p>
                            @if($message['archivo'])
                                <div class="mt-3 pt-3 border-t border-gray-200">
                                    <a href="{{ route('file.message', ['messageId' => $message['id'], 'filename' => basename($message['archivo'])]) }}" 
                                       class="inline-flex items-center gap-2 text-amber-600 hover:text-amber-700 underline transition-colors text-sm" 
                                       target="_blank" 
                                       rel="noopener noreferrer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Ver PDF Adjunto
                                    </a>
                                </div>
                            @endif
                        </div>
                        <span class="text-xs text-gray-500 mt-1 px-2 self-start">{{ \Carbon\Carbon::parse($message['created_at'])->diffForHumans() }}</span>
                    </div>
                </div>
            @endif
        @empty
            <div class="flex flex-col items-center justify-center h-full py-12">
                <div class="bg-white/80 backdrop-blur-sm rounded-full p-6 mb-4 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <p class="text-gray-600 font-medium text-center">No hay mensajes aún</p>
                <p class="text-gray-400 text-sm text-center mt-1">Comienza la conversación enviando un mensaje</p>
            </div>
        @endforelse
    </div>

    <!-- Formulario de envío de mensajes mejorado -->
    <form wire:submit.prevent="sendMessage" class="bg-white rounded-xl shadow-lg border border-gray-200 p-4 sm:p-6">
        <!-- Campo de archivo PDF con diseño mejorado -->
        <div class="mb-4">
            <label for="archivo" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2 cursor-pointer hover:text-amber-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                <span>Adjuntar archivo PDF</span>
            </label>
            <div class="relative">
                <input 
                    type="file" 
                    wire:model="archivo" 
                    id="archivo" 
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 file:cursor-pointer file:transition-colors cursor-pointer border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all"
                    accept=".pdf"
                />
                @if($archivo)
                    <div class="mt-2 flex items-center gap-2 text-sm text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Archivo seleccionado: {{ $archivo->getClientOriginalName() }}</span>
                    </div>
                @endif
            </div>
            <x-input-error :messages="$errors->get('archivo')" class="mt-2" />
        </div>

        <!-- Área de texto y controles -->
        <div class="relative">
            <div class="flex items-end gap-2 bg-gray-50 rounded-xl p-3 border border-gray-200 focus-within:ring-2 focus-within:ring-amber-500 focus-within:border-amber-500 transition-all">
                <!-- Botón para mostrar/ocultar emoji picker -->
                <button 
                    type="button" 
                    id="emoji-toggle" 
                    class="flex-shrink-0 p-2 bg-white rounded-lg text-gray-600 hover:bg-amber-50 hover:text-amber-600 transition-all duration-200 shadow-sm hover:shadow-md border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>

                <!-- Textarea mejorado -->
                <div class="flex-1 relative">
                    <textarea 
                        wire:model.defer="message" 
                        id="message" 
                        class="w-full p-3 bg-white border-0 rounded-lg resize-none focus:outline-none focus:ring-0 text-sm sm:text-base placeholder-gray-400" 
                        rows="2" 
                        placeholder="Escribe tu mensaje..."
                        title="Presiona Enter para enviar, Shift+Enter para nueva línea"
                    ></textarea>
                </div>

                <!-- Botón para enviar mensaje -->
                <button 
                    type="submit"
                    wire:loading.attr="disabled"
                    class="flex-shrink-0 p-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg hover:from-amber-600 hover:to-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105 active:scale-95">
                    <div wire:loading.remove wire:target="sendMessage">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </div>
                    <div wire:loading wire:target="sendMessage" class="flex items-center justify-center">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </button>
            </div>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
        </div>

        <!-- Emoji Picker con diseño mejorado -->
        <div id="emoji-picker-container" class="hidden mt-4 p-4 bg-white border border-gray-200 rounded-xl shadow-lg">
            <div class="mb-2 flex items-center justify-between">
                <span class="text-sm font-medium text-gray-700">Selecciona un emoji</span>
                <button type="button" id="emoji-close" class="text-gray-400 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <emoji-picker class="h-64 w-full border rounded-lg"></emoji-picker>
        </div>
    </form>
</div>
