@extends('base')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="content-header">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Listas de Clientes</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="card shadow mb-2">
                <div class="card-header bg-light">

                    <form action="{{ route('clientes.query') }}" method="GET">
                        <div class="row mt-2">
                            <div class="col col-sm-4  col-md-3">
                                <select class="form-control" id="parametros" name="parametros">
                                    <option value="name">Nome</option>
                                    <option value="email">E-mail</option>
                                </select>
                            </div>
                            <div class="col col-sm-4 col-md-3">
                                <input type="texte" class="form-control" id="informacao"
                                    name="informacao" placeholder="Informe os dados da sua busca">
                            </div>
                            <div class="col col-sm-4  col-md-3 mt-1">
                                <button type="submit" class="btn btn-sm btn-warning"><i class="fas fa-search"></i>
                                    Pesquisar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Telefone/WhatsApp</th>
                                    <th>E-mail</th>
                                    <th>Cidade</th>
                                    <th class="text-right">Ações</th>
                                </tr>
                            </thead>
                            @if (count($clients) > 0)
                                @foreach ($clients as $key => $object)
                                    <tr>
                                        <th>{{ $object->name }}</th>
                                        <td>{{ $object->email }}</td>
                                        <td>{{ $object->phone }}</td>
                                        <td>{{ $object->city }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('clientes.edit', ['id' => $object->id]) }}"><span class="text-500 fas fa-edit"></a>
                                            <a title="Excluir" onclick="javascript:confirm_delete('Deseja realmente excluir o registro do aluno: {{ $object->name }}, selecionado?', '{{ route('clientes.destroy', ['id' => $object->id]) }}');" style="cursor:pointer"><span class="text-500 fas fa-trash-alt"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="12" class="text-center">Nenhum registro cadastrado!</th>
                                </tr>
                            @endif
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="row flex-between-end mt-3  justify-content-end">
                        <div class="col-auto align-self-right small mt-1">
                            <b>Total Registros:</b> Geral ({{ $clients->total() }}).
                        </div>
                        <div class="col-auto align-self-left">
                            <div class="pagination pagination-sm">
                                {{ $clients->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="tab-pane preview-tab-pane active" role="tabpanel"
                        aria-labelledby="tab-dom-04c45e1b-d354-416b-80de-73a934cf53bc"
                        id="dom-04c45e1b-d354-416b-80de-73a934cf53bc">
                        <a href="{{ route('clientes.create') }}" class="btn btn-sm btn-primary me-1 mb-1">Novo Clientes</a>
                        <a href="{{ route('clientes.index') }}" class="btn btn-sm btn-info me-1 mb-1">Atualizar</a>
                        <a href="javascript:history.back()" class="btn btn-sm btn-default me-1 mb-1">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
