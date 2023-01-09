<?php

namespace App\Http\Requests\Notes;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:200'],
            'content' => ['required', 'string']
        ];
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'title' => 'Название',
            'content' => 'Содержание',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'Надо обязательно заполнить :attribute.',
            'min' => [
                'string' => 'Поле :attribute должно быть не меньше :min.',
            ],
            'max' => [
                'string' => 'Поле :attribute не может превышать :max.',
            ],
        ];
    }
}
