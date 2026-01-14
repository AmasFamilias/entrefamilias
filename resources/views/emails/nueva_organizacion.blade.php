@component('mail::message')
# <img src="{{ url('/images/entrefamilias.png') }}" alt="Entre Familias" style="max-width: 150px;">

## 🎉 ¡Nueva Organización Creada!

Una nueva organización ha sido registrada:

**📌 Nombre:** {{ $nombre }}  
📝 **Descripción:** {{ $descripcion }}

📷 **Imagen de la Organización:**  
<img src="{{ $imagen_url }}" alt="Imagen de la Organización" style="max-width: 300px; border-radius: 10px;">

👤 **Creado por:**  
📛 **Nombre:** {{ $usuario_nombre }}  
📧 **Correo:** {{ $usuario_email }}

@component('mail::button', ['url' => url('/organizaciones')])
Ver Organizaciones
@endcomponent

Gracias por utilizar **Entre Familias**.

@endcomponent
