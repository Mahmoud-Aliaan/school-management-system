<?php

namespace App\Http\Controllers\Accounts;



use Illuminate\Http\Request;
use App\Models\Fees_Invoices;
use App\Http\Controllers\Controller;
use App\Repository\FeeInvoicesRepositoryInterface;




class FeesInvoicesController extends Controller
{
    protected  $fees_Invoices ;

public function __construct(FeeInvoicesRepositoryInterface $fees_Invoices ) {
    $this->fees_Invoices = $fees_Invoices;
}
    public function index()
    {
       return $this->fees_Invoices->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($request)
    {
        // return $request;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->fees_Invoices->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->fees_Invoices->show($id);
        // return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
       return $this->fees_Invoices->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // return $request;
           return $this->fees_Invoices->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request)
    {
       return $this->fees_Invoices->destroy($request);
    }
}
