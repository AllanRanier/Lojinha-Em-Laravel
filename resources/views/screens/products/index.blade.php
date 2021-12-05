@extends('base')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="content-header">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Listas de Produtos</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="card shadow mb-2">
                <div class="card-header bg-light">

                    <form action="{{ route('produtos.query') }}" method="GET">
                        <div class="row mt-2">
                            <div class="col col-sm-4  col-md-3">
                                <select class="form-control" id="parameters" name="parameters">
                                    <option value="name">Nome</option>
                                    <option value="code">Codigo</option>
                                </select>
                            </div>
                            <div class="col col-sm-4 col-md-3">
                                <input type="texte" class="form-control" id="information"
                                    name="information" placeholder="Informe os dados da sua busca">
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
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Qta</th>
                                    <th>Valor</th>
                                    <th>Imagem</th>
                                    <th class="text-right">Ações</th>
                                </tr>
                            </thead>
                            @if (count($products) > 0)
                                @foreach ($products as $key => $object)
                                    <tr>
                                        <td>{{ $object->code }}</td>
                                        <th>{{ $object->name }}</th>
                                        <td>{{ $object->category->name }}</td>
                                        <td>{{ $object->qta }}</td>
                                        <td>{{ $object->value }}</td>
                                        <td><img class="img-thumbnail " src="/arquivos/images/{{  $object->image }}" width="90" height="90"></td>
                                        <td class="text-right">
                                            <a href="{{ route('produtos.edit', ['id' => $object->id]) }}"><span class="text-500 fas fa-edit"></a>
                                            <a title="Excluir" onclick="javascript:confirm_delete('Deseja realmente excluir o registro do produto: {{ $object->name }}, selecionado?', '{{ route('produtos.destroy', ['id' => $object->id]) }}');" style="cursor:pointer"><span class="text-500 fas fa-trash-alt"></span></a>
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
                            <b>Total Registros:</b> Geral ({{ $products->total() }}).
                        </div>
                        <div class="col-auto align-self-left">
                            <div class="pagination pagination-sm">
                                {{ $products->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="tab-pane preview-tab-pane active" role="tabpanel"
                        aria-labelledby="tab-dom-04c45e1b-d354-416b-80de-73a934cf53bc"
                        id="dom-04c45e1b-d354-416b-80de-73a934cf53bc">
                        <a href="{{ route('produtos.create') }}" class="btn btn-sm btn-primary me-1 mb-1">Novo produtos</a>
                        <a href="{{ route('produtos.index') }}" class="btn btn-sm btn-info me-1 mb-1">Atualizar</a>
                        <a href="javascript:history.back()" class="btn btn-sm btn-default me-1 mb-1">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
