<form class="md:w-full space-y-5" wire:submit.prevent='crearVacante'>

    <!-- Encabezado del Formulario -->
    <div class="text-center flex items-center justify-center">
        <div class="mr-4">
            <img src="{{ asset('images/oportunidad.png') }}" alt="Icono" class="w-16 h-16"> <!-- Reemplaza con la ruta de tu icono -->
        </div>
        <h2 class="text-2xl font-semibold text-gray-800"> PUBLICAR ANUNCIO</h2>
    </div>

     <!-- Contenedor de los Campos del Formulario -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- INGRESO DE TITUTLO DE OPORTUNIDAD -->
        <div>
            <x-input-label for="titulo" :value="__('Titulo del Anuncio')" />
            <x-text-input 
                id="titulo" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="titulo" 
                :value="old('titulo')" 
                placeholder="Titulo del Anuncio"
            />
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>

        <!-- INGRESO DE ENTIDAD -->
        <div>
            <x-input-label for="" :value="__('Nombre Anunciante')" />
            <x-text-input 
                id="entidad" 
                class="block mt-1 w-full" 
                type="text" 
                readonly
                wire:model="entidad" 
                :value="old('entidad')" 
                placeholder="Nombre de la Entidad que publica el Anuncio"
            />
            <x-input-error :messages="$errors->get('entidad')" class="mt-2" />
        </div>

        <!-- SELECCIONAR UNA ORGANIZACION SI EXISTE -->
        <div>
            <x-input-label for="organizacion" :value="__('Seleccionar Organización')" />
            <select 
                id="organizacion" 
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                wire:model="selectedOrganizacion">
                <option value="" disabled>{{ __('Selecciona una Organización') }}</option>
                @foreach ($orgexistentes as $organizacion)
                    <option value="{{ $organizacion->id }}">{{ $organizacion->nombre }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('selectedOrganizacion')" class="mt-2" />
        </div>
        

        <!-- DESCRIPCION DE LA OPORTUNIDAD -->
        <div>
            <x-input-label for="descripcion" :value="__('Descripcion del Anuncio')" />
            <textarea 
                wire:model="descripcion" 
                placeholder="Haz una descripción del Anuncio"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500
                focus:ring-opacity-50 w-full h-72">
            </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('descripcion')" />
        </div>

        <!-- INGRESO CATEGORIA -->
        <div>
            <x-input-label for="categoria_id" :value="__('Categoria')" />
            
            <select wire:model="categoria_id" id="categoria_id" 
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 
            rounded-md shadow-sm">               

                <option >--Selecciona una Categoria--</option>
                @foreach ($categorias as $categoria )
                    <option value="{{ $categoria->id }}"> {{ $categoria->descripcion }}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
        </div>

        <!-- ULTIMO DIA DE POSTULACION -->
        <div>
            <x-input-label for="ultimo_dia" :value="__('Fecha caducidad del Anuncio')" />
            <x-text-input 
                id="ultimo_dia" 
                class="block mt-1 w-full" 
                type="date" 
                wire:model="ultimo_dia" 
                :value="old('ultimo_dia')" 
            />
            <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
        </div>

        <!-- TIPO DE ANUNCIO -->
        <div>
            <x-input-label for="categoria_id" :value="__('Tipo de Anuncio')" />
            
            <select wire:model="categoria_id" id="categoria_id" 
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 
            rounded-md shadow-sm">               

                <option >--Selecciona Tipo de Anuncio--</option>
                @foreach ($categorias as $categoria )
                    <option value="{{ $categoria->id }}"> {{ $categoria->descripcion }}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
        </div>

        <!-- INGRESO DE IMAGEN O ARCHIVO -->
        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input 
                id="imagen" 
                class="block mt-1 w-full" 
                type="file" 
                wire:model="imagen" 
                accept="image/*"
            />
            <div class="my-5 w-80">
                @if ($imagen)
                    <p>Vista Previa de Imagen:</p>
                    <p>{{ $imagen->temporaryUrl() }}</p>
                    <img src="{{ $imagen->temporaryUrl() }}" alt="Vista previa de la imagen">
                @endif
            </div>
            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
        </div>
    </div>

    <!-- BOTÓN DE CREAR OPORTUNIDAD -->
    <div class="flex justify-center mt-4">
        <x-primary-button class="bg-red-500 px-8 py-2" wire:loading.attr="disabled">
            {{ __('Crear Anuncio') }}
            <div 
                wire:loading wire:target="crearVacante"
                class="inline-block h-4 w-4 ml-2 animate-spin rounded-full border-4 border-solid 
                border-current border-r-transparent align-[-0.125em] text-white 
                motion-reduce:animate-[spin_1.5s_linear_infinite]" 
                role="status">
            </div>
        </x-primary-button>
    </div>
</form>