@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Nova Modalidade</h1>
    <form method="POST" action="{{ route('gestor.modalities.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <select name="type" class="form-control" required>
                <option value="Individual">Individual</option>
                <option value="Coletiva">Coletiva</option>
                <option value="Mista">Mista</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="min_participants" class="form-label">Mínimo de Participantes</label>
            <input type="number" name="min_participants" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="max_participants" class="form-label">Máximo de Participantes</label>
            <input type="number" name="max_participants" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Imagem (opcional)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
