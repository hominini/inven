@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="@yield('action', '/bienes')" method="post">
                @csrf

                <div class="form-group">
                    <label for="id_ubicacion">Ubicacion</label>
                    <select class="form-control" id="id_ubicacion" name="id_ubicacion">
                        <option value="" disabled selected>Seleccione una ubicación</option>
                        @foreach ($ubicaciones as $ubicacion)
                         <option value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalCrearUbicacion">
                    +
                </button>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>

                <div class="form-group">
                    <label for="clase">Clase</label>
                    <select class="form-control" id="clase" name="clase">
                        <option>CONTROL ADMINISTRATIVO</option>
                        <option>PROPIEDAD, PLANTA Y EQUIPO</option>
                    </select>
                </div>

              <div class="form-group">
                  <label for="codigo">Código</label>
                  <input type="text" class="form-control" id="codigo" name="codigo">
              </div>

              <div class="form-group">
                  <label for="id_usuario_final">Usuario Final</label>
                  <select class="form-control" id="id_usuario_final" name="id_usuario_final">
                      <option value="" disabled selected>Seleccione el usuario final</option>
                      @foreach ($usuarios_finales as $uf)
                       <option value="{{$uf->id}}">{{$uf->nombre . " " . $uf->apellidos }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="fecha_de_adquisicion">Fecha de Adquisición</label>
                  <input type="date" class="form-control" id="fecha_de_adquisicion" name="fecha_de_adquisicion">
              </div>

              <div class="form-group">
                  <label for="acta_de_recepcion">Acta de Recepción</label>
                  <input type="file" class="form-control-file" id="acta_de_recepcion" name="acta_de_recepcion">
              </div>

              <div class="form-group">
                  <label for="id_responsable">Id Responsable</label>
                  <input type="text" class="form-control" id="id_responsable" name="id_responsable">
              </div>

              <div class="form-group">
                  <label for="periodo_de_garantia">Período de Garantía</label>
                  <input type="number" min="0" max="50"  step="1" class="form-control" id="periodo_de_garantia" name="periodo_de_garantia">
              </div>

              <div class="form-group">
                  <label for="estado">Estado</label>
                  <select class="form-control" id="estado" name="estado">
                      <option>Bueno</option>
                      <option>Dañado</option>
                      <option>Regular</option>
                  </select>
              </div>

              <div class="form-group">
                  <label for="imagen">Imagen</label>
                  <input type="file" class="form-control-file" id="imagen" name="imagen">
              </div>

              <div class="form-group">
                  <label for="observaciones">Observaciones</label>
                  <textarea class="form-control" rows='3' id="observaciones" name="observaciones"></textarea>
              </div>

              <div class="form-group">
                  <label for="fecha_de_caducidad">Caducidad</label>
                  <input type="date" class="form-control" id="caducidad" name="caducidad">
              </div>

              <div class="form-group">
                  <label for="peligrosidad">Peligrosidad</label>
                  <input type="text" class="form-control" id="peligrosidad" name="peligrosidad">
              </div>

              <div class="form-group">
                  <label for="manejo_especial">Manejo Especial</label>
                  <textarea class="form-control" rows='3' id="manejo_especial" name="manejo_especial"></textarea>
              </div>

              <div class="form-group">
                  <label for="valor_unitario">Valor Unitario</label>
                  <input type="text" class="form-control" id="valor_unitario" name="valor_unitario">
              </div>

              <div class="form-group">
                  <label for="tiempo_de_vida_util">Vida Útil</label>
                  <input type="number" min="0" max="50"  step="1" class="form-control" id="vida_util" name="vida_util">
              </div>

              <div class="form-group">
                  <label for="id_actividad">Id Actividad</label>
                  <input type="text" class="form-control" id="id_actividad" name="id_actividad">
              </div>

              <div class="form-check">
                  <label class="form-check-label" for="en_uso">
                      <input type="checkbox" class="form-check-input" id="en_uso" name="en_uso">En Uso
                  </label>
              </div>

              <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <textarea class="form-control"  rows='3' id="descripcion" name="descripcion"></textarea>
              </div>

              @yield('campos_propios')

              <button type="submit" class="btn btn-primary">Guardar</button>

            </form>
        </div>
    </div>
    <!-- Modales-->
    @include('ubicaciones.modal-crear')
    <!-- Scripts -->
     <script src="{{ asset('js/helpers.js') }}" defer></script>



</div>
@endsection
