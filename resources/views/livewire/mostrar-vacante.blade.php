<div class="p-10">
    <div class="mb-5 flex items-center justify-between">
        <!-- Título de la Oportunidad -->
        <h3 class="font-bold text-3xl text-gray-800 my-3 flex items-center">
            {{ $vacante->titulo }}

            <!-- Enlace para Compartir -->
            <a href="#" onclick="compartirOportunidad(event)" class="ml-3 text-amber-500 hover:text-blue-600">
                <!-- Icono SVG de compartir -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10 w-9 h-9">
                    <path fill-rule="evenodd" d="M15.75 4.5a3 3 0 1 1 .825 2.066l-8.421 4.679a3.002 3.002 0 0 1 0 1.51l8.421 4.679a3 3 0 1 1-.729 1.31l-8.421-4.678a3 3 0 1 1 0-4.132l8.421-4.679a3 3 0 0 1-.096-.755Z" clip-rule="evenodd" />
                </svg>
            </a>
        </h3>

        <!-- Otras secciones de información -->
    </div>

    <div class="font-museo300 md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
        <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa:
            <span class="normal-case font-normal">{{ $vacante->entidad }}</span>
        </p>

        <p class="font-bold text-sm uppercase text-gray-800 my-3">Último día disponible:
            <span class="normal-case font-normal">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
        </p>

        <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoría:
            <span class="normal-case font-normal">{{ $vacante->categoria->descripcion }}</span>
        </p>
    </div>

    {{-- Zona de la Imagen y la Descripcion --}}
    <div class="md:grid md:grid-cols-6 gap-4">
        {{-- Zona de la Imagen --}}
        <div class="md:col-span-2">
            <img class="rounded-lg" src="{{ $vacante->imagen ? asset('storage/vacantes/' . $vacante->imagen) : asset('images/default-vacante.png') }}">
        </div>

        {{-- Zona de la Descripcion --}} 
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripción de Anuncio:</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
        <div class="font-museo300 mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                ¿Te interesa este Anuncio?, 
                <a class="font-bold text-indigo-600 hover:underline" 
                    href="{{ route('login', ['redirect' => request()->fullUrl()]) }}">
                    Inicia sesión para ponerte en contacto con este y otros anuncios rápidamente.
                </a>
            </p>
        </div>
    @endguest
    
    @can('postular', $vacante)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcan
</div>

<script>
    function compartirOportunidad(event) {
        event.preventDefault();
        
        // URL a compartir (modifica según sea necesario)
        const url = window.location.href;
        const text = encodeURIComponent('¡Mira este anuncio en ' + url + '!');

        // Genera el enlace de compartir usando la API de Web Share si está disponible
        if (navigator.share) {
            navigator.share({
                title: document.title,
                text: text,
                url: url,
            }).then(() => console.log('Compartido exitosamente'))
            .catch((error) => console.error('Error al compartir:', error));
        } else {
            // Fallback para navegadores que no soportan la API de Web Share
            alert('La función de compartir no es compatible con este navegador.');
        }
    }
</script>
