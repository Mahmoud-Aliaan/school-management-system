<?php

namespace App\Http\Controllers\Promotions;


use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\PromotionRepositoryInterface;


class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    protected $Promotion;
     public function __construct(PromotionRepositoryInterface $Promotion ) {
        $this->Promotion = $Promotion;
     }
     
    public function index()
    {
       return $this->Promotion->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Promotion->show_student_Pormation();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       return $this->Promotion->Promotion_students($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request)
    {
        return $this->Promotion->destroy_all_promation($request);;
    }
}
