<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
     * @return array
     */
    public function rules()
    {
       
        return [
            'title' => 'required|min:3|unique:posts|max:255',
            'description' => 'required|min:10',
        ];
    }
    public function massages()
    {
       
        return [
            'title.reqired' => 'title is required please',
            'description.required' => 'descri[tion is required please',
        ];
    }
}
