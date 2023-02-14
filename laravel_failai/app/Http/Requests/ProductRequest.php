<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            [
                'name'=>['required','max: 100'],
                'slug'=>['required','max:100'],
                'description'=>['required','max:100'],
                'image'=>['required',Rule::in('first-zone')],
                'category_id'=>['required','integer','exists:categories,id'],
                'color'=>['required','string','min:3','max:200'],
                'size'=>['required','in_array:XXS,XS,S,M,L,XL,XXL'],
                'price'=>['required','integer','min:1','size:4'],
                'status_id'=>['required','integer','exists:status,id'],
            ]
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'privalomas produkto pavadnimas',
            'name.string' =>'Pavadinima turi udaryti lotyniški simboliai',
            'name.min'=>'Minimalus produkto pavadinimas turi būti :min simboliai',
            'name.max'=>'Maximalus produkto pavadinimas turi būti :max simboliai',

        ];
    }

}
