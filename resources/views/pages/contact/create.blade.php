@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Adicionar contato</h4>
                    </div>
                    <form action="{{ route('contact.store') }}" id="contactForm" method="POST" novalidate>
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="contact-name">Nome</label>
                                        <input type="text" id="contact-name" value="{{ old('name') }}" name="name"
                                            class="form-control @error('name') error @enderror" required />
                                        @error('name')
                                            <div class="error-message">{{ $message }}.</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label id="category-label" for="contact-category_id">
                                            <span>Categoria</span>
                                            <button class="btn btn-link" type="button" id="btnAddCategory">Adicionar
                                                categoria</button>
                                        </label>
                                        <select id="contact-category_id" name="category_id"
                                            class="form-control @error('name') error @enderror" required>
                                            <option value="" disabled selected> Selecione..</option>
                                            @foreach ($categories as $category)
                                                <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="error-message">{{ $message }}.</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Número</label>
                                        <div id="list-numbers">
                                            <div class="group">
                                                <span>
                                                    <input type="text" data-inputmask="'mask': '(99) 99999-9999'"
                                                        class="form-control input-phone @error('numbers.*') error @enderror"
                                                        value="{{ old('numbers.0') }}" name="numbers[]" required />
                                                </span>
                                                <button class="btn btn-success btn-sm btn-more-number" type="button">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            @error('numbers.*')
                                                <div class="error-message">{{ $message }}.</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>Endereço</h4>
                                </div>
                            </div>
                            <div id="list-address">
                                <fieldset class="address">
                                    <legend>
                                        <button class="btn btn-link btn-add-address" type="button">Adicionar outro
                                            endereço</button>
                                    </legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CEP</label>
                                                <input type="text" data-inputmask="'mask': '99999-999'" name="zip_code[]"
                                                    value="{{ old('zip_code.0') ?? '' }}"
                                                    class="form-control input-cep @error('zip_code.*') error @enderror zip_code"
                                                    required />
                                                @error('zip_code.*')
                                                    <div class="error-message">{{ $message }}.</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Rua</label>
                                                <input type="text" name="street[]" value="{{ old('street.0') ?? '' }}"
                                                    class="form-control @error('street.*') error @enderror street"
                                                    required />
                                                @error('street.*')
                                                    <div class="error-message">{{ $message }}.</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nº</label>
                                                <input type="text" name="number[]" value="{{ old('number.0') ?? '' }}"
                                                    class="form-control @error('number.*') error @enderror number"
                                                    required />
                                                @error('number.*')
                                                    <div class="error-message">{{ $message }}.</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Bairro</label>
                                                <input type="text" name="district[]"
                                                    value="{{ old('district.0') ?? '' }}"
                                                    class="form-control @error('district.*') error @enderror district"
                                                    required />
                                                @error('district.*')
                                                    <div class="error-message">{{ $message }}.</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Cidade</label>
                                                <input type="text" name="city[]" value="{{ old('city.0') ?? '' }}"
                                                    class="form-control @error('city.*') error @enderror city" required />
                                                @error('city.*')
                                                    <div class="error-message">{{ $message }}.</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>UF</label>
                                                <select class="form-control @error('uf.*') error @enderror uf" name="uf[]"
                                                    value="{{ old('uf.0') ?? '' }}" required>
                                                    <option value="" disabled selected>...</option>
                                                    <option {{ old('uf.0') ?? '' == 'AC' ? 'selected' : '' }} value="AC">
                                                        AC</option>
                                                    <option {{ old('uf.0') ?? '' == 'AL' ? 'selected' : '' }} value="AL">
                                                        AL</option>
                                                    <option {{ old('uf.0') ?? '' == 'AP' ? 'selected' : '' }} value="AP">
                                                        AP</option>
                                                    <option {{ old('uf.0') ?? '' == 'AM' ? 'selected' : '' }} value="AM">
                                                        AM</option>
                                                    <option {{ old('uf.0') ?? '' == 'BA' ? 'selected' : '' }} value="BA">
                                                        BA</option>
                                                    <option {{ old('uf.0') ?? '' == 'CE' ? 'selected' : '' }} value="CE">
                                                        CE</option>
                                                    <option {{ old('uf.0') ?? '' == 'DF' ? 'selected' : '' }} value="DF">
                                                        DF</option>
                                                    <option {{ old('uf.0') ?? '' == 'ES' ? 'selected' : '' }} value="ES">
                                                        ES</option>
                                                    <option {{ old('uf.0') ?? '' == 'GO' ? 'selected' : '' }} value="GO">
                                                        GO</option>
                                                    <option {{ old('uf.0') ?? '' == 'MA' ? 'selected' : '' }} value="MA">
                                                        MA</option>
                                                    <option {{ old('uf.0') ?? '' == 'MT' ? 'selected' : '' }} value="MT">
                                                        MT</option>
                                                    <option {{ old('uf.0') ?? '' == 'MS' ? 'selected' : '' }} value="MS">
                                                        MS</option>
                                                    <option {{ old('uf.0') ?? '' == 'MG' ? 'selected' : '' }} value="MG">
                                                        MG</option>
                                                    <option {{ old('uf.0') ?? '' == 'PA' ? 'selected' : '' }} value="PA">
                                                        PA</option>
                                                    <option {{ old('uf.0') ?? '' == 'PB' ? 'selected' : '' }} value="PB">
                                                        PB</option>
                                                    <option {{ old('uf.0') ?? '' == 'PR' ? 'selected' : '' }} value="PR">
                                                        PR</option>
                                                    <option {{ old('uf.0') ?? '' == 'PE' ? 'selected' : '' }} value="PE">
                                                        PE</option>
                                                    <option {{ old('uf.0') ?? '' == 'PI' ? 'selected' : '' }} value="PI">
                                                        PI</option>
                                                    <option {{ old('uf.0') ?? '' == 'RJ' ? 'selected' : '' }} value="RJ">
                                                        RJ</option>
                                                    <option {{ old('uf.0') ?? '' == 'RN' ? 'selected' : '' }} value="RN">
                                                        RN</option>
                                                    <option {{ old('uf.0') ?? '' == 'RS' ? 'selected' : '' }} value="RS">
                                                        RS</option>
                                                    <option {{ old('uf.0') ?? '' == 'RO' ? 'selected' : '' }} value="RO">
                                                        RO</option>
                                                    <option {{ old('uf.0') ?? '' == 'RR' ? 'selected' : '' }} value="RR">
                                                        RR</option>
                                                    <option {{ old('uf.0') ?? '' == 'SC' ? 'selected' : '' }} value="SC">
                                                        SC</option>
                                                    <option {{ old('uf.0') ?? '' == 'SP' ? 'selected' : '' }} value="SP">
                                                        SP</option>
                                                    <option {{ old('uf.0') ?? '' == 'SE' ? 'selected' : '' }} value="SE">
                                                        SE</option>
                                                    <option {{ old('uf.0') ?? '' == 'TO' ? 'selected' : '' }} value="TO">
                                                        TO</option>
                                                </select>
                                                @error('uf.*')
                                                    <div class="error-message">{{ $message }}.</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('contact.index') }}" class="btn btn-link">Voltar</a>
                                        <button class="btn btn-primary">Adicionar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/consult-cep.js') }}"></script>
    <script src="{{ asset('js/category-generate.js') }}"></script>
    <script src="{{ asset('js/address.js') }}"></script>
    <script src="{{ asset('js/numbers.js') }}"></script>
    <script src="{{ asset('js/validator.js') }}"></script>
@endsection
@section('modals')
    <div class="modal fade" tabindex="-1" id="modalCategory">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="category-name">Nome</label>
                                    <input type="text" id="category-name" name="name" class="form-control" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
