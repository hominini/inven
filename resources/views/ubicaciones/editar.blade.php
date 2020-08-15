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
        <form action="/ubicaciones/{{ $id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="field">
                    <div class="control">
                        <input value="{{$ubicacion->nombre}}" name="nombre" class="input is-primary" type="text" placeholder="Nombre">
                    </div>
                    </div>

                    <div class="field">
                    <div class="control">
                        <input value="{{$ubicacion->nombre_edificio}}" name="nombre_edificio" class="input is-primary" type="text" placeholder="Nombre de la construccion">
                    </div>
                    </div>

                    <div class="field">
                    <div class="control">
                        <input value="{{$ubicacion->nombre_cuarto}}" name="nombre_cuarto" class="input is-primary" type="text" placeholder="Nombre del cuarto">
                    </div>
                    </div>

                    <div class="field">
                    <div class="control">
                        <input value="{{$ubicacion->comentarios}}" name="comentarios" class="input is-primary" type="text" placeholder="Comentarios">
                    </div>
                    </div>

                <button type="submit" class="button is-primary">Actualizar</button>

            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
