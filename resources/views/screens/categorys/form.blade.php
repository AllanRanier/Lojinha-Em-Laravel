@extends('base')
@php $objects = @$categorys @endphp

@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="content-header">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Cadastro de Categorias</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="col-md-6">
                <div class="card shadow mb-2">
                    <div class="card-body">
                        <form action="{{ !@$objects ? route('categorias.store') : route('categorias.update', ['id' => @$objects->id]) }}" method="POST">
                            @csrf
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Nome da Categoria:</label>
                                        <input type="text" class="form-control" id="nameCategory " name="name"  value="{{ @$objects['name'] ?? old('name') }}" required>
                                    </div>
                                    <span id="nameCategory_invalido" class="d-none text-danger">CATEGORIA JÁ CADASTRADO</span>
                                </div>
                            </div>
                            <div class="mt-2" role="tabpanel">
                                <button type="submit" class="btn btn-sm btn-success me-1 mb-1">Salvar</button>
                                <a href="{{ route('categorias.index')  }}"
                                    class="btn btn-sm btn-default me-1 mb-1">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('inject_scripts')
    @include('screens.categorys.script')
@endsection
