@extends('voyager::auth.master')

@section('content')
    <div class="login-container">
        <p>REGÍSTRATE AQUÍ:</p>
        <form action="{{ route('coteautri.store') }}" method="POST">
            @csrf
            <div class="form-group form-group-default" id="emailGroup">
                <label>Tipo de registro</label>
                <div class="controls">
                    <select name="type" class="form-control select2" >
                        <option value="" disabled selected>--Seleccione una opción--</option>
                        <option value="Usuario" {{ old('type')=='Usuario'?'selected':'' }}>Usuario</option>
                        <option value="Socio" {{ old('type')=='Socio'?'selected':'' }}>Socio</option>
                        <option value="Otros" {{ old('type')=='Otros'?'selected':'' }}>Otros</option>
                    </select>
                </div>
            </div>

            <div class="form-group form-group-default col-md-6" id="passwordGroup">
                <label>Teléfono</label>
                <div class="controls">
                    <input type="text" id="phone" name="phone" class="form-control"  placeholder="Telefono" onkeypress='return validaNumericos(event)' value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group form-group-default col-md-6" id="passwordGroup">
                <label>CI</label>
                <div class="controls">
                    <input type="text" name="ci" onkeypress='return validaNumericos(event)' class="form-control" id="ci" placeholder="Carnet Identidad" value="{{ old('ci') }}" required autocomplete="none">
                    @error('ci')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group form-group-default col-md-6">
                <label>Nombre(s)</label>
                <div class="controls">
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Nombre" value="{{ old('first_name') }}" required autocomplete="none">
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group form-group-default col-md-6">
                <label>Apellidos</label>
                <div class="controls">
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellido" value="{{ old('last_name') }}" required autocomplete="none">
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group form-group-default col-md-6">
                <label>Email</label>
                <div class="controls">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required autocomplete="none">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group form-group-default col-md-6">
                <label>Contraseña</label>
                <div class="controls">
                    <input type="password" class="form-control" name="password" id="password" id="email" autocomplete="none" required>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group" id="rememberMeGroup">
                <div class="controls">
                    <label class="checkbox-inline"><input type="checkbox" name="terms" value="1" required>Estoy de acuerdo con los <a href="#">Términos y Condiciones</a> de uso</label>
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-block btn-primary">
                    <span class="signingin hidden"><span class="voyager-refresh"></span> {{ __('voyager::login.loggingin') }}...</span>
                    <span class="signin">Registrarse</span>
                </button>
            </div>
        </form>
        <div class="col-md-12 text-center">
            <span>O</span>
            <br>
        </div>
        <div class="col-md-12">
            <a href="{{ url('/auth/redirect') }}?social=google" class="btn btn-block btn-default" style="background-color: #D9534F; color: white">
                <span class=""> <i class="bi bi-google"></i> &nbsp; Registrarse con Google</span>
            </a>
            <a href="{{ url('/auth/redirect') }}?social=facebook" class="btn btn-block btn-primary" style="background-color: #257DF1; color: white">
                <span class=""> <i class="bi bi-facebook"></i> &nbsp; Registrarse con Facebook</span>
            </a>
            <br>
            <div class="text-center">
                <a href="{{ url('/') }}">Volver a la página principal</a>
            </div>
        </div>
    </div>
    <!-- .login-container -->
@endsection

@section('pre_css')
    <style>
        .login-container{
            top: 30% !important
        }
        .login-sidebar{
            height: 100vh;
            overflow: auto !important;
        }
    </style>
@endsection

@section('post_js')
    <script>
    </script>
@endsection
