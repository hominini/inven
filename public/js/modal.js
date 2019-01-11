
(function() {
    // El ambito del request debe ser local, para evitar conflictos
    var httpRequest;

    // Se registra el metodo que manejara el submit de datos en el formulario modal
    document.getElementById('modalUbicacion').addEventListener('click', almacenarUbicacion);

    function almacenarUbicacion() {

        // Se obtiene los datos que se van a almacenar en la bdd
        var nombre = document.getElementById('nombre_ubicacion').value;
        var nombre_cuarto = document.getElementById('nombre_cuarto').value;
        var comentarios = document.getElementById('comentarios').value;
        var csrf_token = document.head.querySelector('meta[name="csrf-token"]').content;

        // Se crea una instancia de un objeto xhr
        httpRequest = new XMLHttpRequest();

        // Se comprueba la creacion del objeto xhr, se aborta el proceso en caso de falla
        if (!httpRequest) {
          alert('Abortando :( No se puede crear una instancia XMLHttpRequest');
          return false;
        }

        // Se agrega el nuevo registro a la pagina en caso de respuesta exitosa
        httpRequest.addEventListener('load', function(event) {
            refrescarUbicaciones(httpRequest.response)
        });

        // Se imprime en la consola la causa del error en dicho caso
        httpRequest.addEventListener('error', function(event) {
            console.log('Error al crear el recurso.');
        });

        httpRequest.open('POST', '/ubicaciones');
        httpRequest.responseType = 'json';
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Se envia la peticion
        httpRequest.send(
          "_token=" + csrf_token +
          "&nombre=" + encodeURIComponent(nombre) +
          "&nombre_cuarto=" + encodeURIComponent(nombre_cuarto) +
          "&comentarios=" + encodeURIComponent(comentarios)
        );

    }

    function refrescarUbicaciones(ubicacion) {

        var select = document.getElementById('id_ubicacion');

        var opcion = document.createElement("option");

        opcion.text = ubicacion.nombre;
        opcion.values = ubicacion.id;
        opcion.setAttribute('selected', true);

        select.add(opcion);

    }

})();
