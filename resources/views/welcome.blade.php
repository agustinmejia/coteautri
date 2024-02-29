@extends('layouts.master')

@section('content')
    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

        <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 data-aos="fade-up" data-aos-delay="100">Consulta del Directorio Telefónico</h2>
                    <p data-aos="fade-up" data-aos-delay="200">Para realizar busqueda por numero telefonico o por nombre y/o apellido, escriba los datos en el siguiente cuadro y luego presione Buscar</p>
                    <form action="#" class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
                        <input type="text" id="input-search" class="form-control" placeholder="Nombre o línea telefónica" required>
                        <button type="submit" class="btn btn-primary">Buscar <i class="bi bi-search"></i></button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-bordered" id="div-results"></div>
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero Section -->
@endsection

@section('script')
    <script>
        var countPage = 10;

        $(document).ready(function(){
            $('.sign-up-form').submit(function(e){
                e.preventDefault();
                list();
            });
        });

        function list(page = 1){
            // var loader = '<div class="col-md-12 bg"><div class="loader" id="loader-3"></div></div>'
            // $('#div-results').html(loader);

            let url = '{{ url("home/search") }}';
            let search = $('#input-search').val() ? $('#input-search').val() : '';

            $.ajax({
                url: `${url}/${search}?paginate=${countPage}&page=${page}`,
                type: 'get',
                success: function(result){
                    $("#div-results").html(result);
                    var top = $('#div-results').offset().top +50;
                    $('html,body').animate({scrollTop: 50}, 1000);
                }
            });

        }
    </script>
@endsection