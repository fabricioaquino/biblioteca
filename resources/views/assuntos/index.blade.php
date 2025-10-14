@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-dark">Assuntos</h2>
    <a href="{{ route('assuntos.create') }}" class="btn btn-outline-success">Novo Assunto</a>
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
            <th>Descrição</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assuntos as $assunto)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $assunto->descricao }}</td>
            <td class="text-center">
                <a href="{{ route('assuntos.edit', $assunto->cod) }}" class="btn btn-outline-dark btn-sm">Editar</a>
                <form action="{{ route('assuntos.destroy', $assunto->cod) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
