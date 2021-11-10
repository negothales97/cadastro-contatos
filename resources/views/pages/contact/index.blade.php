@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Meus contatos</h4>
                        <div class="card-tools" id="padded">
                            <a href="{{ route('contact.create') }}" class="btn btn-success">Adicionar</a>
                            <input name="search" id="input-search" placeholder="Pesquisar.." list="contact-list"
                                class="form-control" />
                            <datalist id="contact-list">
                                <option value="1">1</option>
                            </datalist>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="table-contact" class="table table-custom">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->category->name }}</td>
                                        <td class="d-flex justify-content-center">
                                            <div class="btn-group ">
                                                <a href="{{ route('contact.edit', ['id' => $contact]) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <button data-action="{{ route('contact.delete', ['id' => $contact]) }}"
                                                    class="btn btn-danger btn-sm btn-remove">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Nenhum contato cadastrado</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Ações</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/data-table.js') }}"></script>
    <script type="text/javascript">
        $('#input-search').on('keyup focus', async function() {
            let datalist = document.getElementById("contact-list");
            datalist.innerHTML = "";
            const {
                data
            } = await axios.get(`{{ route('contact.search') }}`, {
                params: {
                    user_id: `{{ auth()->id() }}`,
                    search: $(this).val()
                }
            });
            data.forEach(item => {
                let option = document.createElement("option");
                option.setAttribute("data-id", item.id);
                option.value = item.name;

                datalist.appendChild(option);
            });
        });
    </script>
@endsection

@section('modals')
    <div class="modal fade" tabindex="-1" id="modalDelete">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Solicitação de exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formDelete" action="" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <p>Tem certeza que deseja continuar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Continuar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
