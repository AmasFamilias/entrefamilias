@component('mail::message')

# <img src="{{ asset('images/entrefamilias.png') }}" alt="Entre Familias" style="max-width: 150px;">

## ¡Tienes un Nuevo Mensaje! 📩

Has recibido un nuevo mensaje de **{{ $nombre_remitente }}** en tu anuncio:

📌 **Anuncio:** {{ $nombre_vacante }}

📷 **Imagen del Anuncio:**  
<img src="{{ $imagen_vacante ? asset('storage/vacantes/' . $imagen_vacante) : asset('images/default-vacante.png') }}" 
    alt="Imagen Vacante" 
    style="max-width: 300px; border-radius: 10px;">

👤 **Remitente:**  
<img src="{{ $foto_remitente ? asset('storage/profiles/' . $foto_remitente) : asset('images/datospersonales.png') }}" 
    alt="Imagen Remitente" 
    style="width: 80px; height: 80px; border-radius: 50%; margin-top: 10px;">

💬 **Mensaje Recibido:**  
*"{{ $mensaje }}"*

@component('mail::button', ['url' => $url])
Ver Mensajes
@endcomponent

Gracias por utilizar **Entre Familias**.

@endcomponent
