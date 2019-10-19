@extends('layouts.admin')

@section('content')

<div class="card">

    <header class="card-header">
        <p class="card-header-title">
        Ingresar Registro
        </p>
        <a class="card-header-icon" aria-label="more options" href="{{ route('muebles.index') }}">
            Atrás
        </a>
    </header>

    <div class="card-content">
        <form action="/asignacionesTareas" method="post">

            @csrf

          <div class="field">
              <label class="label">Usuario a asignar</label class="label">
              <div class="control">
                  <div class="select is-fullwidth">
                      <select id="id_usuario" name="id_usuario">
                          <option value="" disabled selected>Seleccione un usuario</option>
                          @foreach ($usuarios as $usuario)
                              <option value="{{$usuario->id}}">{{$usuario->nombres}}</option>
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
                          <option value="" disabled selected>Seleccione una ubicación</option>
                          @foreach ($ubicaciones as $ubicacion)
                              <option value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
          </div>

          <div class="field">
              <label class="label">Descripción</label class="label">
              <textarea class="textarea"  rows='3' id="descripcion" name="descripcion"></textarea>
          </div>

          <div class="field">
            <label class="label">Observaciones</label class="label">
            <textarea class="textarea"  rows='3' id="descripcion" name="observaciones"></textarea>
          </div>

          <div class="field">
              <label class="label">Tarea</label class="label">
              <div class="control">
                  <div class="select is-fullwidth">
                      <select id="tipo" name="tipo">
                          <option value="" disabled selected>Seleccione el tipo de tarea</option>
                          @foreach ($tipos as $tipo)
                              <option value="{{$tipo}}">{{$tipo}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
          </div>

          <div class="form-check">
              <label class="label" class="form-check-label">
                  <input type="checkbox" class="form-check-input" id="completada" name="completada">Completada
              </label class="label">
          </div>

          <div class="field">
              <label class="label">Fecha de Asignación</label class="label">
              <input type="date" class="input" id="fecha_asignacion" name="fecha_asignacion">
          </div>


          <button type="submit" class="button is-primary">Guardar</button>

        </form>
    </div>

</div>
        

@endsection
