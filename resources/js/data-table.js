var dataTable = $('#table-contact').DataTable({
    "paging": true,
    "searching": true,
    "ordering": true,
    order: [[1, 'asc']],
    rowGroup: {
        dataSrc: 1
    }
});

$('#input-search').on('keyup click', function () {
    dataTable.search(
        $('#input-search').val(),
    ).draw();
});
