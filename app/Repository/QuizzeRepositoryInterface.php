<?php

namespace App\Repository;


interface QuizzeRepositoryInterface{
     public function index();  
     public function create();  
     public function edit($id);    
     public function store($request);
    public function update($request);
    public function  destroy( $request);
}