<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Open Sans';
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            img {
                padding: 5px;
                border: 1px solid #ccc;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registro</a>
                        @endif
                    @endauth
                </div>
            @endif

            

            <div class="content">
                {{-- <div id="dutylist" class="title m-b-md"></div> --}}
                <section class="hero is-fullheight is-default is-bold">
                    <div class="hero-body">
                        <div class="container has-text-centered">
                            <div class="columns is-vcentered">
                                <div class="column is-5">
                                    <figure class="image is-4by3">
                                        <img src="https://picsum.photos/800/600/?random" alt="Description">
                                    </figure>
                                </div>
                                <div class="column is-6 is-offset-1">
                                    <h1 class="title is-2">
                                        Control de Bienes Yavirac
                                    </h1>
                                    <h2 class="subtitle is-4">
                                        Software para el control de los bienes públicos en custodia del Instituto Superior Tecnológico Yavirac.
                                    </h2>
                                    <br>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hero-foot">
                        <div class="container">
                            <div class="tabs is-centered">
                                <ul>
                                    <li><a>Instituto Superior Tecnológico de Patrimonio y Turismo Yavirac 2019</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="js/app.js"></script>
</html>
