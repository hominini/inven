@extends('layouts.admin')

@section('content')
<div class="card">

  <header class="card-header">
    <p class="card-header-title">
      Detalles del Ítem
    </p>

  </header>

  <div class="card-content">
    <strong>Nombre del Usuario:</strong>
    {{ $usuario->nombres}} {{ $usuario->apellidos}} {{ $usuario->cedula}}</br>

    <strong>Fecha:</strong>
    {{ $baja->created_at}}<br>

    <strong>Motivo baja:</strong>
    {{ $baja->motivo}}</br>

    <img src="{{$url}}" alt="profile Pic" height="200" width="200">
  
  </div>
</div>
@endsection