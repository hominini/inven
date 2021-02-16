@extends('layouts.admin')

@section('content')

<div class="card">

    <header class="card-header">
        <p class="card-header-title">
            Actualizar Registro
        </p>
        <a class="card-header-icon" aria-label="more options" href="{{ route('bienes_tecnologicos.index') }}">
            Atrás
        </a>
    </header>

    @if ($errors->any())
    <div class="notification is-danger">
        <button class="delete"></button>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card-content">

        @if ($bien)
        <form action="/{{ $tipo_de_bien == 'tecnologicos' ? 'bienes_tecnologicos' : $tipo_de_bien }}/{{ $mueble->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field">
                <label class="label">Ubicación</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select id="id_ubicacion" name="id_ubicacion">
                            @foreach ($ubicaciones as $ubicacion)
                            @if ($ubicacion->id == $bien['id_ubicacion'])
                            <option value="{{$ubicacion->id}}" selected>{{$ubicacion->nombre}}</option>
                            @else
                            <option value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label" class="label class=" label"">Nombre</label class="label">
                <input value="{{$bien['nombre']}}" type="text" class="input" id="nombre" name="nombre" placeholder="Nombre del bien">
            </div>

            <div class="field">
                <label class="label">Clase</label class="label">
                <div class="control">
                    <div class="select is-fullwidth">
                        <select class="input" id="clase" name="clase">
                            <option>CONTROL ADMINISTRATIVO</option>
                            <option>PROPIEDAD, PLANTA Y EQUIPO</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Código</label class="label">
                <input value="{{$bien['codigo_barras']}}" type="text" class="input" id="codigo" name="codigo_barras">
            </div>

            <div class="field">
                <label class="label">Fecha de Adquisición</label class="label">
                <input value="{{$bien['fecha_de_adquisicion']}}" type="date" class="input" id="fecha_de_adquisicion" name="fecha_de_adquisicion">
            </div>

            <div class="field">
                <label class="label">Acta de Recepción</label class="label">
                <input value="{{$bien['acta_de_recepcion']}}" type="file" class="input-file" id="acta_de_recepcion" name="acta_de_recepcion">
            </div>

            <div class="field">
                <label class="label">Período de Garantía</label class="label">
                <input value="{{$bien['periodo_de_garantia']}}" type="number" min="0" max="50" step="1" class="input" id="periodo_de_garantia" name="periodo_de_garantia">
            </div>

            <div class="field">
                <label class="label">Estado</label class="label">
                <select class="input" id="estado" name="estado">
                    <option>Bueno</option>
                    <option>Dañado</option>
                    <option>Regular</option>
                </select>
            </div>

            <div class="field">
                <label class="label">Imagen</label class="label">
                <input type="file" class="input-file" id="imagen" name="imagen">
            </div>

            <div class="field">
                <label class="label">Observaciones</label class="label">
                <textarea class="textarea" rows='3' id="observaciones" name="observaciones">{{$bien['observaciones']}}</textarea>
            </div>

            <div class="field">
                <label class="label">Caducidad</label class="label">
                <input value="{{$bien['caducidad']}}" type="date" class="input" id="caducidad" name="caducidad">
            </div>

            <div class="field">
                <label class="label">Peligrosidad</label class="label">
                <input value="{{$bien['peligrosidad']}}" type="text" class="input" id="peligrosidad" name="peligrosidad">
            </div>

            <div class="field">
                <label class="label">Manejo Especial</label class="label">
                <textarea class="textarea" rows='3' id="manejo_especial" name="manejo_especial">{{$bien['manejo_especial']}}</textarea>
            </div>

            <div class="field">
                <label class="label">Valor Unitario</label class="label">
                <input value="{{$bien['valor']}}" type="text" class="input" id="valor_unitario" name="valor_unitario">
            </div>

            <div class="field">
                <label class="label">Vida Útil</label class="label">
                <input value="{{$bien['vida_util']}}" type="number" min="0" max="50" step="1" class="input" id="vida_util" name="vida_util">
            </div>

            {{-- <div class="field">
                <label class="label">Id Actividad</label class="label">
                <input type="text" class="input" id="id_actividad" name="id_actividad">
            </div> --}}

            <div class="form-check">
                <label class="label" class="form-check-label">
                    <input value="{{$bien['en_uso'] == 1 ? 'checked' : '' }}" type="checkbox" class="form-check-input" id="en_uso" name="en_uso">En Uso
                </label class="label">
            </div>

            <div class="field">
                <label class="label">Descripción</label class="label">
                <textarea class="textarea" rows='3' id="descripcion" name="descripcion">{{$bien['descripcion']}}</textarea>
            </div>

            @includeIf('bienes.' . $tipo_de_bien . '.editar')

            <button type="submit" class="button is-primary">Guardar Cambios</button>

        </form>
        @endif

    </div>
</div>

<!-- Modales-->
@include('ubicaciones.modal-crear')
<script src="{{ asset('js/modal.js') }}"></script>
@endsection