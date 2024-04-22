<?php

namespace Tots\Page\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:200'],
            'language_id' => ['nullable', 'exists:Tots\Language\Models\TotsLanguage,id'],
            'type' => ['nullable', 'integer'],
            'content' => ['nullable'],
            'data' => ['nullable']
        ];
    }
}
