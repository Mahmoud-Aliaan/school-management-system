<?php 

namespace App\Repository;

interface LibararysRepositoryInterface{

    public function index();
     public function download($filename);
      public function edit($id);    
      public function store($request);
     public function update($request);
     public function  destroy( $request);
}