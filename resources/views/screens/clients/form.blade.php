@extends('base')
@php $objects = @$students @endphp


@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="content-header">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Cadastro de Clientes</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="col-md-6">
                <div class="card shadow mb-2">
                    <div class="card-body">

                        <form action="{{ !@$objects ? route('clientes.store') : route('clientes.update', ['id' => @$objects->id]) }}" method="POST">
                            @csrf
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Nome:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ @$objects['name'] ?? old('name') }}" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> E-mail:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ @$objects['email'] ?? old('email') }}" required>
                                    </div>
                                    <span id="email_invalido" class="d-none text-danger">E-mail JÁ CADASTRADO</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> CPF:</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" value="{{ @$objects['cpf'] ?? old('cpf') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Contato (WhatsApp ou Telegram):</label>
                                        <input type="text" class="form-control number" id="phone" name="phone" value="{{ @$objects['phone'] ?? old('phone') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> CEP:</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="cep" name="cep" value="{{ @$objects['cep'] ?? old('cep') }}" required>
                                            <span class="input-group-text">
                                                <span title="Clique para buscar endereço automático" style="cursor:pointer"
                                                    class="text-900 fs-1 far fa-map"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Logradouro:</label>
                                        <input type="text" class="form-control" id="street" name="street" value="{{ @$objects['street'] ?? old('street') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Nº:</label>
                                        <input type="text" class="form-control" id="number" name="number" value="{{ @$objects['number'] ?? old('number') }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Bairro:</label>
                                        <input type="text" class="form-control" id="district" name="district" value="{{ @$objects['district'] ?? old('district') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Cidade:</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ @$objects['city'] ?? old('city') }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Estado:</label>
                                        <input type="text" class="form-control" id="states" name="states" value="{{ @$objects['states'] ?? old('states') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2" role="tabpanel">
                                <button type="submit" class="btn btn-sm btn-success me-1 mb-1">Salvar</button>
                                <a href="{{ route('clientes.index') }}"
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
