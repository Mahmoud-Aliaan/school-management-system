@extends('layouts.master')
@section('css')

@section('title')
   {{ trans('Quizze_trans.add_Quizze') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('Quizze_trans.add_Quizze') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                {{-- add Form --}}
                <form action="{{route('Quizzes.store')}}" method="POST" autocomplete="off">
                    {{-- @method('Pathe') --}}
                    @csrf
                    {{-- start Quizze  --}}
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Quizze_trans.Quizze_name_ar') }}
                                :</label>
                            <input id="Name" type="text" name="Name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('Quizze_trans.Quizze_name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="Name_en">
                        </div>
                    </div>
                   
                      {{-- End Quizze  --}}
                     <br><br>
                     {{-- sratr subject  --}}
                        <div class="col">
                            <div class="form-group">
                                <label for="Grade_id">المادة الدراسية : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="subject_id">
                                    <option selected disabled>حدد المادة الدراسية...</option>
                                    @foreach($Subjects as $subject)
                                        <option  value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- End subject  --}}
                        <br><br>
                        {{--  START FOrm Select   --}}
                        <div class="row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('Students_trans.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id" required>
        
                                </select>
                            </div>
        
                            <div class="form-group col">
                                <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>
        
                                </select>
                            </div>
                        </div>
                        {{--  END FOrm Select serch  --}}
                        <br><br>
                        {{--  Start  Select Teachers  --}}
                        <div class="row">
                            
                            <div class="col">
                                <div class="form-group">
                                    <label for="Grade_id"> {{trans('Section_trans.select_teacher')}}  : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="teacher_id">
                                        <option selected disabled>{{trans('Section_trans.teacher_name')}}  ...</option>
                                        @foreach($Teachers as $teacher)
                                            <option  value="{{ $teacher->id }}">{{ $teacher->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--  Start  Select Teachers  --}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('Quizze_trans.submit') }} </button>

                       
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
