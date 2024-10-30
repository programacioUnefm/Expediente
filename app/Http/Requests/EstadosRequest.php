<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EstadosRequest extends FormRequest
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
          'estado' => 'required|string|max:150',
          'pais_id' => 'exists:pais,id',
          'region' => 'required|string|max:250',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
    $response = response()->json([
      'responseCode' => 422,
      'message' => 'Validation errors',
      'errors' => $validator->errors(),
    ], 422);

    throw new HttpResponseException($response);
    }
}