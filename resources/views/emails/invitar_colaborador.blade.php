@component('mail::message')
# <img src="{{ asset('images/entrefamilias.png') }}" alt="Entre Familias" style="max-width: 150px;">

## {{ $usuario->name }} te ha invitado a unirte a **{{ $organizacion->nombre }}** en EntreFamilias 🚀

Hola, 

**{{ $usuario->name }}** te ha invitado a colaborar en la organización **{{ $organizacion->nombre }}**.

A partir de ahora, podrás publicar anuncios en nombre de la organización.

Para crear tu primer anuncio, sigue este enlace:

@component('mail::button', ['url' => url('/anuncios/crear')])
Crear Anuncio
@endcomponent

Gracias,  
El equipo de **EntreFamilias**.

@endcomponent
