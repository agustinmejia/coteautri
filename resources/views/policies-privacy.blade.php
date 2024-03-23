@section('page_title', 'Políticas de Privacidad')

@section('content')
    <!-- Blog Page Title & Breadcrumbs -->
    <div data-aos="fade" class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Políticas de Privacidad</h1>
                        {{-- <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="current">Políticas de privacidad</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 posts-list mb-5">
                <p>Bienvenido/a a Coteautri, el directorio telefónico de confianza. Nos tomamos muy en serio la privacidad de nuestros usuarios y nos comprometemos a proteger la información personal que nos proporcionas. Esta Política de Privacidad describe cómo recopilamos, utilizamos y compartimos tu información cuando visitas nuestro sitio web y utilizas nuestros servicios. Al acceder y utilizar Coteautri, aceptas los términos descritos en esta política.</p>

                <h2>1. Información Recopilada:</h2>

                <p>1.1 <strong>Información Personal:</strong></p>
                <ul style="margin-left: 50px">
                    <li>Nombre</li>
                    {{-- <li>Dirección</li> --}}
                    <li>Número de teléfono</li>
                    <li>Dirección de correo electrónico</li>
                </ul>

                <p>1.2 <strong>Información del Directorio:</strong></p>
                <ul style="margin-left: 50px">
                    <li>Nombres y números de teléfono de contactos</li>
                    <li>Información de empresas asociadas</li>
                </ul>

                <p>1.3 <strong>Información de Uso:</strong></p>
                <ul style="margin-left: 50px">
                    <li>Datos sobre la forma en que utilizas nuestro sitio web</li>
                    <li>Registros de acceso y actividad del usuario</li>
                </ul>

                <h2>2. Uso de la Información:</h2>

                <p>2.1 <strong>Propósito Principal:</strong></p>
                <ul style="margin-left: 50px">
                    <li>Proporcionar un servicio de directorio telefónico eficiente y preciso.</li>
                </ul>

                <p>2.2 <strong>Comunicación:</strong></p>
                <ul style="margin-left: 50px">
                    <li>Enviar notificaciones importantes sobre cambios en el servicio.</li>
                    <li>Responder a consultas y solicitudes de los usuarios.</li>
                </ul>

                <p>2.3 <strong>Mejora del Servicio:</strong></p>
                <ul style="margin-left: 50px">
                    <li>Analizar datos para mejorar la calidad y funcionalidad del sitio web.</li>
                </ul>

                <h2>3. Compartir Información:</h2>

                <p>3.1 <strong>Proveedores de Servicios:</strong></p>
                <ul style="margin-left: 50px">
                    <li>Colaboramos con terceros para mejorar y mantener nuestros servicios.</li>
                </ul>

                <p>3.2 <strong>Cumplimiento Legal:</strong></p>
                <ul style="margin-left: 50px">
                    <li>Divulgaremos información en respuesta a solicitudes legales y para cumplir con la ley.</li>
                </ul>

                <h2>4. Seguridad:</h2>

                <p>Implementamos medidas de seguridad para proteger tu información personal contra accesos no autorizados, divulgación, alteración y destrucción.</p>

                <h2>5. Cookies y Tecnologías Similares:</h2>

                <p>Utilizamos cookies y tecnologías similares para mejorar la experiencia del usuario y recopilar datos para análisis.</p>

                <h2>6. Cambios en la Política de Privacidad:</h2>

                <p>Nos reservamos el derecho de actualizar esta Política de Privacidad en cualquier momento. Te notificaremos sobre cambios significativos a través de nuestro sitio web.</p>

                <h2>7. Tus Derechos:</h2>

                <p>Tienes derecho a acceder, corregir, eliminar y objetar el procesamiento de tu información personal. Para ejercer estos derechos, por favor, ponte en contacto con nuestro equipo de soporte.</p>

                <h2>8. Menores de Edad:</h2>

                <p>Nuestros servicios no están dirigidos a menores de 13 años. No recopilamos intencionalmente información de menores de edad.</p>

                <h2>9. Contacto:</h2>

                <p>Si tienes preguntas sobre esta Política de Privacidad, por favor, contáctanos a info@coteautri.bo.</p>

                <p>Al utilizar Coteautri, aceptas los términos y condiciones establecidos en esta Política de Privacidad.</p>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('body').removeClass('index-page');
        });
    </script>
@endsection