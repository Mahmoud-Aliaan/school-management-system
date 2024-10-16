<?php

namespace App\Http\Controllers\students;

use Illuminate\Http\Request;
use App\Models\Payment_Student;
use App\Http\Controllers\Controller;
use App\Repository\PaymentStudentRepositoryInterface;

class PaymentStudentController extends Controller
{
    protected $Payment;
   public function __construct(PaymentStudentRepositoryInterface $Payment ) {
    $this->Payment = $Payment;
   }
    public function index()
    {
        return $this->Payment->index();
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
       return $this->Payment->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return $this->Payment->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return $this->Payment->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Payment->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request)
    {
        return $this->Payment->destroy($request);
    }
}
