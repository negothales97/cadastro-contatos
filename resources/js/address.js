$(document).on('click', '.btn-add-address', function () {
    const input =
        `<fieldset class="address">
            <legend>
                <button class="btn btn-link btn-add-address" type="button">Adicionar outro
                    endereço</button>
                    <button type="button" class="btn btn-danger btn-sm btn-address-remove">
                        <i class="fas fa-times"></i>
                    </button>
            </legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>CEP</label>
                        <input type="text" name="zip_code[]" data-inputmask="'mask': '99999-999'" class="form-control input-cep zip_code" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Rua</label>
                        <input type="text" name="street[]" class="form-control street" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nº</label>
                        <input type="text" name="number[]" class="form-control number" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Bairro</label>
                        <input type="text" name="district[]" class="form-control district" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cidade</label>
                        <input type="text" name="city[]" class="form-control city" required />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>UF</label>
                        <select class="form-control uf" name="uf[]" required>
                            <option value="" disabled selected>...</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>
                    </div>
                </div>
            </div>
        </fieldset>`;
    $('#list-address').append(input);
});

$(document).on('click', '.btn-address-remove', function () {
    let inputGroup = $(this).closest('.address');
    inputGroup.remove();
});
