<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

    // get all Teachers
    public function getAllTeachers(); 

    public function specialization();

    public function Gender();

    public function storeTeachers($request);

    public function editTeachers($id);

    public function updateTeachers($request);

    public function DeleteTeachers($request);


}

