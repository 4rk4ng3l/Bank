// Call the dataTables jQuery plugin
$(document).ready(function () {
    $("#dataTable").DataTable({
        language: {
            search: '<i class="fa fa-filter" aria-hidden="true"></i>',
            searchPlaceholder: "Filtrar registros",
            lengthMenu: "Mostrar _MENU_ entradas",
            info: "Mostrando _START_ de _END_ de _TOTAL_ entradas",
            paginate: {
                first: "Primera",
                last: "Ultima",
                next: "Siguiente",
                previous: "Anterior",
            },
            infoEmpty: "Mostrando 0 a 0 de 0 entradas",
            infoFiltered: "(filtrado de _MAX_ entradas totales",
        },
    });
});
