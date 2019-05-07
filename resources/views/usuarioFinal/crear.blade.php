@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/ubicaciones" method="POST">
                @csrf

                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre">
                </div>

                <div class="form-group">
                    <label for="nombre_cuarto">Nombre de la Construcción</label>
                    <input type="text" class="form-control" id="nombre_cuarto" name="nombre_cuarto">
                </div>

                <div class="form-group">
                    <label for="comentarios">Comentarios</label>
                    <textarea class="form-control"  rows='3' id="comentarios" name="comentarios"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>

            </form>
        </div>
    </div>
</div>
@endsection
