@extends('bienes.crear')

@section('campos_propios')
  @section('action', '/bienes_tecnologicos')
  
  {{--
  <div class="field">
    <label class="label">Id Tipo de Bien</label>
    <input type="text" class="input" id="id_tipo_de_bien" name="id_tipo_de_bien" >
  </div>
  --}}

  <div class="field">
    <label class="label">Número de Serie</label>
    <input type="text" class="input" id="numero_de_serie" name="numero_de_serie">
  </div>

  <div class="field">
    <label class="label">Modelo</label>
    <input type="text" class="input" id="modelo" name="modelo">
  </div>

  <div class="field">
    <label class="label">Marca</label>
    <input type="text" class="input" id="marca" name="marca">
  </div>

  <div class="field">
    <label class="label">Proveedor</label>
    <input type="text" class="input" id="proveedor" name="proveedor">
  </div>

  <div class="field">
      <label class="label">Software asociado</label class="label">
      <textarea class="textarea"  rows='3' id="software_asociado" name="software_asociado"></textarea>
  </div>

@endsection
