$('#btnAddCategory').on('click', function () {
    $('#modalCategory').modal('show');
});
$('#modalCategory form').on('submit', async function (e) {
    e.preventDefault();
    const action = $(this).attr('action');
    let name = $('#category-name').val();

    try {
        const {
            data,
            status
        } = await axios.post(action, {
            name
        });

        if (status === 201) {
            let {
                category
            } = data;
            $('#contact-category_id')
                .append(`<option value="${category.id}">${category.name}</option>`);
        }
        $('#category-name').val('');
        $('#modalCategory').modal('hide');

    } catch (error) {
        console.log(error);
    }
});
