
const loadingCep = (fieldset) => {
    fieldset.find('.street').val('...');
    fieldset.find('.district').val('...');
    fieldset.find('.city').val('...');
    fieldset.find('.uf').val('...');
}


$(document).on('keyup', '.address .zip_code', function () {
    const cep = $(this).val();
    let fieldset = $(this).closest('fieldset');

    getCep(cep, $(fieldset));
});
const getCep = async (cep, fieldset) => {

    if (cep != "") {
        //Expressão regular para validar o CEP.
        cep = cep.replace(/\D/g, '');
        var validaCep = /^[0-9]{8}$/;
        //Valida o formato do CEP.
        if (validaCep.test(cep)) {
            loadingCep(fieldset);
            const result = await consultCep(cep);
            if (!("erro" in result)) {
                setDataCep(result, fieldset);
            } else {
                Toastify({
                    text: "O CEP informado está incorreto",
                    duration: 3000,
                    style: {
                        background: "#e3342f",
                    }
                }).showToast();
            }
        }
        else {
            cleanFormCep(fieldset);
        }
    } else {
        cleanFormCep(fieldset);
    }
}


const consultCep = async (cep) => {
    const response = await axios.get(`https://viacep.com.br/ws/${cep}/json/`);
    return response.data;
}

const setDataCep = ({ logradouro, bairro, localidade, uf }, fieldset) => {
    fieldset.find('.street').val(logradouro);
    fieldset.find('.district').val(bairro);
    fieldset.find('.city').val(localidade);
    fieldset.find('.uf').val(uf);
}
const cleanFormCep = (fieldset) => {
    // Limpa valores do formulário de cep.
    fieldset.find('.street').val('');
    fieldset.find('.district').val('');
    fieldset.find('.city').val('');
    fieldset.find('.uf').val('');

}
