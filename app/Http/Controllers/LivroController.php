<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroFormRequest;
use App\Models\Autor;
use App\Models\Livro;
use App\Models\Assunto;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Livro::with(['autores', 'assuntos'])->paginate(10);

        return view('livros.index', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $autores = Autor::all();
        $assuntos = Assunto::all();

        return view('livros.create', compact('autores', 'assuntos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LivroFormRequest $request)
    {
        Livro::createWithRelations($request->validated());

        return redirect()
            ->route('livros.index')
            ->with('success', 'Livro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $livro = Livro::with(['autores', 'assuntos'])->findOrFail($id);
        $autores = Autor::all();
        $assuntos = Assunto::all();

        return view('livros.edit', compact('livro', 'autores', 'assuntos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LivroFormRequest $request, string $id)
    {
        $livro = Livro::findOrFail($id);

        $livro->updateWithRelations($request->validated());

        return redirect()
            ->route('livros.index')
            ->with('success', 'Livro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Excluir livro e relacionamentos
        $livro = Livro::findOrFail($id);
        $livro->autores()->detach();
        $livro->assuntos()->detach();
        $livro->delete();

        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}
