import './bootstrap';
import Alpine from 'alpinejs';
import 'emoji-picker-element';

document.addEventListener('DOMContentLoaded', () => {
    const picker = document.querySelector('emoji-picker');
    const textarea = document.querySelector('#message');
});

// Solo inicializamos Alpine si no ha sido inicializado por Livewire
if (!window.Alpine) {
    window.Alpine = Alpine;
    Alpine.start();
}