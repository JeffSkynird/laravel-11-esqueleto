<?php

namespace App\Http\Requests;

use App\DTO\GenericErrorResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator; 

class UserRequest extends FormRequest
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
        $rules = [];
    
        if ($this->isMethod('post')) {
            $rules['password'] = 'required|string|min:8';
            $rules['email'] = 'required|email|unique:users,email';
            $rules['name'] = 'required|string';
            $rules['dni'] = 'required|string|unique:users,dni';
            $rules['birth_date'] = 'required|date';
            $rules['salary'] = 'required|numeric|min:500';
        } elseif ($this->isMethod('put')) {
            $rules['email'] = 'nullable|email|unique:users,email,' . $this->route('id');
            $rules['dni'] = 'nullable|string|unique:users,dni,' . $this->route('id');
            $rules['password'] = 'nullable|string|min:8';
            $rules['name'] = 'nullable|string';
            $rules['birth_date'] = 'nullable|date';
            $rules['salary'] = 'nullable|numeric';
        }

        
        return $rules;
    }
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */

    public function failedValidation(Validator $validator)
    {
        // Crear la respuesta de error usando la clase DTO
        $errorResponse = new GenericErrorResponse(
            'Validation Error',
            '500',
            $validator->errors()->toArray() // Convierte los errores a array
        );

        // Lanzar una excepción con la respuesta customizada
        throw new HttpResponseException(
            response()->json($errorResponse->toArray(), 500)
        );
    }
}
