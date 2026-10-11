<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidBookTitle implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Sprawdzamy czy tytuł zawiera słowo "test" (bez względu na wielkość liter)
        if (stripos($value, 'test') !== false) {
            $fail('Wprowadzony tytuł książki jest niedozwolony.');
        }
    }
}