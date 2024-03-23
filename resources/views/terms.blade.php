@extends('layouts.master')

@section('page_title', 'Terminos y Condiciones de Uso')

@section('content')
    <!-- Blog Page Title & Breadcrumbs -->
    <div data-aos="fade" class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Terminos y Condiciones de Uso</h1>
                        {{-- <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="current">Terminos y Condiciones de Uso</li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 posts-list mb-5">
            <h1>Términos y Condiciones de Uso de Coteautri</h1>

                <p>Bienvenido/a a Coteautri, el directorio telefónico de confianza. Al acceder y utilizar nuestros servicios, aceptas los siguientes términos y condiciones:</p>

                <h2>1. Uso del Servicio:</h2>

                <p>1.1 <strong>Propósito:</strong> El servicio proporciona un directorio telefónico para facilitar la búsqueda de contactos y empresas. Debes utilizar el servicio de manera ética y conforme a la ley.</p>

                <h2>2. Registro de Usuario:</h2>

                <p>2.1 <strong>Exactitud de la Información:</strong> Al registrarte, proporcionas información precisa y completa. Es tu responsabilidad mantener esta información actualizada.</p>

                <h2>3. Privacidad:</h2>

                <p>3.1 <strong>Política de Privacidad:</strong> Nuestra Política de Privacidad describe cómo recopilamos, utilizamos y compartimos tu información. Al utilizar nuestro servicio, aceptas esta política.</p>

                <h2>4. Contenido del Usuario:</h2>

                <p>4.1 <strong>Responsabilidad:</strong> Eres responsable del contenido que publicas o compartes a través de nuestro servicio. No debes publicar información falsa, difamatoria, obscena o que infrinja los derechos de terceros.</p>

                <h2>5. Propiedad Intelectual:</h2>

                <p>5.1 <strong>Derechos de Autor:</strong> El contenido del sitio web, incluyendo texto, gráficos, logotipos y software, está protegido por derechos de autor. No puedes reproducir, distribuir o modificar dicho contenido sin autorización.</p>

                <h2>6. Limitaciones de Responsabilidad:</h2>

                <p>6.1 <strong>Uso bajo tu propio riesgo:</strong> Utilizas nuestro servicio bajo tu propio riesgo. No garantizamos la disponibilidad, seguridad o exactitud del servicio.</p>

                <h2>7. Cambios en los Términos:</h2>

                <p>7.1 <strong>Modificaciones:</strong> Nos reservamos el derecho de modificar estos Términos y Condiciones en cualquier momento. Te notificaremos sobre cambios significativos a través de nuestro sitio web.</p>

                <h2>8. Finalización del Servicio:</h2>

                <p>8.1 <strong>Terminación:</strong> Nos reservamos el derecho de suspender o cerrar tu cuenta si violas estos términos o por cualquier otro motivo sin previo aviso.</p>

                <h2>9. Contacto:</h2>

                <p>9.1 <strong>Soporte:</strong> Si tienes preguntas sobre estos Términos y Condiciones, por favor, contáctanos a info@coteautri.bo.</p>

                <p>Al utilizar Coteautri, aceptas los términos y condiciones establecidos en estos Términos y Condiciones de Uso.</p>

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