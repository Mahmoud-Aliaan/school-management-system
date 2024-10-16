<?php

namespace App\Http\Controllers\Subjects;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\SubjectRepositoryInterface;

class SubjectController extends Controller
{
   protected $Subject;

   public function __construct(SubjectRepositoryInterface $Subject ) {
    $this->Subject = $Subject;
   }
    public function index()
    {
       return $this->Subject->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return $this->Subject->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Subject->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
       return $this->Subject->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
       return $this->Subject->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request)
    {
      
        return $this->Subject->destroy($request);
    }
}
