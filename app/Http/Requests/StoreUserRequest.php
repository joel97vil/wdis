<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'password' => 'required|max:250',
            'username' => 'required|max:250',
            'nif' => 'required|max:10',
            'address' => 'required|max:250',
            'city' => 'required|max:50',
            'postal_code' => 'required|max:5'
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
            'password.required' => 'S\'ha d\'introduïr la contrassenya',
            'username.required' => 'S\'ha d\'introduïr el nom d\'usuari',
            'nif.required' => 'S\'ha d\'introduïr el NIF',
            'address.required' => 'S\'ha d\'introduïr l\'adreça',
            'city.required' => 'S\'ha d\'introduïr la localitat',
            'postal_code.required' => 'S\'ha d\'introduïr el codi postal',
            'name.max' => 'El nom complet ha de tenir una longitud màxima de 250 caracters',
            'password.max' => 'La contrassenya ha de tenir una longitud màxima de 250 caracters',
            'username.max' => 'El nom d\'usuari ha de tenir una longitud màxima de 250 caracters',
            'nif.max' => 'El NIF ha de tenir una longitud màxima de 10 caracters',
            'address.max' => 'L\'adreça ha de tenir una longitud màxima de 250 caracters',
            'city.max' => 'La ciutat ha de tenir una longitud màxima de 50 caracters',
            'postal_code.max' => 'El codi postal ha de tenir una longitud màxima de 5 caracters',
        ];
    }
}
