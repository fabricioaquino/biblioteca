@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-dark text-center">Cadastrar Autor</h2>

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

    <form action="{{ route('autores.store') }}" method="POST" class="col-md-6 mx-auto border p-4 rounded shadow-sm">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Autor</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Clarice Lispector" value="{{ old('nome') }}" required>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('autores.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>
@endsection