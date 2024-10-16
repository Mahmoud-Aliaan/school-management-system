<?php

namespace App\Http\Controllers\students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\GraduateRepositoryInterface;

class GraduatesController extends Controller
{
    protected $Graduates;

     public function __construct(GraduateRepositoryInterface $Graduates ) {
        $this->Graduates = $Graduates;
    }


    public function index()
    {
        return $this->Graduates->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return $this->Graduates->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       return $this->Graduates->softdelete($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      return $this->Graduates->return_studen($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Graduates->destroy($request);
    }
}
