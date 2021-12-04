@extends('base')
@php $objects = @$users @endphp


@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="content-header">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Cadastro de Usuários</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="col-md-6">
                <div class="card shadow mb-2">
                    <div class="card-body">

                        <form action="{{ !@$objects ? route('usuarios.store') : route('usuarios.update', ['id' => @$objects->id]) }}" method="POST">
                            @csrf
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label><span style="color: red">*</span> Nome:</label>
                                        <input type="text" class="form-control" id="name " name="name"  value="{{ @$objects['name'] ?? old('name') }}" required>
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
                                        <label><span style="color: red">*</span> Nome de Usuário:</label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{ @$objects['username'] ?? old('username') }}" required>
                                        <span id="username_invalido" class="d-none text-danger">NOME DE USUÁRIO JÁ CADASTRADO</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                @if ($objects ?? '')

                                @else
                                    <div class="col">
                                        <div class="form-group">
                                            <label><span style="color: red">*</span> Senha:</label>
                                            <input type="password" class="form-control" id="password" name="password" value="{{ @$objects['password'] ?? old('password') }}" required>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label title="Administrador">Administrador: </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id=is_admin1" type="radio" name="is_admin" value="1"
                                                @if (@$object['is_admin'] == 1 ?? old('is_admin') == 1) checked @endif />

                                            <label class="form-check-label" for="is_admin1">Sim</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input @php $inputVar = 'is_admin' @endphp class="form-check-input" id="is_admin2"
                                                type="radio" name="is_admin" value="0"
                                                @if (@$object['is_admin'] == 0 ?? old('is_admin') == 0) checked @endif />

                                            <label class="form-check-label" for="is_admin2">Não</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label title="Administrador">Status: </label>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id=active"
                                                type="radio" name="active" value="1"
                                                @if (@$object['active'] == 1 ?? old('active') == 1) checked @endif />
                                            <label class="form-check-label" for="active">Sim</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="active2"
                                                type="radio" name="active" value="0"
                                                @if (@$object['active'] == 0 ?? old('active') == 0) checked @endif />
                                            <label class="form-check-label" for="active2">Não</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2" role="tabpanel">
                                <button type="submit" class="btn btn-sm btn-success me-1 mb-1">Salvar</button>
                                <a href="{{ route('usuarios.index') }}"
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
    @include('screens.users.script')
@endsection
