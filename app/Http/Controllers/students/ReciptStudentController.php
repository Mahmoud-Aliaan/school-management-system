<?php

namespace App\Http\Controllers\students;

use Illuminate\Http\Request;
use App\Models\recipt_student;
use App\Http\Controllers\Controller;
use App\Repository\ReceiptstudentsRepositoryInterface;

class ReciptStudentController extends Controller
{
  protected $receipts;

  public function __construct(ReceiptstudentsRepositoryInterface $receipts ) {
    $this->receipts = $receipts;
  }

    public function index()
    {
        return $this->receipts->index();
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
        return $this->receipts->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return $this->receipts->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return $this->receipts->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->receipts->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->receipts->destroy($request);
    }
}
