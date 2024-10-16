@extends('layouts.master')
@section('css')

@section('title')
 {{trans('main_trans.add_Graduate')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('Students_trans.add_Graduates_new')}}</h4>
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
                {{--  --}}

                <form method="post" action="{{route('Graduates.store', 'test')}}">
                    @csrf
                    <div class="form-row">
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
                        <br><br>
                        <button class="btn btn-info">{{trans('Students_trans.Click')}}</button>
                        
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
