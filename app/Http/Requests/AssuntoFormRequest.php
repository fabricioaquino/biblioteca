<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssuntoFormRequest extends FormRequest
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
        return [
            'descricao' => 'required|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'descricao.required' => 'A descrição do assunto é obrigatória.',
            // 'descricao.string'   => 'A descrição deve ser um texto válido.',
            'descricao.max'      => 'A descrição não pode ter mais que 20 caracteres.',
        ];
    }
}
