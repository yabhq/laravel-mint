<?php

namespace Yab\Mint\Rules;

use Illuminate\Contracts\Validation\Rule;

class StrongPassword implements Rule
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
        // At least 8 characters
        if (strlen($value) < 8) {
            return false;
        }

        // At least 1 number
        if (!preg_match_all("/[0-9]/", $value)) {
            return false;
        }

        // At least 1 upper case letter
        if (!preg_match_all("/[A-Z]/", $value)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The password must be at least 8 characters and contain at least one number and upper case letter.';
    }
}
