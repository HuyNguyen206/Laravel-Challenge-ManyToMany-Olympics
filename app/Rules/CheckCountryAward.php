<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class CheckCountryAward implements Rule, DataAwareRule
{
    protected $data = [];
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $positions = ['first', 'second', 'third'];
        $suffixSportId = explode('_', $attribute)[1];
        $values = [];
        foreach ($positions as $position) {
            $values[] =  $this->data["{$position}_{$suffixSportId}"];
        }
        return count(array_unique($values)) === count($values);

//        return $this->data["first_{$prefixSportId}"] !== $this->data["second_{$prefixSportId}"]
//               && $this->data["first_{$prefixSportId}"] !== $this->data["second_{$prefixSportId}"]
    }


    /**
     * @param $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
        // TODO: Implement setData() method.
    }

    public function message()
    {
        return 'This country already has position ';
    }
}
