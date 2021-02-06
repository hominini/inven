<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <!-- Scripts -->

</head>
<body>

<section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-black">Login</h3>
                    <hr class="login-hr">
                    <p class="subtitle has-text-black">Por favor, ingrese para continuar.</p>
                    <div class="box">
                        <figure class="avatar">
                            <img style="max-width: 104px;" src="{{ asset('imgs/logo.jpg') }}">
                        </figure>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf   
                            <div class="field">
                                <div class="control">
                                    <input id="email" type="email" placeholder="Correo electrónico" class=" input is-large form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input id="password" type="password" placeholder="Contraseña" class="input is-large form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="field">
                                <label class="checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Recordarme
                                </label>
                            </div>
                            <button class="button is-block is-info is-large is-fullwidth">Ingresar <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <p class="has-text-grey">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('¿Olvidó su Contraseña?') }}
                        </a> &nbsp;·&nbsp;
                    </p>
                </div>
            </div>
        </div>
</section>
</body>
</html>