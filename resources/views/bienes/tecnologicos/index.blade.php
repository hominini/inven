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
            <strong>Bienes Tecnológicos</strong>
          </p>
        </div>
      </div>

      <!-- Right side -->
      <div class="level-right">
        <p class="level-item"><a href="{{ route('bienes_tecnologicos.create') }}" class="button is-success">Nuevo Ítem</a></p>
      </div>
    </nav>

    <table class="table is-fullwidth is-hoverable">
      <thead>
        <tr>
          <th >Código</th>
          <th >Nombre del Bien</th>
          <th >Fecha de Adquisición</th>
          <th >Ubicación</th>
          <th width="280px">Acción</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($bienes_tecnologicos as $bt)
        <tr>
          <th>{{ $bt->bien_control_administrativo->codigo_barras }}</th>
          <td>{{ $bt->bien_control_administrativo->bien->nombre }}</td>
          <td>{{ $bt->bien_control_administrativo->bien->fecha_de_adquisicion }}</td>
          <td>{{ $bt->bien_control_administrativo->bien->ubicacion->nombre }}</td>
          <td>
            <form action="{{ route('bienes_tecnologicos.destroy', $bt->id) }}" method="POST">
                <a class="button is-primary" href="{{ route('bienes_tecnologicos.show', $bt->id) }}">Mostrar</a>
                <a class="button is-warning" href="{{ route('bienes_tecnologicos.edit', $bt->id) }}">Editar</a>
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