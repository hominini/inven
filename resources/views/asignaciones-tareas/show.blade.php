@extends('layouts.admin')

@section('content')
<div class="card">

  <header class="card-header">
    <p class="card-header-title">
      Detalles del Ítem
    </p>
    <a class="card-header-icon" aria-label="more options" href="{{ route('asignacionesTareas.index') }}">
        Atrás
    </a>
  </header>

  <div class="card-content">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Usuario al que se le asigna la tarea:</strong>
            {{ $asignacion_tarea->usuario->nombres }} {{ $asignacion_tarea->usuario->apellidos }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Lugar donde realiza la tarea:</strong>
            {{ $asignacion_tarea->ubicacion->nombre }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fecha en que se asignó la tarea:</strong>
            {{ Carbon\Carbon::parse($asignacion_tarea->fecha_asignacion)->isoFormat('LLLL') }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripción:</strong>
            {{ $asignacion_tarea->descripcion }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Observaciones:</strong>
            {{ $asignacion_tarea->observaciones }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Estado de la tarea:</strong>
            {{ $asignacion_tarea->estado == 1 ? 'Tarea completada' : 'En proceso...'}}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tipo de tarea:</strong>
            {{ $asignacion_tarea->tipo }}
        </div>
    </div>

  </div>
</div>
@endsection