require('./bootstrap');
$('.btn-remove').on('click', function () {
    let action = $(this).data('action');
    $('#formDelete').attr('action', action);
    $('#modalDelete').modal('show');
});
