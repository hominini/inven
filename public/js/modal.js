// En este archivo poner todos los metodos que manejan submits desde ventanas
// modales
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

(function() {
    var httpRequest;
    document.getElementById('modalUbicacion').addEventListener('click', makeRequest);


    function makeRequest() {

        var nombre = document.getElementById('nombre_ubicacion').value;
        var nombre_cuarto = document.getElementById('nombre_cuarto').value;
        var comentarios = document.getElementById('comentarios').value;
        var csrf_token = document.getElementById('csrf_token').content;

        httpRequest = new XMLHttpRequest();

        if (!httpRequest) {
          alert('Abortando :( No se puede crear una instancia XMLHttpRequest');
          return false;
        }

        httpRequest.onreadystatechange = alertContents;
        httpRequest.open('POST', '/ubicaciones');
        httpRequest.send(
          "_token=" + csrf_token +
          "&nombre=" + nombre +
          "&nombre_cuarto=" + nombre_cuarto +
          "&comentarios=" + comentarios
        );
        alert(httpRequest.status);
    }

    function alertContents() {

        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                alert(httpRequest.responseText);
            } else {
                alert('There was a problem with the request.');
              }
          }
    }
}

)()
