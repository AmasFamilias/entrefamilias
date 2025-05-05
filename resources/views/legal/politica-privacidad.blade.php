<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <!-- Logo y Botón de Retorno -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0 mb-8">
                <a href="{{ route('home') }}" class="flex items-center space-x-2 text-gray-700 hover:text-amber-500 transition-colors duration-300">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span class="font-medium text-sm sm:text-base">Volver al inicio</span>
                </a>
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="group">
                        <div class="p-2 sm:p-3 rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300 hover:border-amber-500">
                            <img src="{{ asset('images/logofamiliaxfamilia.png') }}" 
                                 alt="Logo EntreFamilias" 
                                 class="h-8 sm:h-10 md:h-12 w-auto">
                        </div>
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                <!-- Encabezado con gradiente -->
                <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-8 sm:px-8">
                    <h1 class="text-3xl sm:text-4xl font-bold text-white">Política de Privacidad</h1>
                    <p class="mt-2 text-amber-100">Última actualización: 19 de marzo de 2025</p>
                </div>
                
                <div class="px-6 py-8 sm:px-8">
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-700 mb-8 text-lg leading-relaxed">
                            En A+FAMILIAS, respetamos tu privacidad y nos comprometemos a proteger tus datos personales. Esta Política de Privacidad explica cómo recopilamos, utilizamos, compartimos y protegemos tu información personal cuando utilizas nuestros servicios.
                        </p>

                        <div class="space-y-8">
                            <!-- Sección 1: Información General -->
                            <section class="bg-gray-50 rounded-xl p-4 sm:p-6">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-4">1. Información General</h2>
                                <div class="space-y-4">
                                    <div class="bg-white rounded-lg p-4 shadow-sm">
                                        <p class="text-gray-700">
                                            La presente Política de Privacidad establece los términos en que A+Familias usa y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compañía está comprometida con la seguridad de los datos de sus usuarios.
                                        </p>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 2: Recopilación de Información -->
                            <section class="bg-white rounded-xl p-4 sm:p-6 border border-gray-100">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-4">2. Recopilación de Información</h2>
                                <div class="space-y-4">
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <p class="text-gray-700">
                                            Nuestro sitio web podrá recoger información personal, por ejemplo: Nombre, información de contacto como su dirección de correo electrónica e información demográfica. Así mismo cuando sea necesario podrá ser requerida información específica para procesar algún pedido o realizar una entrega o facturación.
                                        </p>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 3: Información que recopilamos -->
                            <section class="bg-gray-50 rounded-xl p-6 sm:p-8">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-6">3. Información que recopilamos</h2>
                                <div class="space-y-6">
                                    <div class="bg-white rounded-lg p-4 shadow-sm">
                                        <h3 class="text-xl font-medium text-gray-800 mb-3">1.1. Información que nos proporcionas directamente</h3>
                                        <ul class="list-none space-y-3 text-gray-700">
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Datos de registro (nombre, email, contraseña)</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Información de perfil (foto, descripción, ubicación)</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Información de contacto y comunicación</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Información de pago y facturación</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bg-white rounded-lg p-4 shadow-sm">
                                        <h3 class="text-xl font-medium text-gray-800 mb-3">1.2. Información que recopilamos automáticamente</h3>
                                        <ul class="list-none space-y-3 text-gray-700">
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Datos de uso y navegación</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Información del dispositivo</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Cookies y tecnologías similares</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 4: Uso de la información -->
                            <section class="bg-white rounded-xl p-6 sm:p-8 border border-gray-100">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-6">4. Uso de la información</h2>
                                <div class="space-y-6">
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <h3 class="text-xl font-medium text-gray-800 mb-3">2.1. Propósitos principales</h3>
                                        <ul class="list-none space-y-3 text-gray-700">
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Proporcionar y mejorar nuestros servicios</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Gestionar tu cuenta y perfil</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Procesar transacciones y pagos</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Comunicarnos contigo</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 5: Compartir información -->
                            <section class="bg-gray-50 rounded-xl p-6 sm:p-8">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-6">5. Compartir información</h2>
                                <div class="space-y-6">
                                    <div class="bg-white rounded-lg p-4 shadow-sm">
                                        <h3 class="text-xl font-medium text-gray-800 mb-3">3.1. Con quién compartimos tu información</h3>
                                        <ul class="list-none space-y-3 text-gray-700">
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Proveedores de servicios y socios comerciales</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Autoridades legales cuando sea requerido</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>En caso de fusión o adquisición</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 6: Tus derechos -->
                            <section class="bg-white rounded-xl p-6 sm:p-8 border border-gray-100">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-6">6. Tus derechos</h2>
                                <div class="space-y-6">
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <h3 class="text-xl font-medium text-gray-800 mb-3">4.1. Derechos de protección de datos</h3>
                                        <ul class="list-none space-y-3 text-gray-700">
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Acceso a tus datos personales</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Rectificación de datos inexactos</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Eliminación de tus datos</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Limitación del tratamiento</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Portabilidad de datos</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Oposición al tratamiento</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 7: Seguridad -->
                            <section class="bg-gray-50 rounded-xl p-6 sm:p-8">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-6">7. Seguridad</h2>
                                <div class="space-y-6">
                                    <div class="bg-white rounded-lg p-4 shadow-sm">
                                        <p class="text-gray-700">
                                            Implementamos medidas de seguridad técnicas y organizativas apropiadas para proteger tus datos personales contra el acceso no autorizado, la alteración, divulgación o destrucción. Sin embargo, ningún sistema es completamente seguro, y no podemos garantizar la seguridad absoluta de tus datos.
                                        </p>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 8: Cambios en la política -->
                            <section class="bg-white rounded-xl p-6 sm:p-8 border border-gray-100">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-6">8. Cambios en la política</h2>
                                <div class="space-y-6">
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <p class="text-gray-700">
                                            Nos reservamos el derecho de modificar esta Política de Privacidad en cualquier momento. Te notificaremos sobre cualquier cambio material en la forma en que tratamos tus datos personales. El uso continuado de nuestros servicios después de dichos cambios constituirá tu aceptación de la política revisada.
                                        </p>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 9: Contacto -->
                            <section class="bg-gray-50 rounded-xl p-6 sm:p-8">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-6">9. Contacto</h2>
                                <div class="space-y-6">
                                    <div class="bg-white rounded-lg p-4 shadow-sm">
                                        <p class="text-gray-700">
                                            Si tienen alguna otra pregunta acerca de la forma en la que A+Familias trata los datos personales o sobre la Política de Privacidad, pueden enviar un correo electrónico a <a href="mailto:javier.dias@amasfamilias.com" class="text-amber-600 hover:text-amber-700">javier.dias@amasfamilias.com</a>.
                                        </p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 