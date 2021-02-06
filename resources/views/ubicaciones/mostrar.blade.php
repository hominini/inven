@extends('layouts.admin')

@section('content')
<div class="card">

  <header class="card-header">
    <p class="card-header-title">
      Detalle
    </p>
    <a class="card-header-icon" aria-label="more options" href="{{ route('asignacionesTareas.index') }}">
        Atrás
    </a>
  </header>

  <div class="card-content">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $ubic-> nombre}}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Edificio:</strong>
            {{ $ubic-> nombre_edificio}}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Cuarto:</strong>
            {{ $ubic-> nombre_cuarto}}
        </div>
    </div>





  </div>
</div>
@endsection
