<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Models\Accounts\Accounts;
use App\Http\Controllers\Controller;

use App\Http\Requests\AccountsRequest;
use App\Repository\AccountRepositoryinterface;

class AccountsController extends Controller
{
    protected $Accounts;
   public function __construct(AccountRepositoryinterface $Accounts ) {
    $this->Accounts = $Accounts;
   }


    public function index()
    {
        
       return $this->Accounts->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Accounts->create_Pay();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountsRequest $request)
    {
        return $this->Accounts->add_Pay($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Accounts $accounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
         return $this->Accounts->edit($id);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountsRequest $request)
    {
       return $this->Accounts->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request)
    {
        return $this->Accounts->delete($request);
    }
}
