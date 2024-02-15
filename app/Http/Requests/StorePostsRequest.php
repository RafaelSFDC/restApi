<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'title' => 'required',
                'body' => 'required',
                'image' => 'required',
                'userId' => 'required',
                'categoryId' => 'required',
            ];
        }

        return [
            'title' => ['sometimes', 'required'],
            'body' =>  ['sometimes', 'required'],
            'image' =>  ['sometimes', 'required'],
            'categoryId' =>  ['sometimes', 'required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->userId,
            'category_id' => $this->categoryId
        ]);
    }
}
