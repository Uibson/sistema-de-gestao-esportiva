@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modalidades</h1>
    <a href="{{ route('gestor.modalities.create') }}" class="btn btn-success mb-3">Nova Modalidade</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Mínimo de Participantes</th>
                <th>Máximo de Participantes</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modalities as $modality)
                <tr>
                    <td>{{ $modality->name }}</td>
                    <td>{{ $modality->type }}</td>
                    <td>{{ $modality->min_participants }}</td>
                    <td>{{ $modality->max_participants }}</td>
                    <td>
                        <a href="{{ route('gestor.modalities.edit', $modality->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('gestor.modalities.destroy', $modality->id) }}" method="POST" style="display:inline;">
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
