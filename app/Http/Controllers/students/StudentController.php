<?php

namespace App\Http\Controllers\students;

use App\Models\student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\studentsRequest;
use App\Repository\studentRepositoryInterface;

class StudentController extends Controller
{
    protected $student;
    public function __construct(studentRepositoryInterface $student)
    {
        $this->student = $student;
    }
    
    public function index()
    {
    //   return $this->student->students_table();
        return $this->student->students_table();
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->student->getdata();
    }

    /**
     * Store a newly created resource in storage.
     */ //
    public function store(studentsRequest $request)
    {
        // $student=  student::find(2);
        // dd($student);
      return $this->student->creat_student($request);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
       return $this->student->show_student($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id )
    {
        // return $id;
        return $this->student->edit_student($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(studentsRequest $request)
    {
      return $this->student->update_student($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request)
    {
      return $this->student->Delete_student($request);
    }

    

    public function Upload_attachment(request $request){
        return $this->student->Upload_attachment($request);
    }

     public function  Download_attachment($studentname , $filename){
       return $this->student->Download_attachment($studentname , $filename); 
    }

       public function Delete_attachment(request $request){
        // return $request;
        return $this->student->Delete_attachment($request); 
    }
}
