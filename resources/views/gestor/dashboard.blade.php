@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">

        <!-- Coluna do Perfil (Esquerda) -->
        <div class="col-md-3">
            <div class="card shadow-sm sticky-top" style="top: 20px;">
                <div class="card-body text-center">
                    <img src="https://via.placeholder.com/150" alt="Foto do Gestor" class="rounded-circle mb-3" style="width: 150px; height: 150px;">
                    <h4 class="card-title">{{ Auth::user()->name }}</h4>
                    <p class="card-text text-muted">Gestor</p>
                    <p class="card-text">
                        <i class="fas fa-envelope me-2"></i>{{ Auth::user()->email }}
                    </p>
                    <p class="card-text">
                        <i class="fas fa-phone me-2"></i>+55 123 456 789
                    </p>
                </div>
            </div>
        </div>

        <!-- Coluna das Informações (Direita) -->
        <div class="col-md-9">
            <h2 class="mb-4">Informações Gerais</h2>

            <!-- Tabela de Instituições -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <i class="fas fa-university me-2"></i>
                    <h5 class="card-title mb-0">Instituições</h5>
                </div>
                <div class="card-body">
                    <table id="institutionsTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($institutions as $institution)
                                <tr>
                                    <td>{{ $institution->id }}</td>
                                    <td>{{ $institution->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('gestor.institutions') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-cog me-1"></i> Gerenciar
                    </a>
                </div>
            </div>

            <!-- Tabela de Modalidades -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-success text-white d-flex align-items-center">
                    <i class="fas fa-list-alt me-2"></i>
                    <h5 class="card-title mb-0">Modalidades</h5>
                </div>
                <div class="card-body">
                    <table id="modalitiesTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modalities as $modality)
                                <tr>
                                    <td>{{ $modality->id }}</td>
                                    <td>{{ $modality->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('gestor.modalities') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-cog me-1"></i> Gerenciar
                    </a>
                </div>
            </div>

            <!-- Tabela de Eventos -->
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white d-flex align-items-center">
                    <i class="fas fa-calendar-alt me-2"></i>
                    <h5 class="card-title mb-0">Eventos</h5>
                </div>
                <div class="card-body">
                    <table id="eventsTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('gestor.events') }}" class="btn btn-info btn-sm">
                        <i class="fas fa-cog me-1"></i> Gerenciar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
