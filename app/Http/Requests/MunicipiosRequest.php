<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MunicipiosRequest extends FormRequest
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
        'municipio' => 'required|string|max:150',
        'capital' => 'required|string|max:150',
        'estado_id' => 'exists:estado,id',
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