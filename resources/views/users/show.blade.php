@extends('layouts.admin')

@section('content')
<div class="card">

  <header class="card-header">
    <p class="card-header-title">
      <strong>{{ strtoupper($user->nombres) }} {{ strtoupper($user->apellidos) }}</strong>
    </p>
    <a class="card-header-icon" aria-label="more options" href="{{ route('users.index') }}">
        Atrás
    </a>
  </header>

  <div class="card-content">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Correo electrónico:</strong>
            {{ $user->email }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Número de cédula:</strong>
            {{ $user->cedula }}
        </div>
    </div>

  </div>
</div>
@endsection