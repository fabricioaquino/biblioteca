<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorFormRequest extends FormRequest
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
            // aceita apenas letras, espaços e acentuação
            'nome' => 'required|string|max:40|regex:/^[\p{L}\s]+$/u',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do autor é obrigatório.',
            'nome.string'   => 'O nome deve ser um texto válido.',
            'nome.max'      => 'O nome não pode ter mais que 40 caracteres.',
            'nome.regex'    => 'O nome só pode conter letras e espaços.',
        ];
    }
}
