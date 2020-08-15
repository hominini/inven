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
            <strong>Listado de Libros</strong>
          </p>
        </div>
      </div>

      <!-- Right side -->
      <div class="level-right">
        <p class="level-item"><a href="{{ route('libros.create') }}" class="button is-success">Nuevo Ítem</a></p>
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
        @foreach ($librosReturn as $libro)
        <tr>
          <th>{{ $libro['codigo'] }}</th>
          <td>{{ $libro['nombre'] }}</td>
          <td>{{ $libro['fecha_de_adquisicion'] }}</td>
          <td>{{ $libro['ubicacion']->nombre }}</td>
          <td>
            <form action="{{ route('libros.destroy', $libro['id']) }}" method="POST">
                <a class="button is-primary" href="{{ route('libros.show', $libro['id']) }}">Mostrar</a>
                <a class="button is-warning" href="{{ route('libros.edit', $libro['id']) }}">Editar</a>
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
