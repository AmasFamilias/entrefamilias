<form class="md:w-full space-y-5" wire:submit.prevent='editarVacante'>
    
    <!-- Contenedor de los Campos del Formulario -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- INGRESO DE TITUTLO DE ANUNCIO -->
        <div>
            <x-input-label for="titulo" :value="__('Titulo de Anuncio')" />
            <x-text-input 
                id="titulo" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="titulo" 
                :value="old('titulo')" 
                placeholder="Titulo de Anuncio"
            />
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>

        <!-- INGRESO CATEGORIA -->
        <div>
            <x-input-label for="rol" :value="__('Categoria')" />
            
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

        <!-- INGRESO DE ENTIDAD -->
        <div>
            <x-input-label for="" :value="__('Nombre de Entidad')" />
            <x-text-input 
                id="entidad" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="entidad" 
                :value="old('entidad')" 
                placeholder="Nombre de la Entidad que Ofrece el Anuncio"
            />
            <x-input-error :messages="$errors->get('entidad')" class="mt-2" />
        </div>

        <!-- ULTIMO DIA DE POSTULACION -->
        <div>
            <x-input-label for="ultimo_dia" :value="__('Ultimo Día de Postulacion')" />
            <x-text-input 
                id="ultimo_dia" 
                class="block mt-1 w-full" 
                type="date" 
                wire:model="ultimo_dia" 
                :value="old('ultimo_dia')" 
            />
            <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
        </div>

        <!-- DESCRIPCION DE LA OPORTUNIDAD -->
        <div>
            <x-input-label for="descripcion" :value="__('Descripcion de Oportunidad')" />
            <textarea 
                wire:model="descripcion" 
                placeholder="Haz una descripción de la oportunidad que estas Ofreciendo"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500
                focus:ring-opacity-50 w-full h-72">
            </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('descripcion')" />
        </div>

        <!-- INGRESO DE IMAGEN O ARCHIVO --> 
        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input 
                id="imagen" 
                class="rounded-lg block mt-1 w-full" 
                type="file" 
                wire:model="imagen_nueva" 
                accept="image/*"
            />

            <div class="my-5 w-80">
                <x-input-label :value="__('Imagen Actual')" />
                <img src=" {{ asset('storage/vacantes/' . $imagen) }}" alt="{{ 'Imagen Vacante' . $titulo }}">
            </div>    

            <div class="my-5 w-80">
                @if ($imagen_nueva)
                    <x-input-label :value="__('Imagen Nueva')" />
                    <img src="{{ $imagen_nueva->temporaryUrl() }}" >
                @endif
            </div>

            <x-input-error :messages="$errors->get('imagen_nueva')" class="mt-2" />
        </div>
    </div>

        <!-- BOTÓN DE CREAR ANUNCIO -->
        <div class="flex justify-center mt-4">
            <x-primary-button class="bg-red-500" wire:loading.attr="disabled">{{ __('Guardar Cambios') }}
                <div 
                    wire:loading wire:target="editarVacante"
                    class="inline-block h-4 w-4 mr-1 animate-spin rounded-full border-4 border-solid 
                    border-current border-r-transparent align-[-0.125em] text-white 
                    motion-reduce:animate-[spin_1.5s_linear_infinite]" 
                    role="status">
                </div>
            </x-primary-button>
        </div>
</form>