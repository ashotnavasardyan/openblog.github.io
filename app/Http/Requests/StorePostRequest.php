<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class StorePostRequest extends FormRequest
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
            'alias'=>'required|max:70|unique:articles,alias',
            'title'=>'required|min:5|max:100',
            'text'=>'required|min:70|max:4000',
            'desc'=>'required|min:20|max:255',
            'images'=>'required',
        ];
    }
}
