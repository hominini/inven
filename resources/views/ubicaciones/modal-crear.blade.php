<!-- Modal HTML Markup -->
<div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Ingresar Ubicación</h1>
            </div>
            <div class="modal-body">
              <form>
                  <meta id="csrf_token" ame="_token" content="{{ csrf_token() }}">

                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre_ubicacion" name="nombre">
                  </div>

                  <div class="form-group">
                      <label for="nombre_cuarto">Nombre de la Construcción</label>
                      <input type="text" class="form-control" id="nombre_cuarto" name="nombre_cuarto">
                  </div>

                  <div class="form-group">
                      <label for="comentarios">Comentarios</label>
                      <textarea class="form-control" rows='3' id="comentarios" name="comentarios"></textarea>
                  </div>

                  <button id="modalUbicacion" class="btn btn-primary">Guardar</button>

              </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
