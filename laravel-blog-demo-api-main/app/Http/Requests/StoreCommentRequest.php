<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'post_id' => ['required', 'ulid', 'exists:posts,id'],
            'user_id' => ['required', 'ulid', 'exists:users,id'],
            'content' => ['required', 'string'],
        ];
    }
}
