@extends('layouts.admin')

@section('content')

<div class="card">

<div class="card-content">
<header class="card-header">
        <p class="card-header-title">
        Ingresar Registro
        </p>
        <a class="card-header-icon" aria-label="more options" href="{{ route('muebles.index') }}">
            Atrás
        </a>
    </header>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

         @if ($errors->any())
         <div class="notification is-danger is-light">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button class="delete"></button>
        </div>


        @endif
        <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>
            <form action="@yield('action', '/ubicaciones')" method="POST">
                @csrf

                <div class="field">
                    <div class="control">
                        <input name="nombre" class="input is-danger" type="text" placeholder="Nombre">
                    </div>
                    </div>

                    <div class="field">
                    <div class="control">
                        <input name="nombre_edificio" class="input is-primary" type="text" placeholder="Nombre de la construccion">
                    </div>
                    </div>

                    <div class="field">
                    <div class="control">
                        <input name="nombre_cuarto" class="input is-primary" type="text" placeholder="Nombre del cuarto">
                    </div>
                    </div>

                    <div class="field">
                    <div class="control">
                        <input name="comentarios" class="input is-primary" type="text" placeholder="Comentarios">
                    </div>
                    </div>

                <button class="button is-primary btn-submit">Guardar</button>

            </form>
        </div>
    </div>
</div>
</div>
</div>

<script type="text/javascript">


    $(document).ready(function() {
        $(".btn-submit").click(function(e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var nombre = $("input[name='nombre']").val();
            var nombre_edificio = $("input[name='nombre_edificio']").val();



            $.ajax({
                url: "/ubicaciones",
                type:'POST',
                data: {_token:_token, nombre:nombre, nombre_edificio:nombre_edificio},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });


        });


        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });


</script>
@endsection
