import './bootstrap';
import Alpine from 'alpinejs';
import 'emoji-picker-element';

document.addEventListener('DOMContentLoaded', () => {
    const picker = document.querySelector('emoji-picker');
    const textarea = document.querySelector('#message');
});

window.Alpine = Alpine;
Alpine.start();