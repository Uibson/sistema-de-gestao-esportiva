@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Instituições</h1>
    <a href="{{ route('gestor.institutions.create') }}" class="btn btn-success mb-3">Nova Instituição</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CNPJ/CPF</th>
                <th>Tipo</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($institutions as $institution)
                <tr>
                    <td>{{ $institution->name }}</td>
                    <td>{{ $institution->cnpj_cpf }}</td>
                    <td>{{ $institution->type }}</td>
                    <td>{{ $institution->email }}</td>
                    <td>
                        <a href="{{ route('gestor.institutions.edit', $institution->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('gestor.institutions.destroy', $institution->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
