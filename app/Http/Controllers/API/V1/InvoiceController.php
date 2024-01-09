<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\V1\BulkStoreInvoiceRequest;
use App\Models\invoice;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Filters\V1\InvoiceFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreinvoiceRequest;
use App\Http\Resources\V1\InvoiceResource;
use App\Http\Requests\UpdateinvoiceRequest;
use App\Http\Resources\V1\InvoiceCollection;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter=new InvoiceFilter();
        $queryItems=$filter->transform($request);
        if(count($queryItems)==0){
            return new invoiceCollection(invoice::paginate());
        }else{
            $filteredInvoices=invoice::where($queryItems)->paginate();
            return new invoiceCollection($filteredInvoices->appends($request->query()));
        }
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
     */
    public function store(StoreinvoiceRequest $request)
    {
        //
    }

    public function bulkStore(BulkStoreInvoiceRequest $request){
        $bulk=collect($request->all())->map(function($arr,$key){
            return Arr::except($arr,['customerId','billedDate','paidDate']);
        });
        invoice::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(invoice $invoice)
    {
        return new InvoiceResource($invoice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateinvoiceRequest $request, invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(invoice $invoice)
    {
        //
    }
}
