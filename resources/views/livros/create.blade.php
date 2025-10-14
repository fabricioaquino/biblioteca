@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-dark text-center">Cadastrar Livro</h2>

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

    <form action="{{ route('livros.store') }}" method="POST" class="border p-4 rounded shadow-sm">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" placeholder="Título do livro" value="{{ old('titulo') }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Editora</label>
                <input type="text" name="editora" class="form-control" placeholder="Nome da editora" value="{{ old('editora') }}" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Edição</label>
                <input type="number" name="edicao" class="form-control" min="1" value="{{ old('edicao') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Ano</label>
                <input type="text" name="ano_publicacao" class="form-control" placeholder="2025" min="1" maxlength="{{ date('Y') }}" value="{{ old('ano_publicacao') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Valor (R$)</label>
                <input type="text" name="valor" class="form-control" value="{{ old('valor') }}">
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Autor</label>
                <select name="autor_ids[]" class="form-select select2" multiple required>
                    <option disabled>Selecione...</option>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->cod }}" {{ in_array($autor->cod, old('autor_ids', [])) ? 'selected' : '' }}>
                            {{ $autor->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Assunto</label>
                <select name="assunto_ids[]" class="form-select select2" multiple required>
                    <option disabled>Selecione...</option>
                    @foreach($assuntos as $assunto)
                        <option value="{{ $assunto->cod }}" {{ in_array($assunto->cod, old('assunto_ids', [])) ? 'selected' : '' }}>
                            {{ $assunto->descricao }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
    $('input[name="valor"]').mask('000.000.000,00', {reverse: true});
});
</script>
@endsection
