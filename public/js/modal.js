// ésta función contiene a su vez funciones para poder desplegar ventanas modales
// ciertos formularios
{function() {

    // El objeto xhr que almaceará las respuestas de las peticiones.
    // El ambito del request debe ser local, para evitar conflictos de superposición
    // El ambito de la variable xhr debe ser local, para evitar conflictos,
    // posiblemente con otras peticiones xhr inizializadas previamente
    var httpRequest;

    // cross-site request forgery token
    var CSRF_TOKEN = document.head.querySelector('meta[name="csrf-token"]').content;

    // Guarda asincronicamente los datos de ubicación
    function almacenarUbicacion() {
    // Registro de manejadores de evento clic en boton guardar
    document.getElementById('botonCrearUbicacion').addEventListener('click', ingresarUbicacion);
    //document.getElementById('botonCrearUsuarioFinal').addEventListener('click', ingresarUsuarioFinal);

    /**
     * Constructor de peticiones asincronicas (XMLHttpRequest)
     * @return {Object} una referencia al objeto XHRFactory
     */
    function XHRFactory() {
        this.getXHR = function() {
            xhr = new XMLHttpRequest();
            // Se comprueba la creacion del objeto xhr, se aborta el proceso en caso de falla
            if (!xhr) {
              console.log('Abortando :( No se puede crear una instancia XMLHttpRequest');
              return null;
            }

            // Si existe errores, imprimir descripcion del error
            xhr.addEventListener('error', function(event) {
                console.log('Error al crear el recurso.');
            });

            // Se espera json como respuesta
            xhr.responseType = 'json';

            return xhr;
        };
    }

    // Guarda los datos de ubicación
    function ingresarUbicacion() {

        // Se obtiene los datos que se van a almacenar en la bdd
        var nombre = document.getElementById('nombre_ubicacion').value;
        var nombre_cuarto = document.getElementById('nombre_cuarto').value;
        var comentarios = document.getElementById('comentarios').value;
        var csrf_token = CSRF_TOKEN;

        // Se obtiene una instancia de un objeto xhr
        httpRequest = new XHRFactory().getXHR();

        // Se agrega el nuevo registro al select en caso de respuesta exitosa
        httpRequest.addEventListener('load', function(event) {
            // Referencia al select de ubicaciones
            var select = document.getElementById('id_ubicacion');
            // Se prepra la data que se ligara al select
            var text = httpRequest.response.nombre;
            var value = httpRequest.response.id;

            agregarOpcionSelect(text, value, select);
            resetearFormulario(document.getElementById("FormularioModalUbicacion"));

            ubicacion = httpRequest.response;
        });

        httpRequest.open('POST', '/ubicaciones');

        // Se enviara los datos como un formulario codificado en la url
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Se envia la peticion
        httpRequest.send(
          "_token=" + csrf_token +
          "&nombre=" + encodeURIComponent(nombre) +
          "&nombre_cuarto=" + encodeURIComponent(nombre_cuarto) +
          "&comentarios=" + encodeURIComponent(comentarios)
        );

    }

    // Guarda los datos de ubicación
    function ingresarUsuarioFinal() {

        // Se obtiene los datos que se van a almacenar en la bdd
        var nombre = document.getElementById('nombre_ubicacion').value;
        var nombre_cuarto = document.getElementById('nombre_cuarto').value;
        var comentarios = document.getElementById('comentarios').value;
        var csrf_token = CSRF_TOKEN;

        // Se obtiene una instancia de un objeto xhr
        httpRequest = new XHRFactory().getXHR();

        // Se agrega el nuevo registro al select en caso de respuesta exitosa
        httpRequest.addEventListener('load', function(event) {
            // Referencia al select de ubicaciones
            var select = document.getElementById('id_ubicacion');
            // Se prepra la data que se ligara al select
            var text = httpRequest.response.nombre;
            var value = httpRequest.response.id;

            agregarOpcionSelect(text, value, select);
            resetearFormulario(document.getElementById("FormularioModalUbicacion"));

            ubicacion = httpRequest.response;
        });

        httpRequest.open('POST', '/ubicaciones');

        // Se enviara los datos como un formulario codificado en la url
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Se envia la peticion
        httpRequest.send(
          "_token=" + csrf_token +
          "&nombre=" + encodeURIComponent(nombre) +
          "&nombre_cuarto=" + encodeURIComponent(nombre_cuarto) +
          "&comentarios=" + encodeURIComponent(comentarios)
        );

    }

    /**
     * Agrega un elemento option en un select
     * @param  {string} text El texto del option
     * @param  {string} value El valor del atributo value en el option
     * @param  {Object} select Una referencia a un select
     * @return {void}
     */
    function agregarOpcionSelect(text, value, select) {

        // Define la nueva opción a ser agregada
        var opcion = document.createElement("option");

        // Establece los atributos del elemento option
        opcion.text = text;
        opcion.value = value;

        // Establece como selected el elemento option recien creado
        opcion.setAttribute('selected', true);

        // Agrega la opción al select
        select.add(opcion);
    }

    // Limpia los campos de un formulario
    function resetearFormulario(formulario)
    {
        formulario.reset();
    }

})();
