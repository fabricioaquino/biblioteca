<?php

namespace App\Http\Controllers\Api;

use App\Models\Livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LivroFormRequest;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Livro::with(['autores', 'assuntos'])->get();
        return response()->json($livros);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LivroFormRequest $request)
    {
        Livro::createWithRelations($request->validated());
        return response()->json(['message' => 'Livro cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livro = Livro::with(['autores', 'assuntos'])->findOrFail($id);
        return response()->json($livro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LivroFormRequest $request, string $id)
    {
        $livro = Livro::findOrFail($id);

        $livro->updateWithRelations($request->validated());

        return response()->json(['message' => 'Livro atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livro = Livro::findOrFail($id);
        $livro->deleteWithRelations();

        return response()->json(['message' => 'Livro excluído com sucesso!']);
    }
}
