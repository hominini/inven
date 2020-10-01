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
            <strong>Listado de Bajas</strong>
          </p>
        </div>
      </div>

      <!-- Right side -->

    </nav>

    <table class="table is-fullwidth is-hoverable">
      <thead>

        <tr>
          <th >Fecha</th>

          <th width="280px">Ver</th>
        </tr>

      </thead>
      @foreach ($bajas as $el)
        <tr>
          <td>{{ $el['created_at'] }}</td>
          <td>
                <a class="button is-primary" href="{{ route('bajas.show', $el['id']) }}">Mostrar</a>
          </td>
        </tr>
        @endforeach

      <tbody>

      </tbody>
    </table>
  </div>
</div>



@endsection
