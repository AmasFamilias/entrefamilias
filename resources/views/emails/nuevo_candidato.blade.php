@component('mail::message')
# <img src="{{ asset('images/entrefamilias.png') }}" alt="Entre Familias" style="max-width: 150px;">

## ¡Nuevo Contacto en tu Anuncio! 🚀

Has recibido un nuevo contacto en tu anuncio:

**Anuncio:** {{ $nombre_vacante }}

📷 **Imagen del Anuncio:**  
<img src="{{ $imagen_vacante ? asset('storage/vacantes/' . $imagen_vacante) : asset('images/default-vacante.png') }}" 
    alt="Imagen Vacante" 
    style="max-width: 300px; border-radius: 10px;">

@component('mail::button', ['url' => url('/notificaciones')])
Ver Notificaciones
@endcomponent

Gracias por utilizar **Entre Familias**.

@endcomponent  
