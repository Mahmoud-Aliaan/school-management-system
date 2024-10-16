<?php

namespace App\Repository;


use App\Models\Grade;
use App\Models\Laibrary;
use App\Repository\LibararysRepository;
//use app\Http\Traits\UploadAtchhmentTrait;
use App\Http\Controllers\trait\uploadAtachment;
use App\Repository\LibararysRepositoryInterface;

class LibararysRepository implements LibararysRepositoryInterface{
    
    // use UploadAtchhmentTrait;
    use uploadAtachment;
    public function index(){
        $libararys= Laibrary::all();
        return view('pages.libarary.index',compact('libararys'));
    }

    public function create(){
        $Grades= Grade::all();
        return view('pages.libarary.create',compact('Grades'));
    }
    public function edit($id){
       $libarary = Laibrary::findOrfail($id);
       //return $libarary;
        $Grades= Grade::all();
        return view('pages.libarary.edit',compact('libarary','Grades'));
    }
    public function store($request){
        try {

            $book= new Laibrary ();
            $book->title= $request->name_book;
            $book->file_name= $request->file('file_name')->getClientOriginalName();
            $book->Grade_id= $request->Grade_id;
            $book->Classroom_id=$request->Classroom_id;
            $book->section_id= $request->section_id;
            $book->teacher_id=1;
            $book->save();
            $this->Uploadfile($request, 'file_name' , 'Libarary');
           
                    toastr()->success(trans('messages.success'));
                    return redirect()->route('libararys.index');
            }
        
             catch (\Exception $e) {
                    
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }
    }

    public function destroy($request ){
    

    try{

        $this->deletefaile($request->file_name, 'Libarary');
        Laibrary::destroy($request->libarary_id);
        toastr()->error(trans('messages.Delete'));
        return back();
    }catch(\Exception $e){
        return redirect()->back()->with(['error'=>$e->getMessage()]);
    }
    }

    public function update($request){
        try {
            
            $book=  Laibrary::findOrfail($request->id);
            if($request->file('file_name')){

                $this->deletefaile($book->file_name, 'Libarary');   // First Delete pdf in server & folder
                $this->Uploadfile($request, 'file_name' , 'Libarary'); // Creaate new pdf in server & Folder

                
                
                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
               // if $book=>file_name dont = filenew add action select file_new in db & folder
            }
            $book->title= $request->name_book;
           
            $book->Grade_id= $request->Grade_id;
            $book->Classroom_id=$request->Classroom_id;
            $book->section_id= $request->section_id;
            $book->teacher_id=1;
            $book->save();
           
           
                    toastr()->success(trans('messages.success'));
                    return redirect()->route('libararys.index');
            }
        
             catch (\Exception $e) {
                    
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }
    }

    public function download($filename)
    {
        try {
             
            return response()->download(public_path('attachments/Libarary/'.$filename));

           
                    toastr()->success(trans('messages.success'));
                    return redirect()->route('receipt_students.index');
            }
        
             catch (\Exception $e) {
                  
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }
       
    }
}