@extends('layouts.admin')

@section('content')

<div class="card">

<div class="card-content">

  <!-- Main container -->
    <nav class="level">
      <!-- Left side -->
      <div class="level-left">
        <div class="level-item">
          <p class="subtitle is-5">
            <strong>Listado de Muebles</strong>
          </p>
        </div>
      </div>

      <!-- Right side -->
      <div class="level-right">
        <p class="level-item"><a href="{{ route('muebles.create') }}" class="button is-success">Nuevo Ítem</a></p>
        <p class="level-item"><a href="{{ route('download') }}" class="button is-success">Descargar</a></p>
      </div>
    </nav>

    <table class="table is-fullwidth is-hoverable">
      <thead>
        <tr>
          <th >Código</th>
          <th >Nombre del Artículo</th>
          <th >Fecha de Adquisición</th>
          <th >Ubicación</th>
          <th width="280px">Acción</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($mueblesReturn as $mueble)
        <tr>
          <th>{{ $mueble['codigo'] }}</th>
          <td>{{ $mueble['nombre'] }}</td>
          <td>{{ $mueble['fecha_de_adquisicion'] }}</td>
          <td>{{ $mueble['ubicacion']->nombre }}</td>
          <td>
            <form action="{{ route('muebles.destroy', $mueble['id']) }}" method="POST">
                <a class="button is-primary" href="{{ route('muebles.show', $mueble['id']) }}">Mostrar</a>
                <a class="button is-warning" href="{{ route('muebles.edit', $mueble['id']) }}">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="button is-danger">Borrar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
