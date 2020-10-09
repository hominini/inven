@extends('layouts.admin')

@section('content')

<div class="card">

<div class="card-content">

  <!-- Main container -->
    <nav class="level">
      <!-- Left side -->
      <div class="level-left">
        <div class="level-item">
          <p class="subtitle is-5">
            <strong>Bienes Tecnológicos</strong>
          </p>
        </div>
      </div>

      <!-- Right side -->
      <div class="level-right">
        <p class="level-item"><a href="{{ route('bienes_tecnologicos.create') }}" class="button is-success">Nuevo Ítem</a></p>
      </div>
    </nav>

    <table class="table is-fullwidth is-hoverable">
      <thead>
        <tr>
          <th >Código</th>
          <th >Nombre del Bien</th>
          <th >Fecha de Adquisición</th>
          <th >Ubicación</th>
          <th width="280px">Acción</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($bienes_tecnologicos as $bt)
        <tr>
          <th>{{ $bt->bien_control_administrativo->bien->codigo_barras }}</th>
          <td>{{ $bt->bien_control_administrativo->bien->nombre }}</td>
          <td>{{ $bt->bien_control_administrativo->bien->fecha_de_adquisicion }}</td>
          <td>{{ $bt->bien_control_administrativo->bien->ubicacion->nombre }}</td>
          <td>
            <form action="{{ route('bienes_tecnologicos.destroy', $bt->id) }}" method="POST">
                <a class="button is-primary" href="{{ route('bienes_tecnologicos.show', $bt->id) }}">Mostrar</a>
                <a class="button is-warning" href="{{ route('bienes_tecnologicos.edit', $bt->id) }}">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="button is-danger">Borrar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@section('custom_scripts')
<script type="text/javascript">
  $(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('assessment.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            // nombre de la institucion
            {data: 'name', name: 'institutions.name'},
            // informacion del hito
            {
                data: 'milestone_number',
                name: 'milestones.milestone_number',
                render: function (data, type, row) {
                    return '<strong>' + row.milestone_number + '</strong> ' + row.description;
                },
            },
            // fecha de cumplimiento
            {data: 'fulfillment_date', name: 'fulfillment_date'},
            // columna de botones
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                    column.search(val ? val : '', true, false).draw();
                });
            });
        },
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        responsive: true,
    });


    $('body').on('click', '.grade', function () {
      var activity_id = $(this).data('id');
      console.log(activity_id);
      $.get("{{ route('fulfillment_activities.index') }}" +'/' + activity_id +'/edit', function (data) {
          $('#modelHeading').html("Editar actividad");
          $('#saveBtn').val("edit-activity");
          $('#ajaxModel').modal('show');
          $('#activity_id').val(data.id);
          $('#fulfillment_id').val(data.fulfillment_id);
          $('#activity_summary').val(data.activity_summary);
      }) 
   });
});
</script>

@endsection


@endsection
