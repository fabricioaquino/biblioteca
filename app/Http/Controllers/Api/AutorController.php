<?php

namespace App\Http\Controllers\Api;

use App\Models\Autor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AutorFormRequest;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = Autor::paginate(10);

        return response()->json($autores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AutorFormRequest $request)
    {
        Autor::create($request->validated());

        return response()->json(['message' => 'Autor cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $autor = Autor::with('livros')->findOrFail($id);
        return response()->json($autor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AutorFormRequest $request, string $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($request->validated());

        return response()->json(['message' => 'Autor atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $autor = Autor::findOrFail($id);

        if (! $autor->safeDelete()) {
            return response()->json(['message' => 'Não é possível excluir um autor associado a livros.'], 403);
        }

        return response()->json(['message' => 'Autor excluído com sucesso!']);
    }
}
