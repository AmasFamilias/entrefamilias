<div class="bg-gray-50 py-8">
    <h2 class="text-2xl md:text-4xl text-gray-700 text-center font-extrabold mb-4">
        Buscar y Filtrar
    </h2>

    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 md:p-8">
        <form wire:submit.prevent='leerDatosFormulario'>
            <div class="md:grid md:grid-cols-2 md:gap-4 gap-3">
                <div>
                    <label class="block mb-1 text-gray-600 text-xs font-semibold uppercase" for="termino">
                        Término de Búsqueda
                    </label>
                    <input 
                        id="termino"
                        type="text"
                        placeholder="Ej. A+Familias"
                        class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-2 
                        focus:ring-indigo-400 focus:outline-none px-3 py-2 text-gray-700 text-sm"
                        wire:model="termino"
                    />
                </div>
        
                <div>
                    <label class="block mb-1 text-gray-600 text-xs font-semibold uppercase">Categoría</label>
                    <select wire:model="categoria" 
                        class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-2 
                        focus:ring-indigo-400 focus:outline-none text-gray-700 bg-white text-sm">
                        <option value="">--Seleccione--</option>
                        @foreach ($categorias as $categoria )
                            <option value="{{ $categoria->id }}">{{ $categoria->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        
            <div class="flex justify-center mt-4">
                <button 
                    type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 transition-all duration-300 text-white text-xs font-bold 
                    px-6 py-2 rounded-md shadow-md uppercase transform hover:scale-105">
                    Buscar
                </button>
            </div>
        </form>        
    </div>
</div>
