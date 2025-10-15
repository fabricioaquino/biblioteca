<?php

namespace App\Http\Controllers\Api;

use App\Models\Assunto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssuntoFormRequest;

class AssuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assuntos = Assunto::all();

        return response()->json($assuntos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssuntoFormRequest $request)
    {
        Assunto::create($request->validated());

        return response()->json(['message' => 'Assunto cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $assunto = Assunto::findOrFail($id);

        return response()->json($assunto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssuntoFormRequest $request, string $id)
    {
        $assunto = Assunto::findOrFail($id);
        $assunto->update($request->validated());

        return response()->json(['message' => 'Assunto atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assunto = Assunto::findOrFail($id);

        if (! $assunto->safeDelete()) {
            return response()->json(['message' => 'Não é possível excluir um assunto associado a livros.'], 403);
        }

        return response()->json(['message' => 'Assunto excluído com sucesso!']);
    }
}
