@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($bien)
            <form action="/bienes/{{ $bien->id }}" method="post">
                @csrf
                @method('PUT')
              <div class="form-group">
                  <label for="id_ubicacion">Id Ubicacion</label>
                  <input type="text" class="form-control" id="id_ubicacion" name="id_ubicacion" value="{{ $bien->id_ubicacion }}" >
              </div>

              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $bien->nombre }}">
              </div>

              <div class="form-group">
                  <label for="clase">Clase</label>
                  <select class="form-control" id="clase" name="clase" value="{{ $bien->clase }}">
                      <option>Control Administrativo</option>
                      <option>Planta y Equipo</option>
                  </select>
              </div>

              <div class="form-group">
                  <label for="codigo">Código</label>
                  <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $bien->codigo }}">
              </div>

              <div class="form-group">
                  <label for="id_usuario_final">Id Usuario Final</label>
                  <input type="text" class="form-control" id="id_usuario_final" name="id_usuario_final" value="{{ $bien->id_usuario_final }}">
              </div>

              <div class="form-group">
                  <label for="fecha_de_adquisicion">Fecha de Adquisición</label>
                  <input type="date" class="form-control" id="fecha_de_adquisicion" name="fecha_de_adquisicion" value="{{ $bien->fecha_de_adquisicion }}">
              </div>

              <div class="form-group">
                  <label for="acta_de_recepcion">Acta de Recepción</label>
                  <input type="file" class="form-control-file" id="acta_de_recepcion" name="acta_de_recepcion" value="{{ $bien->acta_de_recepcion }}">
              </div>

              <div class="form-group">
                  <label for="id_responsable">Id Responsable</label>
                  <input type="text" class="form-control" id="id_responsable" name="id_responsable" value="{{ $bien->id_responsable }}">
              </div>

              <div class="form-group">
                  <label for="periodo_de_garantia">Período de Garantía</label>
                  <input type="number" min="0" max="50"  step="1" class="form-control" id="periodo_de_garantia" name="periodo_de_garantia" value="{{ $bien->periodo_de_garantia }}">
              </div>

              <div class="form-group">
                  <label for="estado">Estado</label>
                  <select class="form-control" id="estado" name="estado" value="{{ $bien->estado }}">
                      <option>Bueno</option>
                      <option>Dañado</option>
                      <option>Regular</option>
                  </select>
              </div>

              <div class="form-group">
                  <label for="imagen">Imagen</label>
                  <input type="file" class="form-control-file" id="imagen" name="imagen" value="{{ $bien->imagen }}">
              </div>

              <div class="form-group">
                  <label for="observaciones">Observaciones</label>
                  <textarea class="form-control" rows='3' id="observaciones" name="observaciones">{{ $bien->observaciones }}</textarea>
              </div>

              <div class="form-group">
                  <label for="fecha_de_caducidad">Fecha de Caducidad</label>
                  <input type="date" class="form-control" id="fecha_de_caducidad" name="fecha_de_caducidad" value="{{ $bien->fecha_de_caducidad }}">
              </div>

              <div class="form-group">
                  <label for="peligrosidad">Peligrosidad</label>
                  <input type="text" class="form-control" id="peligrosidad" name="peligrosidad" value="{{ $bien->peligrosidad }}">
              </div>

              <div class="form-group">
                  <label for="manejo_especial">Manejo Especial</label>
                  <textarea class="form-control" rows='3' id="manejo_especial" name="manejo_especial">{{ $bien->manejo_especial }}</textarea>
              </div>

              <div class="form-group">
                  <label for="valor_unitario">Valor Unitario</label>
                  <input type="text" class="form-control" id="valor_unitario" name="valor_unitario" value="{{ $bien->valor_unitario }}">
              </div>

              <div class="form-group">
                  <label for="tiempo_de_vida_util">Tiempo de Vida Útil</label>
                  <input type="number" min="0" max="50"  step="1" class="form-control" id="tiempo_de_vida_util" name="tiempo_de_vida_util" value="{{ $bien->tiempo_de_vida_util }}">
              </div>

              <div class="form-group">
                  <label for="id_actividad">Id Actividad</label>
                  <input type="text" class="form-control" id="id_actividad" name="id_actividad" value="{{ $bien->en_uso }}">
              </div>

              <div class="form-check">
                  <label class="form-check-label" for="en_uso">
                      <input type="checkbox" class="form-check-input" id="en_uso" name="en_uso" value="{{ $bien->en_uso }}">En Uso
                  </label>
              </div>

              <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <textarea class="form-control"  rows='3' id="descripcion" name="descripcion">{{ $bien->descripcion }}</textarea>
              </div>

              <button type="submit" class="btn btn-primary">Guardar</button>

            </form>
            @endif

        </div>
    </div>
</div>
@endsection
