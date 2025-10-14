@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-dark text-center">Editar Livro</h2>

    {{-- Exibir erros de validação --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livros.update', $livro->cod) }}" method="POST" class="border p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $livro->titulo) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Editora</label>
                <input type="text" name="editora" class="form-control" value="{{ old('editora', $livro->editora) }}" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Edição</label>
                <input type="number" name="edicao" class="form-control" value="{{ old('edicao', $livro->edicao) }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Ano</label>
                <input type="text" name="ano_publicacao" class="form-control" value="{{ old('ano_publicacao', $livro->ano_publicacao) }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Valor (R$)</label>
                <input type="text" name="valor" class="form-control" value="{{ old('valor', $livro->valor) }}">
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Autores</label>
                <select name="autor_ids[]" class="form-select select2" multiple required>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->cod }}"
                            {{ in_array($autor->cod, $livro->autores->pluck('cod')->toArray()) ? 'selected' : '' }}>
                            {{ $autor->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Assuntos</label>
                <select name="assunto_ids[]" class="form-select select2" multiple required>
                    @foreach($assuntos as $assunto)
                        <option value="{{ $assunto->cod }}"
                            {{ in_array($assunto->cod, $livro->assuntos->pluck('cod')->toArray()) ? 'selected' : '' }}>
                            {{ $assunto->descricao }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success">Atualizar</button>
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
