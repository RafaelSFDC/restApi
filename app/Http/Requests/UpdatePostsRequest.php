<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
            'title' => 'nullable',
            'body' => 'nullable',
            'image' => 'nullable',
            'categoryId' => 'nullable',
        ];
    }

    protected function prepareForValidation(){

        if(isset($this->categoryId)){
            $this->merge([
                'category_id' => $this->categoryId
            ]);
        };
    }
}
