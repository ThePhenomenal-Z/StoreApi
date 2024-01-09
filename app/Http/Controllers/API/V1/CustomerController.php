<?php

namespace App\Http\Controllers\API\V1;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Filters\V1\CustomerFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StorecustomerRequest;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Requests\V1\UpdatecustomerRequest;
use App\Http\Resources\V1\CustomerCollection;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter=new CustomerFilter();
        $queryItems=$filter->transform($request);
        $includeInvoices=$request->query('includeInvoices');
        $filteredcustomers=customer::where($queryItems);
        if($includeInvoices){
            $filteredcustomers=$filteredcustomers->with('invoices');
        }
        return new CustomerCollection($filteredcustomers->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * the validation will happen in StorecustomerRequest
     */
    public function store(StorecustomerRequest $request)
    {
        return new CustomerResource(customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer,Request $request)
    {
        $includeInvoices=$request->query('includeInvoices');
        if($includeInvoices){
            return new CustomerResource($customer->loadMissing('invoices'));    
        }
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecustomerRequest $request, customer $customer)
    {
        $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer)
    {
        //
    }
}
