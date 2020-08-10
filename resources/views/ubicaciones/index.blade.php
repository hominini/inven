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
            <strong>Listado de Ubicaciones</strong>
          </p>
        </div>
      </div>

      <!-- Right side -->
      <div class="level-right">
        <p class="level-item"><a href="{{ route('ubicaciones.create') }}" class="button is-success">Nueva Ubicacion</a></p>
      </div>
    </nav>

    <table class="table is-fullwidth is-hoverable">
      <thead>

        <tr>
          <th >Nombre</th>
          <th >Descripcion</th>
          <th >Nombre del edificio</th>
          <th width="280px">Acción</th>
        </tr>

      </thead>
      @foreach ($ubicaciones as $u)
        <tr>
          <td>{{ $u['nombre'] }}</td>
          <td>{{ $u['comentarios'] }}</td>
          <td>{{ $u['nombre_edificio'] }}</td>
          <td>
            <form action="{{ route('ubicaciones.destroy', $u['id']) }}" method="POST" id= "myForm">
                <a class="button is-primary" href="{{ route('ubicaciones.show', $u['id']) }}">Mostrar</a>
                <a class="button is-warning" href="{{ route('ubicaciones.edit', $u['id']) }}">Editar</a>
                @csrf
                @method('DELETE')
                <!-- <button onclick="abrirMensaje(this)" type="submit" class="button is-danger">Borrar</button> -->
                <button onclick="abrirMensaje()" type="button" class="button is-danger">Borrar</button>

            </form>
          </td>
        </tr>
        @endforeach

      <tbody>

      </tbody>
    </table>
  </div>
</div>

<script>
function abrirMensaje() {
    var r = confirm("¿Seguro quiere eliminar?");
  if (r == true) {
    document.getElementById("myForm").submit();
  }
}
</script>

@endsection

