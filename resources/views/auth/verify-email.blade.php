<x-guest-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white p-6 sm:p-8 rounded-lg shadow-md text-center">
        <!-- Ícono del sobre -->
        <div class="mb-4 flex justify-center">
            <div class="w-14 h-14 sm:w-16 sm:h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 sm:w-10 sm:h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2Z"/>
                    <polyline points="22,6 12,13 2,6"/>
                </svg>
            </div>
        </div>

        <!-- Título -->
        <h2 class="text-xl sm:text-2xl font-bold text-gray-800">
            ¡Gracias por registrarte!
        </h2>

        <!-- Mensaje principal -->
        <p class="text-gray-600 mt-2 text-sm sm:text-base leading-relaxed">
            Antes de comenzar, revisa tu bandeja de entrada y haz clic en el enlace de verificación que te hemos enviado.
            Si no lo encuentras, revisa la carpeta de spam.
        </p>

        <!-- Mensaje de estado -->
        @if (session('status') == 'verification-link-sent')
            <div class="mt-4 bg-green-100 text-green-700 p-3 rounded-lg text-xs sm:text-sm flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 13l4 4L19 7"/>
                </svg>
                <span>Se ha enviado un nuevo enlace de verificación a tu correo.</span>
            </div>
        @else
            <div class="mt-4 bg-yellow-100 text-yellow-700 p-3 rounded-lg text-xs sm:text-sm flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="12"/>
                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                <span>Revisa tu bandeja de entrada antes de solicitar otro correo.</span>
            </div>
        @endif

        <!-- Botón para reenviar correo -->
        <div class="mt-6">
            <form method="POST" action="{{ route('verification.send') }}" id="resend-form">
                @csrf

                <x-primary-button id="resend-button" class="w-full sm:w-auto flex items-center justify-center gap-2">
                    <span id="button-text">Enviar Correo de Confirmación</span>
                    <svg id="loading-icon" class="hidden w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M4 12a8 8 0 0 1 16 0"/>
                    </svg>
                </x-primary-button>
            </form>
        </div>

        <!-- Botón para cerrar sesión -->
        <div class="mt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm sm:text-base text-gray-600 hover:text-gray-900">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </div>

    <!-- Script para manejar la desactivación temporal del botón -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let resendButton = document.getElementById("resend-button");
            let buttonText = document.getElementById("button-text");
            let loadingIcon = document.getElementById("loading-icon");

            resendButton.addEventListener("click", function(event) {
                event.preventDefault();
                resendButton.disabled = true;
                buttonText.textContent = "Enviando...";
                loadingIcon.classList.remove("hidden");

                setTimeout(() => {
                    document.getElementById("resend-form").submit();
                }, 1000);
            });
        });
    </script>
</x-guest-layout>
