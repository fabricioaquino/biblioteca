<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class LivroFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $anoAtual = Carbon::now()->year;

        return [
            'titulo' => 'required|string|max:40',
            'editora' => 'required|string|max:40',
            'edicao' => 'required|integer|min:1',
            'ano_publicacao' => "required|integer|min:0|max:$anoAtual",
            'valor' => 'nullable|string',
            'autor_ids' => 'required|array|min:1',
            'autor_ids.*' => 'exists:autores,cod',
            'assunto_ids' => 'required|array|min:1',
            'assunto_ids.*' => 'exists:assuntos,cod',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'edicao' => $this->edicao ?? 1,
            'valor' => $this->valor ?? '0',
        ]);
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O título é obrigatório.',
            'titulo.max' => 'O título deve ter no máximo 40 caracteres.',
            'editora.required' => 'A editora é obrigatória.',
            'editora.max' => 'A editora deve ter no máximo 40 caracteres.',
            'edicao.required' => 'A edição é obrigatória.',
            'edicao.integer' => 'A edição deve ser um número inteiro.',
            'edicao.min' => 'A edição deve ser no mínimo 1.',
            'ano_publicacao.required' => 'O ano de publicação é obrigatório.',
            'ano_publicacao.integer' => 'O ano deve ser um número inteiro.',
            'ano_publicacao.max' => 'O ano não pode ser maior que o ano atual.',
            'valor.numeric' => 'O valor deve ser numérico.',
            'valor.min' => 'O valor não pode ser negativo.',
            'autor_ids.required' => 'Selecione um autor.',
            'autor_ids.exists' => 'O autor selecionado não existe.',
            'assunto_ids.required' => 'Selecione um assunto.',
            'assunto_ids.exists' => 'O assunto selecionado não existe.',
        ];
    }
}
