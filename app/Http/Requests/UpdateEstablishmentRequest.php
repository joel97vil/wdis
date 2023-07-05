<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEstablishmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:250',
            'address' => 'required|max:250',
            'description' => 'required|max:250',
            'city' => 'required|max:50',
            'postal_code' => 'required|max:5',
            'establishment_type' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'S\'ha d\'introduïr el nom complet',
            'address.required' => 'S\'ha d\'introduïr l\'adreça',
            'description.required' => 'S\'ha d\'introduïr la descripció',
            'city.required' => 'S\'ha d\'introduïr la localitat',
            'postal_code.required' => 'S\'ha d\'introduïr el codi postal',
            'establishment_type.required' => 'S\'ha d\'introduïr el tipus d\'edifici',
            'name.max' => 'El nom complet ha de tenir una longitud màxima de 250 caracters',
            'address.max' => 'L\'adreça ha de tenir una longitud màxima de 250 caracters',
            'description.max' => 'La descripció ha de tenir una longitud màxima de 250 caracters',
            'city.max' => 'La ciutat ha de tenir una longitud màxima de 50 caracters',
            'postal_code.max' => 'El codi postal ha de tenir una longitud màxima de 5 caracters',
        ];
    }
}
