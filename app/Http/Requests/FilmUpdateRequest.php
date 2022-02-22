<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmUpdateRequest extends FormRequest
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
            'cim'=> 'string|max:255',
            'leiras'=> 'string|max:500',
            'megjelenesiEv'=>'numeric|integer|min:1900',
            'ertekeles'=> 'numeric|integer|min:1|max:10',
            'imageUrl'=> 'string|max:500'
        ];
    }
}
