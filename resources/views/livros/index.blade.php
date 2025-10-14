@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-dark">Livros</h2>
    <a href="{{ route('livros.create') }}" class="btn btn-outline-success">Novo Livro</a>
</div>
{{-- Mensagens de sucesso --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
@endif

{{-- Mensagens de erro --}}
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
@endif

{{-- Erros de validação (se vierem via redirect back) --}}
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
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Editora</th>
            <th>Autor</th>
            <th>Assunto</th>
            <th>Valor (R$)</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($livros as $livro)
        <tr>
            <td>{{ $livro->cod }}</td>
            <td>{{ $livro->titulo }}</td>
            <td>{{ $livro->editora }}</td>
            <td>{{ $livro->autores_nomes ?? '—' }}</td>
            <td>{{ $livro->assuntos_nomes ?? '—' }}</td>
            <td>{{ number_format($livro->valor, 2, ',', '.') }}</td>
            <td class="text-center">
                <a href="{{ route('livros.edit', $livro->cod) }}" class="btn btn-outline-dark btn-sm">Editar</a>
                <form action="{{ route('livros.destroy', $livro->cod) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Links de paginação -->
<div class="mt-3 d-flex justify-content-end">
    {{ $livros->links('pagination::simple-bootstrap-5') }}
</div>
@endsection
