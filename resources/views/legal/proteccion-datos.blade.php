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
                    <h1 class="text-3xl sm:text-4xl font-bold text-white">Protección de Datos</h1>
                    <p class="mt-2 text-amber-100">Última actualización: 19 de marzo de 2025</p>
                </div>
                
                <div class="px-6 py-8 sm:px-8">
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-700 mb-8 text-lg leading-relaxed">
                            En esta Política de Protección de Datos se describe la forma en la que Asociación A+Familias (en adelante, "A+Familias" o la "Asociación"), trata y comunica los datos personales recabados en este Formulario.
                        </p>

                        <div class="space-y-8">
                            <!-- Sección 1: Compromiso con la Privacidad -->
                            <section class="bg-gray-50 rounded-xl p-4 sm:p-6">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-4">1. Compromiso con la Privacidad</h2>
                                <div class="space-y-4">
                                    <div class="bg-white rounded-lg p-4 shadow-sm">
                                        <p class="text-gray-700">
                                            En A+Familias, nos comprometemos a proteger y respetar tu privacidad. Esta política de protección de datos establece cómo recopilamos, usamos y protegemos tu información personal de acuerdo con el Reglamento General de Protección de Datos (RGPD) y otras leyes aplicables.
                                        </p>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 2: Recopilación y Uso de Datos -->
                            <section class="bg-white rounded-xl p-4 sm:p-6 border border-gray-100">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-4">2. Recopilación y Uso de Datos</h2>
                                <div class="space-y-4">
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <p class="text-gray-700 mb-3">
                                            Recopilamos información que nos proporcionas directamente cuando:
                                        </p>
                                        <ul class="list-none space-y-2 text-gray-700">
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Te registras en nuestra plataforma</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Publicas un anuncio o te postulas a uno</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Nos contactas para solicitar ayuda o información</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 3: Base Legal -->
                            <section class="bg-gray-50 rounded-xl p-6 sm:p-8">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-6">3. Base Legal</h2>
                                <div class="space-y-6">
                                    <div class="bg-white rounded-lg p-4 shadow-sm">
                                        <p class="text-gray-700">
                                            La base legal que legitima la recogida de estos datos personales es el consentimiento del Solicitante cuando solicita ayuda a través del Formulario. Una vez recabados los datos, A+Familias podrá tratar sus datos personales en base a la relación contractual o a su interés legítimo, bien para tramitar la recepción de la ayuda con el Solicitante o bien para trámites administrativos internos.
                                        </p>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 4: Compartición de Datos -->
                            <section class="bg-white rounded-xl p-6 sm:p-8 border border-gray-100">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-6">4. Compartición de Datos</h2>
                                <div class="space-y-6">
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <p class="text-gray-700 mb-4">Los datos personales del Solicitante podrán ser comunicados a:</p>
                                        <ul class="list-none space-y-3 text-gray-700">
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Autoridades administrativas o tribunales competentes en cumplimiento de las obligaciones legales</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Terceros para garantizar la correcta prestación de servicios solicitados</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Autoridades competentes o entidades públicas para cumplir obligaciones legales o judiciales</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 5: Seguridad de Datos -->
                            <section class="bg-gray-50 rounded-xl p-6 sm:p-8">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-6">5. Seguridad de Datos</h2>
                                <div class="space-y-6">
                                    <div class="bg-white rounded-lg p-4 shadow-sm">
                                        <p class="text-gray-700">
                                            A+Familias garantiza la seguridad y confidencialidad de los datos personales del Solicitante, implementando medidas técnicas, físicas y organizativas adecuadas para proteger los datos personales recabados a través del Formulario del uso indebido, la destrucción, pérdida, alteración, divulgación, adquisición o acceso accidental, ilegal o no autorizado.
                                        </p>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 6: Derechos del Usuario -->
                            <section class="bg-white rounded-xl p-6 sm:p-8 border border-gray-100">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-6">6. Derechos del Usuario</h2>
                                <div class="space-y-6">
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <p class="text-gray-700 mb-4">El Solicitante puede ejercer los siguientes derechos:</p>
                                        <ul class="list-none space-y-3 text-gray-700">
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Acceso a sus datos personales</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Rectificación de datos inexactos</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Supresión de datos</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Oposición al tratamiento</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Limitación del tratamiento</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="flex-shrink-0 w-2 h-2 mt-2.5 mr-3 bg-amber-500 rounded-full"></span>
                                                <span>Portabilidad de datos</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>

                            <!-- Sección 7: Contacto -->
                            <section class="bg-gray-50 rounded-xl p-6 sm:p-8">
                                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-6">7. Contacto</h2>
                                <div class="space-y-6">
                                    <div class="bg-white rounded-lg p-4 shadow-sm">
                                        <p class="text-gray-700">
                                            Para ejercer cualquiera de estos derechos, el Solicitante puede contactar con A+Familias a través del correo electrónico <a href="mailto:javier.dias@amasfamilias.com" class="text-amber-600 hover:text-amber-700">javier.dias@amasfamilias.com</a>, incluyendo como asunto del email "EJERCICIO DE DERECHOS" y adjuntando una copia de su Documento Acreditativo de Identidad.
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