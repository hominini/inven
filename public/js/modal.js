
(function() {

    // El ambito del request debe ser local, para evitar conflictos
    var httpRequest;

    // Se registra el metodo que manejara el submit de datos en el formulario modal
    document.getElementById('modalUbicacion').addEventListener('click', almacenarUbicacion);

    // Guarda asincronicamente los datos de ubicación
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
            refrescarUbicaciones(httpRequest.response);
            resetearFormulario();
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

    // Actualiza el select, agregandole el registro recién creado
    function refrescarUbicaciones(ubicacion) {
        // Referencia al select de ubicaciones
        var select = document.getElementById('id_ubicacion');
        // Define la nueva opción a ser agregada
        var opcion = document.createElement("option");
        // Establece los atributos del elemento option
        opcion.text = ubicacion.nombre;
        opcion.value = ubicacion.id;
        opcion.setAttribute('selected', true);
        // Agrega la opción al select
        select.add(opcion);
    }

    // Limpia los campos de un formulario
    function resetearFormulario()
    {
        document.getElementById("FormularioModalUbicacion").reset();
    }

})();
