<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Определите, авторизован ли пользователь для выполнения этого запроса.
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * Получите правила проверки, применимые к запросу.
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:200'],
            'description' => ['nullable', 'string']
        ];
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'min' => [
                'string' => 'Поле :attribute должно быть не меньше :min.',
            ],
            'max' => [
                'string' => 'Поле :attribute не может превышать :max.',
            ],
        ];
    }
}
