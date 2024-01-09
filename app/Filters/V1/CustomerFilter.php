<?php
namespace App\Filters\V1; 

use App\Filters\apiFilter;
use Illuminate\Http\Request;

class CustomerFilter extends apiFilter{
    protected $safeParms =[
        'name'=>['eq'],
        'email'=>['eq'],
        'type'=>['eq'],
        'city'=>['eq'],
        'address'=>['eq'],
    ];
    protected $operatorMap=[
        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>='
    ];


}