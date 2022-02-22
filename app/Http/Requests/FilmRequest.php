<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'cim'=> 'required|string|max:255',
            'leiras'=> 'required|string|max:500',
            'megjelenesiEv'=>'required|numeric|integer|min:1900',
            'ertekeles'=> 'required|numeric|integer|min:1|max:10',
            'imageUrl'=> 'required|string|max:500'
        ];
    }
}
