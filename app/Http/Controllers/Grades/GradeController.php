<?php 

 namespace App\Http\Controllers\Grades;
 use App\Models\Grade;

use App\Models\Classrom;
use Illuminate\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\GradestRequest;

class GradeController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Grades= Grade::all();
   return view('pages.Grades.Grades' ,compact('Grades')); 
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
  public function store(GradestRequest $request)
  {
    try{
      $validated = $request->validated();

      $Grade=  new Grade();
      $Grade->name = ['ar'=>$request->Name,'en'=>$request->Name_en];
      $Grade->notes=$request->Notes;
      $Grade->save();

      toastr()->success(trans('messages.Success'));
      return redirect()->route('Grades.index');

    }
    catch
    (\Exception $e) {
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
  public function edit(request $request)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(GradestRequest $request)
  {
    try{
      $validated = $request->validated();
      
        // return $request;
        $Grades= Grade::findOrfail($request->id);
          $Grades->update([
            $Grades->name = ['ar'=>$request->Name,'en'=>$request->Name_en],
            $Grades->notes=$request->Notes,
            $Grades->save(),
            
          ]);
          
          toastr()->success(trans('messages.Updat'));
        
          return redirect()->route('Grades.index');
    } 
    catch
    (\Exception $e) {
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
    $Myclass= Classrom::where('Grade_id', $request->id)->pluck('Grade_id');

    if($Myclass->count() == 0){

      $Grades= Grade::findOrfail($request->id)->delete();
      toastr()->warning(trans('messages.Delete'));
          
            return redirect()->route('Grades.index');
    }

    else{

      toastr()->warning(trans('Class_trans.delete_Class_Error'));
          
      return redirect()->route('Grades.index');
    }
   
  
}

}
?>