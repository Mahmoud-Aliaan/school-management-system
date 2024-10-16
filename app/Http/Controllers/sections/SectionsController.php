<?php

namespace App\Http\Controllers\sections;

use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Classrom;
use App\Models\sections;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    //     $sections = sections::findOrfail(4);
    //    return  $sections->teachers;
        
         
        $Grades = Grade::with(['sections'])->get(); 
        //return $Grades->dd();
        // dd($Grades);       
       $Teachers = Teacher::all();   
       $list_Grades= Grade::all();
       return view(' pages.Sections.section_table' , compact('Grades' ,'list_Grades' ,'Teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getclasses($id){
        $my_class= Classrom::where('Grade_id', $id)->pluck('Class_name','id');
        return $my_class;
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        // return $request;

       
        try{
            $validated = $request->validated();
            $sections= new sections();
            $sections->section_name = ['ar'=>$request->Name, 'en'=>$request->Name_en];
            $sections->Grade_id= $request->Grade_id;
            $sections->Class_id= $request->Class_id;
            $sections->Status=1;
            $sections->save();

            $sections->teachers()->attach($request->teacher_id);
            toastr()->success(trans('messages.Success'));
            return redirect()->route('sections.index');

                
        }
        catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request)
    {
      // return $request;
        // $sections= sections::findOrFail($request->id);
        // return $sections;

        
        $sections= sections::findOrFail($request->id);
        $sections->section_name = ['ar'=>$request->Name, 'en'=>$request->Name_en];
        $sections->Grade_id= $request->Grade_id;
        $sections->Class_id= $request->Class_id;
       

        if(isset($request->Status)) {
            $sections->Status = 1;
          } else {
            $sections->Status = 2;
          }
        
           // update pivot tABLE
    if (isset($request->teacher_id)) {
        $sections->teachers()->sync($request->teacher_id);
    } else {
        $sections->teachers()->sync(array());
    }
        $sections->save();

       
        toastr()->success(trans('messages.Updat'));
        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request)
    {
         sections::findOrFail($request->id)->delete();
         toastr()->success(trans('messages.Delete'));
         return redirect()->route('sections.index');
    }
      
}
