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
            <strong>Listado de Asignaciones de Tareas</strong>
          </p>
        </div>
      </div>

      <!-- Right side -->
      @if(Auth::user()->es_administrador == 1)
      <div class="level-right">
        <p class="level-item"><a href="{{ route('asignacionesTareas.create') }}" class="button is-success">Asignar tarea</a></p>
      </div>
      @endif

    </nav>

    <table class="table is-fullwidth is-hoverable">
      <thead>
        <tr>
          <th >Usuario Asignado</th>
          <th >Ubicación de la Tarea</th>
          <th >Tipo de Tarea</th>
          <th >Estado</th>
          <th width="280px">Acción</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($asignaciones_tareas as $asignacion)
        <tr>
          <th>{{ $asignacion->usuario->nombres }} {{ $asignacion->usuario->apellidos }}</th>
          <td>{{ $asignacion->ubicacion->nombre }}</td>
          <td>{{ $asignacion->tipo }}</td>
          <td>{{ $asignacion->completada ? 'Completada' : 'Pendiente' }}</td>
          <td>
            <form action="{{ route('asignacionesTareas.destroy', $asignacion->id) }}" method="POST">
                <a class="button is-primary" href="{{ route('asignacionesTareas.show', $asignacion->id) }}">Mostrar</a>
                @if(Auth::user()->es_administrador == 1)
                <a class="button is-warning" href="{{ route('asignacionesTareas.edit', $asignacion->id) }}">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="button is-danger">Borrar</button>
                @endif

            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
