<div class="bg-gray-100 py-10">
    <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold my-5">Buscar y Filtrar Oportunidades</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent='leerDatosFormulario'>
            <div class="md:grid md:grid-cols-2 md:gap-5 gap-3"> <!-- Aumentar el gap -->
                <div class="mb-5">
                    <label 
                        class="block mb-1 text-sm text-gray-700 uppercase font-bold"
                        for="termino">Término de Búsqueda
                    </label>
                    <input 
                        id="termino"
                        type="text"
                        placeholder="Buscar por Término: ej. A+Familias"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring 
                        focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model="termino"
                    />
                </div>
        
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Categoría</label>
                    <select wire:model="categoria" class=" rounded-md border-gray-300 p-2 focus:border-indigo-300 focus:ring 
                        focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                        <option>--Seleccione--</option>
        
                        @foreach ($categorias as $categoria )
                            <option value="{{ $categoria->id }}">{{ $categoria->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        
            <div class="flex justify-center mt-4"> <!-- Asegurar espacio entre el grid y el botón -->
                <input 
                    type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold 
                    px-6 py-2 rounded cursor-pointer uppercase md:w-auto w-auto"
                    value="Buscar"
                />
            </div>
        </form>        
    </div>
</div>