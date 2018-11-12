@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/bienes" method="post">
                @csrf

              <div class="form-group">
                  <label for="id_ubicacion">Id Ubicacion</label>
                  <input type="text" class="form-control" id="id_ubicacion" >
              </div>

              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre">
              </div>

              <div class="form-group">
                  <label for="clase">Clase</label>
                  <input type="text" class="form-control" id="clase">
              </div>

              <div class="form-group">
                  <label for="codigo">Código</label>
                  <input type="text" class="form-control" id="codigo">
              </div>

              <div class="form-group">
                  <label for="id_usuario_final">Id Usuario Final</label>
                  <input type="text" class="form-control" id="id_usuario_final">
              </div>

              <div class="form-group">
                  <label for="fecha_de_adquisicion">Fecha de Adquisición</label>
                  <input type="date" class="form-control" id="fecha_de_adquisicion">
              </div>

              <div class="form-group">
                  <label for="acta_de_recepcion">Acta de Recepción</label>
                  <input type="file" class="form-control-file" id="acta_de_recepcion">
              </div>

              <div class="form-group">
                  <label for="id_responsable">Id Responsable</label>
                  <input type="text" class="form-control" id="id_responsable">
              </div>

              <div class="form-group">
                  <label for="periodo_de_garantia">Período de Garantía</label>
                  <input type="number" min="0" max="50"  step="1" class="form-control" id="periodo_de_garantia">
              </div>

              <div class="form-group">
                  <label for="estado">Estado</label>
                  <select class="form-control" id="estado">
                      <option>Bueno</option>
                      <option>Dañado</option>
                      <option>Regular</option>
                  </select>
              </div>

              <div class="form-group">
                  <label for="imagen">Imagen</label>
                  <input type="file" class="form-control-file" id="imagen">
              </div>

              <div class="form-group">
                  <label for="observaciones">Observaciones</label>
                  <textarea class="form-control" id="observaciones" rows='3'></textarea>
              </div>

              <div class="form-group">
                  <label for="fecha_de_caducidad">Fecha de Caducidad</label>
                  <input type="date" class="form-control" id="fecha_de_caducidad">
              </div>

              <div class="form-group">
                  <label for="peligrosidad">Peligrosidad</label>
                  <input type="text" class="form-control" id="peligrosidad">
              </div>

              <div class="form-group">
                  <label for="manejo_especial">Manejo Especial</label>
                  <textarea class="form-control" id="manejo_especial" rows='3'></textarea>
              </div>

              <div class="form-group">
                  <label for="valor_unitario">Valor Unitario</label>
                  <input type="text" class="form-control" id="valor_unitario">
              </div>

              <div class="form-group">
                  <label for="tiempo_de_vida_util">Tiempo de Vida Útil</label>
                  <input type="number" min="0" max="50"  step="1" class="form-control" id="tiempo_de_vida_util">
              </div>

              <div class="form-group">
                  <label for="id_actividad">Id Actividad</label>
                  <input type="text" class="form-control" id="id_actividad">
              </div>

              <div class="form-check">
                  <label class="form-check-label" for="en_uso">
                      <input type="checkbox" class="form-check-input" id="en_uso">En Uso
                  </label>
              </div>

              <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <textarea class="form-control" id="descripcion" rows='3'></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Guardar</button>

            </form>
        </div>
    </div>
</div>
@endsection
