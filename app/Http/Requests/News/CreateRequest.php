<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'title' => ['required', 'string', 'min:3', 'max:200'],
            'author' => ['nullable', 'string', 'min:3', 'max:30'],
            'status' => ['required', 'string', 'min:5', 'max:7'],
            'image' => ['nullable', 'image', 'mimes:jpg,png'],
            'description' => ['nullable', 'string']
        ];
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'category_id' => 'Категории',
            'title' => 'Наименование',
            'author' => 'Автор',
            'status' => 'Статус',
            'image' => 'Изображение',
            'description' => 'Описание'
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
