<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'post_id' => ['sometimes', 'ulid', 'exists:posts,id'],
            'user_id' => ['sometimes', 'ulid', 'exists:users,id'],
            'content' => ['sometimes', 'string'],
        ];
    }
}
