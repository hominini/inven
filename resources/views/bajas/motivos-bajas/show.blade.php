@extends('layouts.admin')

@section('content')
<div class="card">

  <header class="card-header">
    <p class="card-header-title">
      Detalle
    </p>

  </header>

  <div class="card-content">
    <strong>Nombre del Usuario:</strong>
    {{ $usuario->nombres}} {{ $usuario->apellidos}} {{ $usuario->cedula}}</br>

    <strong>Fecha:</strong>
    {{ $baja->created_at}}<br>

    <strong>Motivo baja:</strong>
    {{ $baja->motivo}}</br>

    <strong>Nombre del bien:</strong>
    {{ $bien->nombre}}</br>

    <strong>Código del bien:</strong>
    {{ $bien->codigo_barras}}</br>


    <img src="{{$url}}" alt="profile Pic" height="200" width="200">
  
  </div>
</div>
@endsection