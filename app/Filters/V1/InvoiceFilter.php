<?php
namespace App\Filters\V1; 

use App\Filters\apiFilter;
use Illuminate\Http\Request;

class InvoiceFilter extends apiFilter{
    protected $safeParms =[
        'amount'=>['eq','lt','lte','gt','gte'],
        'customerId'=>['eq'],
        'status'=>['eq','ne'],
        'billedDate'=>['eq','lt','lte','gt','gte'],
        'paidDate'=>['eq','lt','lte','gt','gte'],
    ];
    protected $columnMap=[
        'customerId'=>'customer_id',
        'billedDate'=>'billed_date',
        'paidDate'=>'paid_date'
    ];
    protected $operatorMap=[
        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',
        'ne'=>'!='
    ];
}