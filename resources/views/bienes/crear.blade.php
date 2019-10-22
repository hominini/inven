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
                <label class="label" class="label">Ubicacion</label>
                <div class="control">
                    <div class="select is-fullwidth @error('id_ubicacion') is-danger @enderror">
                        <select id="id_ubicacion" name="id_ubicacion">
                            <option value="" disabled selected>Seleccione una ubicación</option>
                            @foreach ($ubicaciones as $ubicacion)
                                <option value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('id_ubicacion')
                    <p id="idUbicacionErrorMsg" class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label" class="label class="label"">Nombre</label>
                {!! Form::text(
                    'nombre',
                    null,
                    [
                        'placeholder' => 'Nombre del bien',
                        'class' => ($errors->has('nombre')) ? 'input is-danger' : 'input',
                        'id' => 'nombre'
                    ]
                ) !!}
                @error('nombre')
                    <p id="nombreErrorMsg" class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Clase</label>
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
                <label class="label">Código</label>
                {!! Form::text(
                    'codigo',
                    null,
                    [
                        'placeholder' => 'Código',
                        'class' => ($errors->has('codigo')) ? 'input is-danger' : 'input',
                        'id' => 'codigo'
                    ]
                ) !!}
                @error('codigo')
                    <p id="codigoErrorMsg" class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Usuario Final</label>
                <select class="input" id="id_usuario_final" name="id_usuario_final">
                    <option value="" disabled selected>Seleccione el usuario final</option>
                    @foreach ($usuarios_finales as $uf)
                    <option value="{{$uf->id}}">{{$uf->nombre . " " . $uf->apellidos }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label class="label">Fecha de Adquisición</label>
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
        
    @section('custom_scripts')
    <script>
        // remover las ayudas visuales que señalan un error de validación en input
        function removeInputErrorFeedbacks(e) {
            // remover clase is-danger en input
            e.target.className = 'input';
            // remover mensaje de error
            if (document.getElementById(e.target.id + 'ErrorMsg') !== null) {
                document.getElementById(e.target.id + 'ErrorMsg').remove();
            }
        }

        // registro de event handlers
        const inputNombre = document.getElementById('nombre');
        inputNombre.addEventListener('input', removeInputErrorFeedbacks);
        const inputIdUbicacion = document.getElementById('id_ubicacion');
        inputIdUbicacion.addEventListener('input', removeInputErrorFeedbacks);
        const inputCodigo = document.getElementById('codigo');
        inputCodigo.addEventListener('input', removeInputErrorFeedbacks);
        
    
    </script>
    @endsection

@endsection
