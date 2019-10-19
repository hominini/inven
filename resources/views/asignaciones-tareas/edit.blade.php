@extends('layouts.admin')

@section('content')

<div class="card">

    <header class="card-header">
        <p class="card-header-title">
        Actualizar Registro
        </p>
        <a class="card-header-icon" aria-label="more options" href="{{ route('asignacionesTareas.index') }}">
            Atrás
        </a>
    </header>

    <div class="card-content">
        <form action="/asignacionesTareas/{{ $asignacion_tarea->id }}" method="POST">
            @csrf
            @method('PUT')

          <div class="field">
              <label class="label">Usuario a asignar</label class="label">
              <div class="control">
                  <div class="select is-fullwidth">
                      <select id="id_usuario" name="id_usuario">
                          <option value="" disabled>Seleccione un usuario</option>
                          @foreach ($usuarios as $usuario)
                                <option
                                    {{ $asignacion_tarea->usuario->id == $usuario->id ? 'selected' : ''}}
                                    value="{{$usuario->id}}"
                                >{{$usuario->nombres}} {{$usuario->apellidos}}
                                </option>
                          @endforeach
                      </select>
                  </div>
              </div>
          </div>

          <div class="field">
              <label class="label">Ubicacion</label class="label">
              <div class="control">
                  <div class="select is-fullwidth">
                      <select id="id_ubicacion" name="id_ubicacion">
                          <option value="" disabled>Seleccione una ubicación</option>
                          @foreach ($ubicaciones as $ubicacion)
                                <option
                                    {{ $asignacion_tarea->ubicacion->id == $ubicacion->id ? 'selected' : '' }}
                                    value="{{$ubicacion->id}}"
                                >{{$ubicacion->nombre}}
                                </option>
                          @endforeach
                      </select>
                  </div>
              </div>
          </div>

          <div class="field">
              <label class="label">Descripción</label class="label">
              <textarea class="textarea"  rows='3' id="descripcion" name="descripcion">{{$asignacion_tarea->descripcion}}</textarea>
          </div>

          <div class="field">
            <label class="label">Observaciones</label class="label">
            <textarea class="textarea"  rows='3' id="descripcion" name="observaciones">{{$asignacion_tarea->observaciones}}</textarea>
          </div>

          <div class="field">
              <label class="label">Tarea</label class="label">
              <div class="control">
                  <div class="select is-fullwidth">
                      <select id="tipo" name="tipo">
                          <option value="" disabled>Seleccione el tipo de tarea</option>
                          @foreach ($tipos as $tipo)
                                <option
                                    {{ $asignacion_tarea->tipo == $tipo ? 'selected' : '' }}
                                    value="{{$tipo}}"
                                >{{$tipo}}
                                </option>
                          @endforeach
                      </select>
                  </div>
              </div>
          </div>

          <div class="form-check">
              <label class="label" class="form-check-label">
                  <input {{$asignacion_tarea->completada == 1 ? 'checked' : ''}} type="checkbox" class="form-check-input" id="completada" name="completada">Completada
              </label class="label">
          </div>

          <div class="field">
                <label class="label">Fecha de Asignación</label class="label">
                <input
                    value="{{ Carbon\Carbon::parse($asignacion_tarea->fecha_asignacion)->toDateString() }}" 
                    type="date" 
                    class="input"
                    id="fecha_asignacion"
                    name="fecha_asignacion"
                >
          </div>


          <button type="submit" class="button is-primary">Guardar</button>

        </form>
    </div>

</div>
        

@endsection
