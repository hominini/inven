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
        <form action="@yield('action', '/bienes')" enctype="multipart/form-data" method="post">

            @csrf

            <div class="field">
                <label class="label" class="label class="label"">Ubicacion</label class="label">
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

            {{--
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalCrearUbicacion">
                +
            </button>
            --}}
            
            <div class="field">
                <label class="label" class="label class="label"">Nombre</label class="label">
                <input type="text" class="input" id="nombre" name="nombre" placeholder="Nombre del bien">
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
                <input type="text" class="input" id="codigo" name="codigo">
            </div>

            <div class="field">
                <label class="label">Usuario Final</label class="label">
                <select class="input" id="id_usuario_final" name="id_usuario_final">
                    <option value="" disabled selected>Seleccione el usuario final</option>
                    @foreach ($usuarios_finales as $uf)
                    <option value="{{$uf->id}}">{{$uf->nombre . " " . $uf->apellidos }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label class="label">Fecha de Adquisición</label class="label">
                <input type="date" class="input" id="fecha_de_adquisicion" name="fecha_de_adquisicion">
            </div>

            <div class="field">
                <label class="label">Acta de Recepción</label class="label">
                <input type="file" class="input-file" id="acta_de_recepcion" name="acta_de_recepcion">
            </div>

            <div class="field">
                <label class="label">Período de Garantía</label class="label">
                <input type="number" min="0" max="50"  step="1" class="input" id="periodo_de_garantia" name="periodo_de_garantia">
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
                <textarea class="textarea" rows='3' id="observaciones" name="observaciones"></textarea>
            </div>

            <div class="field">
                <label class="label">Caducidad</label class="label">
                <input type="date" class="input" id="caducidad" name="caducidad">
            </div>

            <div class="field">
                <label class="label">Peligrosidad</label class="label">
                <input type="text" class="input" id="peligrosidad" name="peligrosidad">
            </div>

            <div class="field">
                <label class="label">Manejo Especial</label class="label">
                <textarea class="textarea" rows='3' id="manejo_especial" name="manejo_especial"></textarea>
            </div>

            <div class="field">
                <label class="label">Valor Unitario</label class="label">
                <input type="text" class="input" id="valor_unitario" name="valor_unitario">
            </div>

            <div class="field">
                <label class="label">Vida Útil</label class="label">
                <input type="number" min="0" max="50"  step="1" class="input" id="vida_util" name="vida_util">
            </div>

            {{-- <div class="field">
                <label class="label">Id Actividad</label class="label">
                <input type="text" class="input" id="id_actividad" name="id_actividad">
            </div> --}}

            <div class="form-check">
                <label class="label" class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="en_uso" name="en_uso">En Uso
                </label class="label">
            </div>

            <div class="field">
                <label class="label">Descripción</label class="label">
                <textarea class="textarea"  rows='3' id="descripcion" name="descripcion"></textarea>
            </div>

            @yield('campos_propios')

            <button type="submit" class="button is-primary">Guardar</button>

        </form>
    </div>

</div>
        
    <!-- Modales-->
    @include('ubicaciones.modal-crear')
    <!-- Scripts -->
    <script src="{{ asset('js/modal.js') }}" ></script>
    <script src="{{ asset('js/helpers.js') }}" defer></script>



@endsection
