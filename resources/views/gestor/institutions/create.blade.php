@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Nova Instituição</h1>
    <form method="POST" action="{{ route('gestor.institutions.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cnpj_cpf" class="form-label">CNPJ/CPF</label>
            <input type="text" name="cnpj_cpf" class="form-control" required>
        </div>
        <!-- Adicione os outros campos conforme necessário -->
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
