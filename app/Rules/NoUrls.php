<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoUrls implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the value contains any URLs
        return !preg_match('/(?:https?:\/\/)?(?:www\.)?\S+\.\S+/', $value);
    }

    public function message()
    {
        return 'The :attribute field must not contain URLs.';
    }
}
