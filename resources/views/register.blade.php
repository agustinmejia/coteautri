@extends('layout-template.master')

<!-- ======= Hero Section ======= -->
{{-- @include('layout-template.banner') --}}
<!-- End Hero -->

@section('main')
<form  action="{{route('coteautri.store')}}" class="was-validateds" method="POST">
    @csrf 
<section id="hero" class="hero d-flex align-items-center">    
    <div class="dark-mask" style="width: 100%; position: relative;background-color: rgba(0,0,0,0.4); height: 100vh">
    {{-- <div class="dark-mask" style="width: 100%; position: relative;background-color: #EDEDED"> --}}

        <div class="container" style="padding: 120px 0 60px 0;">
            {{-- <div class="section-title">
                <h4 style="color:#002576">Registrate..</h4>
                <p>Regístrate como Usuario, Socios u otros!.</p>
            </div> --}}
    
            <br>
            <div class="row">
                <div class="col-lg-3" >
                </div>

                <div class="col-lg-6" >

                    
                        <div class="row">
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <span ><b style="color: rgb(255, 255, 255)">Tipo</b></span>
                                <select name="type" id="type" class="form-control select2" required>
                                    <option value="" disabled selected>--Seleccione una opción--</option>
                                    <option value="Usuario" {{ old('type')=='Usuario'?'selected':'' }}>Usuario</option>
                                    <option value="Socio" {{ old('type')=='Socio'?'selected':'' }}>Socio</option>
                                    <option value="Otros" {{ old('type')=='Otros'?'selected':'' }}>Otros</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <span ><b style="color: rgb(255, 255, 255)">Telefono</b></span>
                                <input type="text" id="phone" name="phone" class="form-control"  placeholder="Telefono" onkeypress='return validaNumericos(event)' value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                          
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <span ><b style="color: rgb(255, 255, 255)">Nombre</b></span>
                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Nombre" value="{{ old('first_name') }}" required autocomplete="nope">
                                @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <span ><b style="color: rgb(255, 255, 255)">Apellido</b></span>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellido" value="{{ old('last_name') }}" required autocomplete="nope">
                                @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                                                    
                            <div class="col-md-6 form-group">
                                <span ><b style="color: rgb(255, 255, 255)">Carnet Identidad</b></span>
                                <input type="text" name="ci" onkeypress='return validaNumericos(event)' class="form-control" id="ci" placeholder="Carnet Identidad" value="{{ old('ci') }}" required autocomplete="nope">
                                @error('ci')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group" id="codes" style="display: none">
                                <span ><b style="color: rgb(255, 255, 255)">Código</b></span>
                                <input type="text" name="code" class="form-control" id="ci" placeholder="Código" value="{{ old('ci') }}" autocomplete="nope">
                                <label class="label label-danger" style="color: rgb(255, 255, 255); font-size: 18px">Digite su codigo de cliente, si no tiene el codigo por favor solicitelo en las oficinas de Coteautri </label>                                                                        

                                @error('ci')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        {{-- <div class="section-title">
                            <h4 style="color: #002576">Acceso</h4>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <span ><b style="color: rgb(255, 255, 255)">Email</b></span>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required autocomplete="nope">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <span ><b style="color: rgb(255, 255, 255)">Contraseña</b></span>
                                <div class="form-group">
                                    <div class="input-group">                                  
                                      <input type="password" class="form-control" name="password" id="password" id="email" placeholder="*********" required>                                 
                                      <div class="input-group-prepend">
                                        <button class="btn btn-primary" type="button" onclick="mostrarContrasena()" id="boton"><span class="fa fa-eye"></span></button>                                   
                                      </div>
                                    </div>
                                </div>    
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                    
                            </div>
                        </div>
                        
                        <br>
    
                        <div style="text-align: right" >
                            <button type="submit" class="btn btn-save-customer" id="btn-sumit" style="background-color: #08acf2;">Registrar</button>
                        </div>
                </div>
                <div class="col-lg-3" >
                </div>
    
            </div>
             
        </div>

    </div>

  </section>
</form>   


<script src="{{asset('js/jquery.min.js')}}"></script>

    <script>        
        function mostrarContrasena(){
            // alert(1)
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

    <script>
        $(function()
        {
            $('#type').on('change', input_code);
        }); 
        function input_code()
        {      
            var aux =  $(this).val();
            // alert(1)
            var x = document.getElementById("codes");
            if(aux == 'Otros')
            {
                x.style.display = "none";
            }
            else
            {
                x.style.display = "block";
            }
        }
    </script>



@endsection
