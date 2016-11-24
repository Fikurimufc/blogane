<?php

namespace blogane\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
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
        // $id = $this->article;
        return [
            'title' => 'required|max:255',
            'content'=>'required|min:20',
        ];
    }

    public function message(){
        return[
            'title.required' =>'Title must fill',
            'title.max'=>'',
            'content.required'=>'content must fill',
        ];
    }
}
