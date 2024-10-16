<?php 

namespace App\Http\Controllers\Classes;

use App\Models\Grade;
use App\Models\Classrom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassesRequest;

class ClassromController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Classes= Classrom::all();
    $Grades= Grade::all();
    return view ( 'pages.Classes.Classrooms',compact('Classes','Grades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ClassesRequest $request)
  {
    // $List_Classes= $request->List_Classes;
    try {
      $validated = $request->validated();

      foreach($request->List_Classes as $data){
        $Classroom= new Classrom();
        $Classroom->Class_name=['ar'=>$data['Name'], 'en'=>$data['name_class_en']];
        $Classroom->Grade_id=$data['Grade_id'];
        $Classroom->save();
      }

      toastr()->success(trans('messages.Success'));
      return redirect()->route('Classes.index');


    }
    catch(\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(ClassesRequest $request)
  {
    // return $request;
    $validated = $request->validated();  
    try {
  
      $my_class= Classrom::findOrfail($request->id);
      $my_class->update([
        $my_class->Class_name=['ar'=>$request->Name, 'en'=>$request->Name_en],
        $my_class->Grade_id= $request->Grade_id

      ]);
        toastr()->success(trans('messages.Updat'));
        return redirect()->route('Classes.index');

      }      
    catch(\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(request $request)
  {
    $Grades= Classrom::findOrfail($request->id)->delete();
    toastr()->warning(trans('messages.Delete'));
        
          return redirect()->route('Classes.index');
  }

  public function search_Grades(request $request){
    $Grades = Grade::all();
    $Search= Classrom::select('*')->where('Grade_id' ,'=',$request->Grade_id)->get();
    
    return view('pages.Classes.Classrooms' , compact('Grades'))->withDetails($Search);
  }
  
}

?>