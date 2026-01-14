<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bandeja de Mensajes') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
                <!-- Incluir el componente Livewire con los parámetros de la URL -->
                <div class="p-4 sm:p-6">
                    <livewire:messenger :vacante_id="$vacante_id" :user_id="$user_id" />
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        /* Animación para el emoji picker */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Personalización de scrollbar para el área de mensajes */
        .message-list::-webkit-scrollbar {
            width: 8px;
        }

        .message-list::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }

    .message-list::-webkit-scrollbar-thumb {
        background: rgba(245, 158, 11, 0.5);
        border-radius: 10px;
    }

    .message-list::-webkit-scrollbar-thumb:hover {
        background: rgba(245, 158, 11, 0.7);
    }

        /* Mejoras para el textarea */
        #message::placeholder {
            color: #9CA3AF;
        }

        /* Animación sutil para los mensajes */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(5px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .message-list > div {
            animation: fadeIn 0.3s ease-out;
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        (function() {
            function initMessengerScripts() {
                const emojiToggle = document.getElementById('emoji-toggle');
                const emojiPickerContainer = document.getElementById('emoji-picker-container');
                const emojiClose = document.getElementById('emoji-close');
                const messageInput = document.getElementById('message');
                const messageList = document.querySelector('.message-list');

                if (!messageInput) return;

                // Función para mostrar/ocultar el Emoji Picker con animación
                function toggleEmojiPicker() {
                    if (emojiPickerContainer) {
                        emojiPickerContainer.classList.toggle('hidden');
                        if (!emojiPickerContainer.classList.contains('hidden') && messageInput) {
                            emojiPickerContainer.style.animation = 'slideDown 0.3s ease-out';
                            messageInput.focus();
                        }
                    }
                }

                // Mostrar y ocultar el Emoji Picker
                if (emojiToggle) {
                    emojiToggle.addEventListener('click', function (e) {
                        e.preventDefault();
                        toggleEmojiPicker();
                    });
                }

                // Cerrar emoji picker con el botón X
                if (emojiClose) {
                    emojiClose.addEventListener('click', function () {
                        if (emojiPickerContainer) {
                            emojiPickerContainer.classList.add('hidden');
                        }
                    });
                }

                // Escuchar el evento cuando se selecciona un emoji
                if (emojiPickerContainer) {
                    emojiPickerContainer.addEventListener('emoji-click', function (event) {
                        const emoji = event.detail.unicode;
                        if (messageInput) {
                            messageInput.value += emoji;
                            // Buscar el componente Livewire más cercano
                            const componentEl = messageInput.closest('[wire\\:id]');
                            if (componentEl && window.Livewire) {
                                const componentId = componentEl.getAttribute('wire:id');
                                const livewireComponent = window.Livewire.find(componentId);
                                if (livewireComponent) {
                                    livewireComponent.set('message', messageInput.value);
                                }
                            }
                            messageInput.focus();
                        }
                    });
                }

                // Permitir enviar el mensaje con Enter (Shift+Enter para nueva línea)
                messageInput.addEventListener('keydown', function (event) {
                    if (event.key === "Enter" && !event.shiftKey) {
                        event.preventDefault();
                        if (messageInput.value.trim()) {
                            const componentEl = messageInput.closest('[wire\\:id]');
                            if (componentEl && window.Livewire) {
                                const componentId = componentEl.getAttribute('wire:id');
                                const livewireComponent = window.Livewire.find(componentId);
                                if (livewireComponent) {
                                    livewireComponent.call('sendMessage');
                                }
                            }
                        }
                    }
                });

                // Escuchar el evento de Livewire para hacer scroll al final
                window.addEventListener('scrollToBottom', function () {
                    if (messageList) {
                        setTimeout(() => {
                            messageList.scrollTo({
                                top: messageList.scrollHeight,
                                behavior: 'smooth'
                            });
                        }, 100);
                    }
                });

                // Escuchar el evento de Livewire para limpiar el textarea
                window.addEventListener('limpiarTextarea', function () {
                    if (messageInput) {
                        messageInput.value = '';
                        messageInput.focus();
                    }
                });

                // Auto-scroll inicial al cargar los mensajes
                if (messageList) {
                    setTimeout(() => {
                        messageList.scrollTop = messageList.scrollHeight;
                    }, 300);
                }
            }

            // Función para limpiar el textarea (mantenida para compatibilidad)
            window.borrartxt = function() {
                const messageInput = document.getElementById('message');
                if (messageInput) {
                    messageInput.value = '';
                    messageInput.focus();
                }
            };

            // Inicializar cuando el DOM esté listo
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initMessengerScripts);
            } else {
                initMessengerScripts();
            }

            // Re-inicializar después de actualizaciones de Livewire
            document.addEventListener('livewire:load', initMessengerScripts);
            document.addEventListener('livewire:update', initMessengerScripts);
        })();
    </script>
    @endpush
</x-app-layout>
