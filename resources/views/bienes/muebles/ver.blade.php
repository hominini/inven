@extends('layouts.app')

@section('content')
<h2>Listado de Muebles</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Nombre del Artículo</th>
      <th scope="col">Fecha de Adquisición</th>
      <th scope="col">Encargado</th>
      <th scope="col">Ubicación</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($mueblesReturn as $mueble)
    <tr>
      <th scope="row">{{ $mueble['codigo'] }}</th>
      <td>{{ $mueble['nombre'] }}</td>
      <td>{{ $mueble['fecha_de_adquisicion'] }}</td>
      <td>{{ "TODO" }}</td>
      <td>{{ $mueble['id_ubicacion'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection