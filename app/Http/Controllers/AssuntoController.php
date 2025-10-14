<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssuntoFormRequest;
use App\Models\Assunto;
use Illuminate\Http\Request;

class AssuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assuntos = Assunto::all();
        return view('assuntos.index', compact('assuntos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assuntos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssuntoFormRequest $request)
    {
        Assunto::create($request->validated());
        return redirect()->route('assuntos.index')->with('success', 'Assunto cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assunto = Assunto::findOrFail($id);
        return view('assuntos.edit', compact('assunto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssuntoFormRequest $request, string $id)
    {
        $assunto = Assunto::findOrFail($id);
        $assunto->update($request->validated());
        return redirect()->route('assuntos.index')->with('success', 'Assunto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assunto = Assunto::findOrFail($id);

        if (! $assunto->safeDelete()) {
            return redirect()
                ->route('assuntos.index')
                ->with('error', 'Não é possível excluir um assunto associado a livros.');
        }

        return redirect()
            ->route('assuntos.index')
            ->with('success', 'Assunto excluído com sucesso!');
    }
}
