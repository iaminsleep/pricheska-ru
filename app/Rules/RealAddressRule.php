<?php

namespace App\Rules;

use App\Http\Services\YaGeoService;
use Illuminate\Contracts\Validation\Rule;

class RealAddressRule implements Rule
{
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
        $service = new YaGeoService();
        return $service->validateAddress($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Введите настоящий адрес';
    }
}
