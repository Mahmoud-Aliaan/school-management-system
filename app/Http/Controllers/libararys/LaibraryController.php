<?php

namespace App\Http\Controllers\libararys;

use App\Models\Laibrary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\LibararysRepositoryInterface;

class LaibraryController extends Controller
{
    protected $libarary;

    public function __construct(LibararysRepositoryInterface $libarary) {
        $this->libarary = $libarary;
    }
    public function index()
    {
        return $this->libarary->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->libarary->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->libarary->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Laibrary $laibrary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return $this->libarary->edit($id);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
         return $this->libarary->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request )
    {
        return $this->libarary->destroy($request );
    }

    
    public function download($filename){
        return $this->libarary->download($filename);
    }
}
