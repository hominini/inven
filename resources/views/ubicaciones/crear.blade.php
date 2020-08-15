@extends('layouts.admin')

@section('content')

<div class="card">

<div class="card-content">
<header class="card-header">
        <p class="card-header-title">
        Ingresar Registro
        </p>
        <a class="card-header-icon" aria-label="more options" href="{{ route('muebles.index') }}">
            Atrás
        </a>
    </header>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

         @if ($errors->any())
         <div class="notification is-danger is-light">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button class="delete"></button>
        </div>


        @endif
            <form action="@yield('action', '/ubicaciones')" method="POST">
                @csrf

                <div class="field">
                    <div class="control">
                        <input name="nombre" class="input is-primary" type="text" placeholder="Nombre">
                    </div>
                    </div>

                    <div class="field">
                    <div class="control">
                        <input name="nombre_edificio" class="input is-primary" type="text" placeholder="Nombre de la construccion">
                    </div>
                    </div>

                    <div class="field">
                    <div class="control">
                        <input name="nombre_cuarto" class="input is-primary" type="text" placeholder="Nombre del cuarto">
                    </div>
                    </div>

                    <div class="field">
                    <div class="control">
                        <input name="comentarios" class="input is-primary" type="text" placeholder="Comentarios">
                    </div>
                    </div>

                <button type="submit" class="button is-primary">Guardar</button>

            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
