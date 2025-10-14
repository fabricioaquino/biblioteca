@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-dark text-center">Editar Autor</h2>

    {{-- Exibir erros de validação --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    <form action="{{ route('autores.update', $autor->cod) }}" method="POST" class="col-md-6 mx-auto border p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Autor</label>
            <input type="text" class="form-control" id="nome" name="nome"
                value="{{ old('nome', $autor->nome) }}" maxlength="40" required>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('autores.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>
@endsection
