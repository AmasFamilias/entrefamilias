<div class="mt-5">
    <!-- Modo Perfil -->
    @if($modo === 'perfil')
        <div class="text-center mb-10">
            <h2 class="text-4xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-500 text-transparent bg-clip-text">
                <i class="fas fa-award"></i> Mis Insignias
            </h2>
            <p class="text-gray-600 text-sm">Colecciona y muestra tus logros</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6 p-6 border rounded-lg shadow-md bg-white">
            @foreach ($insignias as $insignia)
                <div class="relative flex flex-col items-center transition-transform duration-300 transform hover:scale-105 cursor-pointer">
                    <div class="w-32 h-32 flex items-center justify-center overflow-hidden rounded-full border-4 
                                {{ $insignia['activo'] ? 'border-green-500' : 'border-gray-300 opacity-50 grayscale' }}">
                        <img src="{{ asset('images/' . $insignia['nombre'] . '.png') }}"
                             alt="{{ $insignia['nombre'] }}"
                             class="w-full h-full object-contain">
                    </div>
                    @if ($insignia['activo'])
                        <span class="mt-3 text-center text-sm font-semibold text-gray-800">
                            {{ $insignia['descripcion'] }}
                        </span>
                        <span class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg">
                            ✔
                        </span>
                    @endif
                </div>
            @endforeach
        </div>
    @endif

    <!-- Separación entre secciones -->
    <div class="border-t-2 border-gray-300 my-12"></div>

    <!-- Modo Vacante -->
    @if($modo === 'vacante')
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-blue-500 text-transparent bg-clip-text">
                <i class="fas fa-medal"></i> Insignias de Usuario
            </h2>
            <p class="text-gray-600 text-xs">Las insignias destacadas del usuario</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-4">
            @foreach ($insignias as $insignia)
                @if ($insignia['activo'])
                    <div class="flex flex-col items-center">
                        <div class="w-20 h-20 flex items-center justify-center overflow-hidden rounded-full border-4 border-indigo-500">
                            <img src="{{ asset('images/' . $insignia['nombre'] . '.png') }}" 
                                 alt="{{ $insignia['nombre'] }}"
                                 class="w-full h-full object-contain">
                        </div>
                        <span class="mt-2 uppercase text-center text-sm font-semibold text-gray-800">
                            {{ $insignia['nombre'] }}
                        </span>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
