@extends('bienes.editar')

@section('campos_propios')

            @section('action', 'muebles')
            <div class="form-group">
              <label for="id_tipo_de_bien">Id Tipo de Bien</label>
              <input type="text" class="form-control" id="id_tipo_de_bien" name="id_tipo_de_bien" >
            </div>

            <div class="form-group">
              <label for="color">Color</label>
              <input type="text" class="form-control" id="color" name="color">
            </div>

            <div class="form-group">
              <label for="dimensiones">Dimensiones</label>
              <input type="text" class="form-control" id="dimensiones" name="dimensiones">
            </div>
@endsection
