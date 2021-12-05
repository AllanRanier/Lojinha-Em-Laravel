@extends('base')
@php $objects = @$products @endphp


@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="content-header">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Cadastro de Protudos</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="col-md-8">
                <div class="card shadow mb-2">
                    <div class="card-body">
                        
                        <form action="{{ !@$objects ? route('produtos.store') : route('produtos.update', ['id' => @$objects->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Código:</label>
                                        <input type="text" class="form-control" id="code" name="code" value="{{ @$objects['code'] ?? old('code') }}" disabled>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Nome produto:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ @$objects['name'] ?? old('name') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Categoria:</label>
                                        <select class="form-control select2" id="category_id"  name="category_id" value="{{ @$objects['category_id'] ?? old('category_id') }}" required>
                                            <option>Selecionar</option>
                                            @foreach ($categorys as $key => $option)
                                            <option @if ($option->id == old('category_id') || $option->id == @$products->category_id) selected @endif value="{{ $option->id }}"> {{ $option->name }} </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> SubCategoria:</label>
                                        <select class="form-control select2" id="subcategory_id"  name="subcategory_id" value="{{ @$objects['subcategory_id'] ?? old('subcategory_id') }}" required>
                                            <option>Selecionar</option>
                                            @foreach ($subCategorys as $key => $option)
                                            <option @if ($option->id == old('category_id') || $option->id == @$products->subcategory_id) selected @endif value="{{ $option->id }}"> {{ $option->name }} </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Qta:</label>
                                        <input type="number" class="form-control" id="qta" name="qta" value="{{ @$objects['qta'] ?? old('qta') }}" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Valor:</label>
                                        <input type="text" class="form-control money" id="value" name="value" value="{{ @$objects['value'] ?? old('value') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="pdf">Imagem do produto:</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <div class="custom-file">
                                                    <input  type="file" class="custom-file-input" id="image" name="image" value="{{ @$objects['image'] ?? old('image') }}">
                                                    <label class="custom-file-label" for="thumbnail">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col">
                                    <label class="form-label" for="details">Descrição do Produto:</label>
                                    <textarea class="form-control" id="details" name="details" rows="3">{{ @$object['details'] ?? old('details') }}</textarea>
                                </div>
                            </div>

                            <div class="mt-2" role="tabpanel">
                                <button type="submit" class="btn btn-sm btn-success me-1 mb-1">Salvar</button>
                                <a href="{{ route('produtos.index') }}"
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
    @include('screens.clients.script')
@endsection
