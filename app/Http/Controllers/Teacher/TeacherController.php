<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Repository\TeacherRepositoryInterface;


class TeacherController extends Controller
{
    protected $Teacher;
    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Teachers= $this->Teacher->getAllTeachers();

       return view('pages.Teacher.Teachers_table', compact('Teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = $this->Teacher->specialization();
        $genders = $this->Teacher->Gender();

        return view('pages.Teacher.Create', compact('specializations', 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
       return $this->Teacher->storeTeachers( $request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $specializations = $this->Teacher->specialization();
        $genders = $this->Teacher->Gender();
        $Teachers= $this->Teacher->editTeachers($id);
        return view('pages.Teacher.Edite', compact('specializations','genders','Teachers'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       return $this->Teacher->updateTeachers($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request)
    {
       return $this->Teacher->DeleteTeachers($request);
      

    }
}
