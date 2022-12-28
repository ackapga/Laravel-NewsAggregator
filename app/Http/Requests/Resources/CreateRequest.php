<?php

namespace App\Http\Requests\Resources;

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
            'urlName' => ['required', 'string', 'min:3', 'max:350'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'urlName' => 'URL RSS сылка',
        ];
    }
}
