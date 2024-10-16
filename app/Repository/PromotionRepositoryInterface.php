<?php

namespace App\Repository;

interface PromotionRepositoryInterface{

    public function index();

   public function Promotion_students( $request);

   public function show_student_Pormation();

    public function  destroy_all_promation($request);
}