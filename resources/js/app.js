import './bootstrap';
import Alpine from 'alpinejs';
import 'emoji-picker-element';

document.addEventListener('DOMContentLoaded', () => {
    const picker = document.querySelector('emoji-picker');
    const textarea = document.querySelector('#message');
});

window.Alpine = Alpine;
Alpine.start();

// Generar Avatar
const baseUrl = 'https://api.dicebear.com/9.x/';
// Inicialización de variables para paginación
let paginaActual = 1;
const avataresPorPagina = 10;
let categoriaSeleccionada = 'adventurer'; // Por defecto

// Configuración de estilos por categoría
const estilosPorCategoria = {
    'realistas': ['lorelei', 'avataaars', 'personas', 'notionists', 'open-peeps'],
    'pixelados': ['miniavs'],
    'abstractos': ['adventurer', 'bottts', 'croodles-neutral', 'micah']
};

// Función para cargar los avatares y pasarlos al Blade
function cargarAvatares(categoria, pagina) {
    const contenedor = document.getElementById('contenedor-avatares');
    if (!contenedor) return; // Asegúrate de que el contenedor existe

    contenedor.innerHTML = ''; // Limpiar avatares previos
    const estilos = estilosPorCategoria[categoria] || [];
    if (estilos.length === 0) {
        console.error('No se encontraron estilos para la categoría seleccionada.');
        return;
    }

    const seed = 'usuario1';
    const inicio = (pagina - 1) * avataresPorPagina;
    const fin = inicio + avataresPorPagina;

    estilos.forEach((style) => {
        for (let i = inicio; i < fin; i++) {
            const avatarUrl = `${baseUrl}${style}/png?seed=${seed}${i}`;
            const div = document.createElement('div');
            div.classList.add('flex', 'flex-col', 'items-center', 'space-y-2');

            const img = document.createElement('img');
            img.src = avatarUrl;
            img.alt = `Avatar ${i + 1}`;
            img.classList.add('w-24', 'h-24', 'rounded-full', 'border', 'mb-2', 'cursor-pointer');

            // Al hacer clic en la imagen, emitimos el evento para mostrar el SweetAlert
            img.addEventListener('click', function () {
                Livewire.dispatch('mostrarSweetAlert', avatarUrl); // Se emite el evento hacia Livewire
            });

            div.appendChild(img);
            contenedor.appendChild(div);
        }
    });

    // Actualiza el estado de los botones de paginación
    const anteriorBtn = document.getElementById('anterior');
    if (anteriorBtn) anteriorBtn.disabled = pagina === 1;
}

// Manejadores de eventos para paginación
document.getElementById('anterior')?.addEventListener('click', function () {
    if (paginaActual > 1) {
        paginaActual--;
        const paginaActualElement = document.getElementById('pagina-actual');
        if (paginaActualElement) {
            paginaActualElement.textContent = 'Página: ' + paginaActual;
        }
        cargarAvatares(categoriaSeleccionada, paginaActual);
    }
});

document.getElementById('siguiente')?.addEventListener('click', function () {
    paginaActual++;
    const paginaActualElement = document.getElementById('pagina-actual');
    if (paginaActualElement) {
        paginaActualElement.textContent = 'Página: ' + paginaActual;
    }
    cargarAvatares(categoriaSeleccionada, paginaActual);
});

// Manejador del select de categoría
const selectCategoria = document.getElementById('select-categoria');
if (selectCategoria) {
    selectCategoria.addEventListener('change', function () {
        categoriaSeleccionada = this.value;
        paginaActual = 1;
        const paginaActualElement = document.getElementById('pagina-actual');
        if (paginaActualElement) {
            paginaActualElement.textContent = 'Página: ' + paginaActual;
        }
        cargarAvatares(categoriaSeleccionada, paginaActual);
    });
}

// Cargar avatares iniciales
cargarAvatares(categoriaSeleccionada, paginaActual);
