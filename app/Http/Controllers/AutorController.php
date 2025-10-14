<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\View\View;
use App\Http\Requests\AutorFormRequest;
use Illuminate\Http\RedirectResponse;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Lista de autores
        $autores = Autor::paginate(10);
        return view('autores.index', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('autores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AutorFormRequest $request): RedirectResponse
    {
        Autor::create($request->validated());
        return redirect()->route('autores.index')->with('success', 'Autor cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $autor = Autor::findOrFail($id);
        return view('autores.edit', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AutorFormRequest $request, string $id): RedirectResponse
    {
        $autor = Autor::findOrFail($id);
        $autor->update($request->validated());
        return redirect()->route('autores.index')->with('success', 'Autor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $autor = Autor::findOrFail($id);

        if (! $autor->safeDelete()) {
            return redirect()
                ->route('autores.index')
                ->with('error', 'Não é possível excluir um autor associado a livros.');
        }

        return redirect()
            ->route('autores.index')
            ->with('success', 'Autor excluído com sucesso!');
    }
}
