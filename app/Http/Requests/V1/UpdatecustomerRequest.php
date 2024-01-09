<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatecustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
      
        $user=$this->user();
        return $user !=null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $method=$this->method();
        if($method=='PUT'){
        return [
            'name'=>['required'],
            'type'=>['required', Rule::in(['I','B','i','b'])],
            'address'=>['required'],
            'city'=>['required'],
            'email'=>['required','email']
        ];
    }else{
        return [
            'name'=>['sometimes','required'],
            'type'=>['sometimes','required', Rule::in(['I','B','i','b'])],
            'address'=>['sometimes','required'],
            'city'=>['sometimes','required'],
            'email'=>['sometimes','required','email']
        ];
    }
    }
}
