<?php

namespace App\Http\Controllers\students;

use Illuminate\Http\Request;
use App\Models\Processing_Fees;
use App\Http\Controllers\Controller;
use App\Repository\ProcessingFeesRepositoryInterface;



class ProcessingFeesController extends Controller
{
   
   protected $processing ;

   public function __construct( ProcessingFeesRepositoryInterface $processing ) {
    $this->processing = $processing;
   }
   
    public function index()
    {
         return $this->processing->index();
       
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
    public function store(Request $request)
    {
        return $this->processing->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
       return $this->processing->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return $this->processing->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->processing->update($request);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->processing->destroy($request);
    }
}
