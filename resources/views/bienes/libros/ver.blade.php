@extends('layouts.admin')

@section('content')
<div class="card">

  <header class="card-header">
    <p class="card-header-title">
      Detalles del Ítem
    </p>
    <a class="card-header-icon" aria-label="more options" href="{{ route('muebles.index') }}">
        Atrás
    </a>
  </header>

  <div class="card-content">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre del Bien:</strong>
            {{ $mueble->bien_control_administrativo->bien->nombre }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripción:</strong>
            {{ $mueble->bien_control_administrativo->bien->descripcion }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Código:</strong>
            {{ $mueble->bien_control_administrativo->codigo }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Periodo de Garantía:</strong>
            {{ $mueble->bien_control_administrativo->periodo_de_garantia }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fecha de Caducidad:</strong>
            {{ $mueble->bien_control_administrativo->caducidad }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ubicación:</strong>
            {{ $mueble->bien_control_administrativo->bien->ubicacion->nombre }}
        </div>
    </div>

  </div>
</div>
@endsection
