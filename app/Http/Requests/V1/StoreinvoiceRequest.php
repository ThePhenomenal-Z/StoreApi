<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreinvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        
        $user=$this->user();
        return $user !=null && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customerId'=>['required'],
            'amount'=>['required'],
            'status'=>['required',Rule::in(['paid','unpaid'])],
            'billedDate'=>['required'],
        ];
    }
    protected function prepareForValidation(){
        if($this->customerId){
            $this->merge(['customer_id'=>$this->customerId,]);
        }
        if($this->billedDate){
            $this->merge(['billed_date'=>$this->billedDate]);
        }
        if($this->paidDate){
            $this->merge(['paid_date'=>$this->paidDate]);
        } 
    }
}
