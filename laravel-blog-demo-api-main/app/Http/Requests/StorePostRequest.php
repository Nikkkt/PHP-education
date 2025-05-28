<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'ulid', 'exists:users,id'],
            'slug' => ['required', 'string', 'max:255', 'unique:posts,slug'],
            'title' => ['required', 'string', 'max:128'],
            'content' => ['required', 'string'],
            'is_publish' => ['boolean'],
            'image' => ['nullable', 'string', 'max:2048'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['ulid', 'exists:tags,id'],
        ];
    }
}
