<?php

namespace App\Http\Requests;

use App\Models\Sport;
use App\Rules\CheckCountryAward;
use Illuminate\Foundation\Http\FormRequest;

class StoreMedalRequest extends FormRequest
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
            'sports.*.*' => 'required'
        ];
//        $sports = Sport::all(['id'])->pluck('id')->toArray();
//        $positions = ['first', 'second', 'third'];
//        foreach ($sports as $sportId) {
//            foreach ($positions as $position) {
//                $validationRule["{$position}_$sportId"] =  $position === 'first' ? ['required', new CheckCountryAward()] : 'required';
//            }
//        }
        return $validationRule ?? [];
    }

    public function messages()
    {
        return [
            'sports.*.*.required' => 'Please select country'
        ];
    }
}
