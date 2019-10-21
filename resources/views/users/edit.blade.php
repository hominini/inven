@extends('layouts.admin')

@section('content')

<div class="card">

    <header class="card-header">
        <p class="card-header-title">
        Actualizar Registro
        </p>
        <a class="card-header-icon" aria-label="more options" href="{{ route('users.index') }}">
            Atrás
        </a>
    </header>

    <div class="card-content">
        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}

            <div class="field">
                <label class="label">Nombres</label>
                {!! Form::text(
                    'nombres',
                    null,
                    [
                        'placeholder' => 'Nombres',
                        'class' => ($errors->has('nombres')) ? 'input is-danger' : 'input',
                        'id' => 'nombres'
                    ]
                ) !!}
                @error('nombres')
                    <p id="nombresErrorMsg" class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Apellidos</label>
                {!! Form::text(
                    'apellidos',
                    null,
                    [
                        'placeholder' => 'Apellidos',
                        'class' => ($errors->has('apellidos')) ? 'input is-danger' : 'input',
                        'id' => 'apellidos'
                    ]
                ) !!}
                @error('apellidos')
                    <p id="apellidosErrorMsg" class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Correo electrónico</label>
                {!! Form::email(
                    'email',
                    null,
                    array(
                        'placeholder' => 'Correo electrónico institucional',
                        'class' => ($errors->has('email')) ? 'input is-danger' : 'input',
                        'id' => 'email'
                    )) !!}
                @error('email')
                    <p id="emailErrorMsg" class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Número de Cédula</label>
                {!! Form::text(
                    'cedula', null,
                    [
                        'placeholder' => 'Cédula o Pasaporte',
                        'class' => ($errors->has('cedula')) ? 'input is-danger' : 'input',
                        'id' => 'cedula'
                    ]
                ) !!}
                @error('cedula')
                    <p id="cedulaErrorMsg" class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Contraseña</label>
                {!! Form::password(
                    'password',
                    [
                        'placeholder' => 'Contraseña',
                        'class' => ($errors->has('password')) ? 'input is-danger' : 'input',
                        'id' => 'password'
                    ]
                ) !!}
                @error('password')
                    <p id="passwordErrorMsg" class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Confirmación de contraseña</label>
                {!! Form::password('password_confirmation', ['placeholder' => 'Confirmar contraseña','class' => 'input', 'id' => 'password_confirmation']) !!}
                @error('password_confirmation')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

          <button type="submit" class="button is-primary">Guardar</button>

        {!! Form::close() !!}
    </div>

</div>
        

@endsection
