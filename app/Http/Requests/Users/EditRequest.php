<?php

namespace App\Http\Requests\Users;

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
            'is_admin' => ['nullable', 'exists:users,is_admin'],
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'string', 'email',],
            'avatar' => ['nullable'],
            'password' => ['nullable', 'string', 'min:8'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'min' => [
                'string' => 'Поле :attribute должно быть не меньше :min символов',
            ],
            'exists' => 'Выбранное значение некорректно, выберите из списка!',
        ];
    }
}
