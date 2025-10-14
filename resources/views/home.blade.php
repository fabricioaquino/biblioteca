@extends('layouts.app')

@section('content')
<div class="row text-center g-4">
    <!-- Card Autores -->
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="rounded-circle bg-dark bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width:80px;height:80px;">
                    <i class="bi bi-pen fs-2 text-dark"></i>
                </div>
                <h5 class="card-title">Autores</h5>
                <p class="card-text text-muted">Cadastre, edite e visualize os autores dos livros cadastrados.</p>
                <a href="{{ route('autores.index') }}" class="btn btn-dark">Acessar</a>
            </div>
        </div>
    </div>

    <!-- Card Assuntos -->
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="rounded-circle bg-dark bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width:80px;height:80px;">
                    <i class="bi bi-tags fs-2 text-dark"></i>
                </div>
                <h5 class="card-title">Assuntos</h5>
                <p class="card-text text-muted">Organize os assuntos e categorias dos livros disponíveis.</p>
                <a href="{{ route('assuntos.index') }}" class="btn btn-dark">Acessar</a>
            </div>
        </div>
    </div>

    <!-- Card Livros -->
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="rounded-circle bg-dark bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width:80px;height:80px;">
                    <i class="bi bi-book fs-2 text-dark"></i>
                </div>
                <h5 class="card-title">Livros</h5>
                <p class="card-text text-muted">Cadastre novos livros, edite informações e consulte o acervo completo.</p>
                <a href="{{ route('livros.index') }}" class="btn btn-dark">Acessar</a>
            </div>
        </div>
    </div>
</div>
@endsection
