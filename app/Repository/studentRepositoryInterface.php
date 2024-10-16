<?php

namespace App\Repository;

interface studentRepositoryInterface{

    // get all Teachers

    public function students_table();
    
   

    public function getdata(); 

   public function Get_classrooms($id);

   public function Get_Sections($id);

   public function creat_student($request);

   public function edit_student($id);

   public function update_student($request);

   public function Delete_student($request);

   public function show_student($id);

   public function Upload_attachment($request);

   public function Download_attachment( $studentname , $filename);

    public function Delete_attachment($request);

}

