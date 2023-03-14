@extends('layout-template.master')

<!-- ======= Hero Section ======= -->

<!-- End Hero -->

@section('main')
<section id="heros" class="hero d-flex align-items-center">
  
  <div class="dark-mask" style="width: 100%; position: relative;background-color: rgba(0,0,0,0.4); height: 100vh">
    {{-- <h1>hola</h1> --}}
    <div class="container"style="padding: 120px 0 60px 0;">
      <div class="row">
        
        <div class="col-lg-12  scroll">
          <div class="row">
            <div class="col-lg-7">
                <h2 data-aos="fade-up" id="title" style="color:#08acf2">CONSULTA DEL DIRECTORIO TELEFONICO</h2>
                <p data-aos="fade-up" id="subtitle" data-aos-delay="100" style="color: rgb(255, 255, 255)">Para Descargar la Guía Telefonica Digital debe Registrarse e ingresar a nuestra Oficina Virtual. <br>Para realizar busqueda por numero telefonico o por nombre y/o apellido, escriba los datos en el siguiente cuadro y luego presione Buscar</p>
                {{-- <p data-aos="fade-up" data-aos-delay="100" style="color: rgb(255, 255, 255)">Para realizar busqueda por numero telefonico o por nombre y/o apellido, escriba los datos en el siguiente cuadro y luego presione Buscar</p> --}}
                <div class="form-inline">
                    <div id="field_wrapper">
                    <div class="my-class-form-control-group">
                        <input type="text" id="input-search" class="form-control" placeholder="Buscar..." value="juan" style="width:250;height:50px"> &nbsp;
                        <a  class="btn btn-info" onclick="buscar()" id="add_button" style="width: 50px; height: 46px; font-size: 28px; justify-content: center;"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
          </div>
          <div class="row" id="result">
                <div class="table-responsive" id="div-results">
                </div>
          </div>
        </div>



        

      </div>
    </div>
  </div>


  </section>
  <style> 
      div.scroll {
        height: 700px;
        overflow-x: hidden;
        overflow-y: auto;
        


    

        padding: 20px;
      }

      ::-webkit-scrollbar {
  width: 1px;
}

      .my-class-form-control-group{
        display:flex;
        align-items:Center;
      }

      

      #dataStyle {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
      }

      #dataStyle td, #dataStyle th {
          border: 1px solid #ddd;
          padding: 8px;
          color: black;
      }

      /* #dataStyle tr:nth-child(even){background-color: #de1111;} */

      #dataStyle tr:hover {background-color: #ddd;}

      #dataStyle th {
          padding-top: 12px;
          padding-bottom: 12px;
          /* text-align: left; */
          background-color: #08acf2;
          color: white;
      }
    </style>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var countPage = 10, order = 'id', typeOrder = 'desc';
        $(document).ready(() => {
            
            $('#input-search').on('keyup', function(e){
                if(e.keyCode == 13) {
                    list();
                }
            });

            $('#select-paginate').change(function(){
                countPage = $(this).val();
               
                list();
            });
        });

        function buscar()
        {
            // $("#div-results").html('');
            list();
        }
        var i=0;
        function list(page = 1){
            // $('#div-results').loading({message: 'Cargando...'});
            var loader = '<div class="col-md-12 bg"><div class="loader" id="loader-3"></div></div>'
            $('#div-results').html(loader);

            let url = '{{ url("home/search") }}';
            let search = $('#input-search').val() ? $('#input-search').val() : '';

            $.ajax({
                url: `${url}/${search}?paginate=${countPage}&page=${page}`,
                type: 'get',
                
                success: function(result){
                    alert(result)
                    $("#div-results").html(result);

                    $('#title').css('display', 'none');
                    $('#subtitle').css('display', 'none');

                    var top = $('#div-results').offset().top +50;
                    $('html,body').animate({scrollTop: 50}, 1000);
                }
            });

        }



       
    </script>
    
    {{-- <script>        
        $(function()
        {
            $('#post-register').submit(function(e){
                e.preventDefault();
                $('.btn-save-customer').attr('disabled', true);
                $('.btn-save-customer').val('Guardando...');
                $.post($(this).attr('action'), $(this).serialize(), function(data){
                    if(data.data.id){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Registado exitosamente..',
                            showConfirmButton: false,
                            timer: 1800
                        })
                    }else{
                        toastr.error(data.error, 'Error');
                    }
                })
                .always(function(){
                    $('.btn-save-customer').attr('disabled', false);
                    $('.btn-save-customer').val('Guardar');
                    $('#ci').val('');
                    $('#first_name').val('');
                    $('#last_name').val('');
                    $('#phone').val('');
                    $('#email').val('');
                    $('#type').val('').trigger('change');
                });
            });
        });
    </script> --}}

    <script>        
        function mostrarContrasena(){
            
            var tipo = document.getElementById("password");
                if(tipo.type == "password"){
                    $('#boton').html('<span class="fa fa-eye-slash"></span>');
                    $('#password').prop('type', 'text');
                }
                else
                {
                    $('#boton').html('<span class="fa fa-eye"></span>');
                    $('#password').prop('type', 'password');
                }
        }
    </script>



@endsection
