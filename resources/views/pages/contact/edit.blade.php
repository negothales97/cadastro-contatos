@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Atualizar contato</h4>
                    </div>
                    <form action="{{ route('contact.update', ['id' => $contact]) }}" id="contactForm" method="POST"
                        novalidate>
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="contact-name">Nome</label>
                                        <input type="text" id="contact-name" value="{{ old('name', $contact->name) }}"
                                            name="name" class="form-control @error('name') error @enderror" required />
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
                                                <option
                                                    {{ old('category_id', $contact->category_id) == $category->id ? 'selected' : '' }}
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
                                            @foreach ($contact->phoneNumbers as $key => $phoneNumber)
                                                <div class="group">
                                                    <span>
                                                        <input type="text"
                                                            class="form-control @error('numbers.*') error @enderror"
                                                            value="{{ old('numbers.0', $phoneNumber->number) }}"
                                                            name="numbers[]" required />
                                                    </span>
                                                    <button class="btn btn-success btn-sm btn-more-number" type="button">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    @if ($key > 0)
                                                        <button class="btn btn-danger btn-sm btn-less-number" type="button">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                                @error('numbers.*')
                                                    <div class="error-message">{{ $message }}.</div>
                                                @enderror
                                            @endforeach
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
                                @foreach ($contact->addresses as $key => $address)
                                    <fieldset class="address">
                                        <legend>
                                            <button class="btn btn-link btn-add-address" type="button">Adicionar outro
                                                endereço</button>
                                            @if ($key > 0)
                                                <button type="button" class="btn btn-danger btn-sm btn-address-remove">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endif
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>CEP</label>
                                                    <input type="text" name="zip_code[]"
                                                        value="{{ old('zip_code.0', $address->zip_code) ?? '' }}"
                                                        class="form-control @error('zip_code.*') error @enderror zip_code"
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
                                                    <input type="text" name="street[]"
                                                        value="{{ old('street.0', $address->street) ?? '' }}"
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
                                                    <input type="text" name="number[]"
                                                        value="{{ old('number.0', $address->number) ?? '' }}"
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
                                                        value="{{ old('district.0', $address->district) ?? '' }}"
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
                                                    <input type="text" name="city[]"
                                                        value="{{ old('city.0', $address->city) ?? '' }}"
                                                        class="form-control @error('city.*') error @enderror city"
                                                        required />
                                                    @error('city.*')
                                                        <div class="error-message">{{ $message }}.</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>UF</label>
                                                    <select class="form-control @error('uf.*') error @enderror uf"
                                                        name="uf[]" required>
                                                        <option value="" disabled selected>...</option>
                                                        <option {{ old('uf.0', $address->uf) == 'AC' ? 'selected' : '' }}
                                                            value="AC">
                                                            AC</option>
                                                        <option {{ old('uf.0', $address->uf) == 'AL' ? 'selected' : '' }}
                                                            value="AL">
                                                            AL</option>
                                                        <option {{ old('uf.0', $address->uf) == 'AP' ? 'selected' : '' }}
                                                            value="AP">
                                                            AP</option>
                                                        <option {{ old('uf.0', $address->uf) == 'AM' ? 'selected' : '' }}
                                                            value="AM">
                                                            AM</option>
                                                        <option {{ old('uf.0', $address->uf) == 'BA' ? 'selected' : '' }}
                                                            value="BA">
                                                            BA</option>
                                                        <option {{ old('uf.0', $address->uf) == 'CE' ? 'selected' : '' }}
                                                            value="CE">
                                                            CE</option>
                                                        <option {{ old('uf.0', $address->uf) == 'DF' ? 'selected' : '' }}
                                                            value="DF">
                                                            DF</option>
                                                        <option {{ old('uf.0', $address->uf) == 'ES' ? 'selected' : '' }}
                                                            value="ES">
                                                            ES</option>
                                                        <option {{ old('uf.0', $address->uf) == 'GO' ? 'selected' : '' }}
                                                            value="GO">
                                                            GO</option>
                                                        <option {{ old('uf.0', $address->uf) == 'MA' ? 'selected' : '' }}
                                                            value="MA">
                                                            MA</option>
                                                        <option {{ old('uf.0', $address->uf) == 'MT' ? 'selected' : '' }}
                                                            value="MT">
                                                            MT</option>
                                                        <option {{ old('uf.0', $address->uf) == 'MS' ? 'selected' : '' }}
                                                            value="MS">
                                                            MS</option>
                                                        <option {{ old('uf.0', $address->uf) == 'MG' ? 'selected' : '' }}
                                                            value="MG">
                                                            MG</option>
                                                        <option {{ old('uf.0', $address->uf) == 'PA' ? 'selected' : '' }}
                                                            value="PA">
                                                            PA</option>
                                                        <option {{ old('uf.0', $address->uf) == 'PB' ? 'selected' : '' }}
                                                            value="PB">
                                                            PB</option>
                                                        <option {{ old('uf.0', $address->uf) == 'PR' ? 'selected' : '' }}
                                                            value="PR">
                                                            PR</option>
                                                        <option {{ old('uf.0', $address->uf) == 'PE' ? 'selected' : '' }}
                                                            value="PE">
                                                            PE</option>
                                                        <option {{ old('uf.0', $address->uf) == 'PI' ? 'selected' : '' }}
                                                            value="PI">
                                                            PI</option>
                                                        <option {{ old('uf.0', $address->uf) == 'RJ' ? 'selected' : '' }}
                                                            value="RJ">
                                                            RJ</option>
                                                        <option {{ old('uf.0', $address->uf) == 'RN' ? 'selected' : '' }}
                                                            value="RN">
                                                            RN</option>
                                                        <option {{ old('uf.0', $address->uf) == 'RS' ? 'selected' : '' }}
                                                            value="RS">
                                                            RS</option>
                                                        <option {{ old('uf.0', $address->uf) == 'RO' ? 'selected' : '' }}
                                                            value="RO">
                                                            RO</option>
                                                        <option {{ old('uf.0', $address->uf) == 'RR' ? 'selected' : '' }}
                                                            value="RR">
                                                            RR</option>
                                                        <option {{ old('uf.0', $address->uf) == 'SC' ? 'selected' : '' }}
                                                            value="SC">
                                                            SC</option>
                                                        <option {{ old('uf.0', $address->uf) == 'SP' ? 'selected' : '' }}
                                                            value="SP">
                                                            SP</option>
                                                        <option {{ old('uf.0', $address->uf) == 'SE' ? 'selected' : '' }}
                                                            value="SE">
                                                            SE</option>
                                                        <option {{ old('uf.0', $address->uf) == 'TO' ? 'selected' : '' }}
                                                            value="TO">
                                                            TO</option>
                                                    </select>
                                                    @error('uf.*')
                                                        <div class="error-message">{{ $message }}.</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                @endforeach
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('contact.index') }}" class="btn btn-link">Voltar</a>
                                        <button class="btn btn-primary">Atualizar</button>
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
