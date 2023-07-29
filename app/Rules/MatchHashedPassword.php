<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MatchHashedPassword implements ValidationRule
{
    protected $hashedPassword;
    
    public function __construct($hashedPassword)
    {
        $this->hashedPassword = $hashedPassword;
    }
    
    public function passes($attribute, $value, $parameters, $validator)
    {
        // Implement your custom validation logic here
        return Hash::check($value, $this->hashedPassword);
    }

    public function message()
    {
        return 'The current password does not match the stored password.';
    }
   
    
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
