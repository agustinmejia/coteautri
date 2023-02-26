@extends('layout-template.master')

<!-- ======= Hero Section ======= -->
@include('layout-template.banner')
<!-- End Hero -->

@section('main')
<main id="main">

    <section>

        
    </section>




    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg mt-5">
        <div class="container">

            <div class="section-title">
                <h2>Registrate..</h2>
                <p>Regístrate como Usuario, Socios u otros!.</p>
            </div>

            <div class="row">

                {{-- <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12 div-img" style="height: 600px;">
                            <img src="images/register/BUSCO-TRABAJO-3.jpeg" class="img-fluid" alt="">
                        </div>
                    </div>

                </div> --}}

                <div class="col-lg-6 mt-4 mt-lg-0">
                    <form  action="{{route('coteautri.store')}}" id="post-register" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <span ><b>Tipo</b></span>
                                <select name="type" class="form-control select2bs4" required>
                                    <option value="">--Seleccione una opción--</option>
                                    <option value="Usuario">Usuario</option>
                                    <option value="Socio">Socio</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <span ><b>Carnet Identidad</b></span>
                                <input type="text" name="ci" onkeypress='return validaNumericos(event)' class="form-control" id="ci" placeholder="7085555" value="{{ old('ci') }}" required>
                                @error('ci')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <span ><b>Nombre</b></span>
                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Juan" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <span ><b>Apellido</b></span>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Ortiz Mendoza" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <span ><b>Telefono</b></span>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="7894878" onkeypress='return validaNumericos(event)'  required>
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <span ><b>Email</b></span>
                                <input type="email" name="email" class="form-control" id="email" placeholder="ejemplo@gmail.com"  value="{{ old('email') }}"required>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <br>

                        <div style="text-align: right" >
                            <button type="submit" class="btn btn-save-customer" id="btn-sumit" style="background-color: #ff9d00;">Registrar</button>
                        </div>
                    </form>        
                </div>

            </div>
        </div>
    </section><!-- End Contact Section -->

    


</main>


    {{-- <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var countPage = 10, order = 'id', typeOrder = 'desc';
        $(document).ready(() => {
            list();
            
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
                    $("#div-results").html(result);
                }
            });

        }



       
    </script>
    
    <script>        
        $(function()
        {
            // alert(1)
            $('#post-register').submit(function(e){
                e.preventDefault();
                $('.btn-save-customer').attr('disabled', true);
                $('.btn-save-customer').val('Guardando...');
                // alert(1)
                $.post($(this).attr('action'), $(this).serialize(), function(data){
                    // alert(data.data.id)
                    if(data.data.id){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Registado exitosamente..',
                            showConfirmButton: false,
                            timer: 1800
                        })
                        // alert(1)
                        // toastr.success('Regsitrado..', 'Éxitos');
                        // $(this).trigger('reset');
                    }else{
                        toastr.error(data.error, 'Error');
                    }
                })
                .always(function(){
                    // alert(2)
                    $('.btn-save-customer').attr('disabled', false);
                    // $('.btn-save-customer').text('Guardar');
                    $('.btn-save-customer').val('Guardar');
                    $('#ci').val('');
                    $('#first_name').val('');
                    $('#last_name').val('');
                    $('#phone').val('');
                    $('#email').val('');
                    // $('#birthdate').val('');
                    $('#type').val('').trigger('change');


                    // $('#modal-create-customer').modal('hide');
                });
            });
        });
    </script>



@endsection
