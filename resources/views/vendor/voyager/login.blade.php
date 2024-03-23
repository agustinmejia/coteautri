@extends('voyager::auth.master')

@section('content')
    <div class="login-container">

        <p>{{ __('voyager::login.signin_below') }}</p>

        <form action="{{ route('voyager.login') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group form-group-default" id="emailGroup">
                <label>{{ __('voyager::generic.email') }}</label>
                <div class="controls">
                    <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('voyager::generic.email') }}" class="form-control" required>
                </div>
            </div>

            <div class="form-group form-group-default" id="passwordGroup">
                <label>{{ __('voyager::generic.password') }}</label>
                <div class="controls">
                    <input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}" class="form-control" required>
                </div>
            </div>

            <div class="form-group" id="rememberMeGroup">
                <div class="controls">
                    <input type="checkbox" name="remember" id="remember" value="1"><label for="remember" class="remember-me-text">{{ __('voyager::generic.remember_me') }}</label>
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-block btn-primary">
                    <span class="signingin hidden"><span class="voyager-refresh"></span> {{ __('voyager::login.loggingin') }}...</span>
                    <span class="signin">{{ __('voyager::generic.login') }}</span>
                </button>
            </div>

        </form>

        {{-- <a href="{{url('/')}}" class="btn btn-block btn-dark">Volver</a> --}}
        <br>
        <div class="col-md-6">
            <a id="idA_PWD_SwitchToFido" name="switchToFido" href="{{route('resetpassword.index')}}" data-bind="text: fidoLinkText, click: switchToFidoCredLink_onClick">Olvidatse Tu Contraseña?</a>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ url('register') }}">Registrarse</a>
        </div>

        <div style="clear:both"></div>

        @if(!$errors->isEmpty())
            <div class="alert alert-red">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-12 text-center">
            <br>
        </div>
        <div class="col-md-12">
            <a href="{{ url('/auth/redirect') }}?social=google" class="btn btn-block btn-default" style="background-color: #D9534F; color: white">
                <span class=""> <i class="bi bi-google"></i> &nbsp; Iniciar con Google</span>
            </a>
            <a href="{{ url('/auth/redirect') }}?social=facebook" class="btn btn-block btn-primary" style="background-color: #257DF1; color: white">
                <span class=""> <i class="bi bi-facebook"></i> &nbsp; Iniciar con Facebook</span>
            </a>
            <br>
            <div class="text-center">
                <a href="{{ url('/') }}">Volver a la página principal</a>
            </div>
        </div>
    </div> <!-- .login-container -->
@endsection

@section('pre_css')
    <style>
        .login-container{
            top: 40% !important
        }
        .login-sidebar{
            height: 100vh;
            overflow: auto !important;
        }
    </style>
@endsection

@section('post_js')

    <script>
        var btn = document.querySelector('button[type="submit"]');
        var form = document.forms[0];
        var email = document.querySelector('[name="email"]');
        var password = document.querySelector('[name="password"]');
        btn.addEventListener('click', function(ev){
            if (form.checkValidity()) {
                btn.querySelector('.signingin').className = 'signingin';
                btn.querySelector('.signin').className = 'signin hidden';
            } else {
                ev.preventDefault();
            }
        });
        email.focus();
        document.getElementById('emailGroup').classList.add("focused");

        // Focus events for email and password fields
        email.addEventListener('focusin', function(e){
            document.getElementById('emailGroup').classList.add("focused");
        });
        email.addEventListener('focusout', function(e){
            document.getElementById('emailGroup').classList.remove("focused");
        });

        password.addEventListener('focusin', function(e){
            document.getElementById('passwordGroup').classList.add("focused");
        });
        password.addEventListener('focusout', function(e){
            document.getElementById('passwordGroup').classList.remove("focused");
        });

    </script>
@endsection