@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-dark text-center">Cadastrar Assunto</h2>

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

    <form action="{{ route('assuntos.store') }}" method="POST" class="col-md-6 mx-auto border p-4 rounded shadow-sm">
        @csrf
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição do Assunto</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Ex: Ficção, Romance, Suspense..." value="{{ old('descricao') }}" required>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>
@endsection
