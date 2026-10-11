<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidBookTitle;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'max:255', new ValidBookTitle()],
            'year'         => 'nullable|integer|between:1450,2100',
            'category'     => 'nullable|string',
            'description'  => 'nullable|string|max:2000',
            'is_available' => 'nullable|boolean',
            'shelf'        => 'required_if:is_available,1|nullable|string|max:255',
            'tags'         => 'nullable|array',
            'tags.*'       => 'nullable|string|max:30',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'        => "Pole 'tytuł książki' jest wymagane.",
            'title.max'             => "Pole 'tytuł książki' nie może mieć więcej niż 255 znaków.",
            'year.integer'          => "Wartość w polu 'rok wydania' musi być liczbą całkowitą.",
            'year.between'          => "Wartość w polu 'rok wydania' musi znajdować się w przedziale od 1450 do 2100.",
            'shelf.required_if'     => "Pole numer półki jest wymagane, gdy książka jest dostępna.",
            'tags.*.max'            => "Każdy tag może mieć maksymalnie 30 znaków.",
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'tytuł książki',
            'year'  => 'rok wydania',
            'shelf' => 'numer półki',
        ];
    }
}