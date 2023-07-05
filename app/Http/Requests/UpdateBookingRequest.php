<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
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
            'initial_date' => 'required',
            'final_date' => 'required',
            'room_id' => 'required',
            'people_amount' => 'required',
            'total_price' => 'required',
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
            'initial_date.required' => 'S\'ha d\'introduïr la data d\'inici de la reserva',
            'final_date.required' => 'S\'ha d\'introduïr la data de final de la reserva',
            'room_id.required' => 'Error al reservar l\'habitació',
            'people_amountrequired' => 'S\'ha d\'introduïr el número d\'ocupants',
            'total_price.required' => 'Error al reservar l\'habitació',
        ];
    }
}
