$(document).on('click', '.btn-less-number', function () {
    let inputGroup = $(this).closest('.group');
    inputGroup.remove();
});
$(document).on('click', '.btn-more-number', function () {
    const input =
        `
    <div class="group">
        <span>
            <input type="text" data-inputmask="'mask': '(99) 99999-9999'" class="form-control input-phone" name="numbers[]" required />
        </span>
        <button class="btn btn-success btn-sm btn-more-number" type="button">
            <i class="fas fa-plus"></i>
        </button>
        <button class="btn btn-danger btn-sm btn-less-number" type="button">
            <i class="fas fa-trash"></i>
        </button>
    </div>`
    $('#list-numbers').append(input);
});
