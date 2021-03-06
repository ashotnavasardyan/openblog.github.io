<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class PostUpdateRequest extends FormRequest
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
        $id = Request::get('id');
        return [
            'alias'=>'required|min:5|max:70|unique:articles,alias,'.$id,
            'title'=>'required|min:5|max:100',
            'text'=>'required|min:70|max:4000',
            'desc'=>'required|min:50|max:255',
        ];
    }
}
