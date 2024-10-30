<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PaisesRequest extends FormRequest
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
        'pais' => 'required|string',
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
