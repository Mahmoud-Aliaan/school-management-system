<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\studentRepositoryInterface;

class AjaxController extends Controller
{
    protected $student;
    public function __construct(studentRepositoryInterface $student)
    {
        $this->student = $student;
    }
    public function Get_classrooms($id){
        return $this->student->Get_classrooms($id);
    }

    public function Get_Sections($id){

        return $this->student->Get_Sections($id);
    }
}
