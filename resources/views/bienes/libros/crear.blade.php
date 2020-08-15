@extends('bienes.crear')

@section('campos_propios')
  @section('action', '/bienes_items_bibliograficos')



  <div class="field">
    <label class="label">Color</label>
    <input type="text" class="input" id="autor" name="autor">
  </div>

  <div class="field">
    <label class="label">Dimensiones</label>
    <input type="text" class="input" id="detalles_de_publicacion" name="detalles_de_publicacion">
  </div>

@endsection
