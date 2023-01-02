<?php

namespace App\Http\Requests\Resources;

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
            'id' => ['nullable'],
            'urlName' => ['required', 'string', 'active_url', 'unique:resources,urlName'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'urlName' => 'RSS URL',
        ];
    }
}
