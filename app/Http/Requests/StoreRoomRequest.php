<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
            'description' => 'required|max:250',
            'address' => 'required|max:250',
            'price' => 'required',
            'occupancy' => 'required',
            'establishment' => 'required',
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
            'name.required' => 'S\'ha d\'introduïr el nom',
            'address.required' => 'S\'ha d\'introduïr l\'adreça',
            'description.required' => 'S\'ha d\'introduïr la descripció',
            'price.required' => 'S\'ha d\'introduïr el preu',
            'occupancy.required' => 'S\'ha d\'introduïr la capacitat',
            'establishment.required' => 'S\'ha d\'introduïr el tipus d\'edifici',
            'name.max' => 'El nom ha de tenir una longitud màxima de 250 caracters',
            'address.max' => 'L\'adreça ha de tenir una longitud màxima de 250 caracters',
            'description.max' => 'La descripció ha de tenir una longitud màxima de 250 caracters',
        ];
    }
}
