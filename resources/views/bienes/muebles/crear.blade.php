@extends('bienes.crear')

@section('campos_propios')
  @section('action', '/muebles')
  
  {{--
  <div class="field">
    <label class="label">Id Tipo de Bien</label>
    <input type="text" class="input" id="id_tipo_de_bien" name="id_tipo_de_bien" >
  </div>
  --}}

  <div class="field">
    <label class="label">Color</label>
    <input type="text" class="input" id="color" name="color">
  </div>

  <div class="field">
    <label class="label">Dimensiones</label>
    <input type="text" class="input" id="dimensiones" name="dimensiones">
  </div>

@endsection
