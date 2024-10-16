@extends('layouts.master')
@section('css')

@section('title')

{{trans('main_trans.Attendance_reborts')}}
@stop
@endsection
@section('page-header')
<!--  error try-cathe -->
	
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('main_trans.Attendance_reborts')}}</h4>
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
                <h5 style="color: blue"> {{trans('reborts_trans.data_serche')}}</h5>

                <form action="{{route('serch_attendence')}}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Grade_id">{{trans('reborts_trans.students')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="student_id">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    <option value="0" > الكل</option>
                                    @foreach($students as $student)
                                        <option  value="{{ $student->id }}">{{ $student->name }}</option>
                                 
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>
                        {{-- from --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('reborts_trans.from')}}  :</label>
                                <input placeholder="تاريخ البداية" class="form-control range-to date-picker-default" type="text"  id="datepicker-action" required name="from" data-date-format= "yyyy-mm-dd">
                            </div>
                        </div>
                        {{-- to --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('reborts_trans.to')}}  :</label>
                                <input class="form-control range-to date-picker-default" placeholder="تاريخ النهاية" type="text" required name="to"  data-date-format= "yyyy-mm-dd">
                            </div>
                        </div>


                    </div>
                    <P>
                        <button class="btn btn-success" type="submit">{{ trans('Students_trans.submit') }}</button>
                    </P>
                </form>
                <br><br>

                @isset($Studdents)
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> {{trans('Students_trans.name')}}</th>                                {{-- <th scope="col">{{trans('Students_trans.gender')}}</th> --}}
                                <th scope="col">{{trans('Students_trans.Grade')}}</th>                     
                                <th scope="col">{{trans('Students_trans.classrooms')}}</th>
                                <th scope="col">{{trans('Students_trans.section')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Studdents as $Student)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$Student->name}}</td>                            {{-- <td>{{$Student->gender->Name}}</td> --}}
                            <td>{{$Student->Grade->name}}</td>
                            <td>{{$Student->classroom->Class_name}}</td>
                            <td>{{$Student->section->section_name}}</td>
                            <td>

                                @if($student->attendence_status == 0)
                                    <span class="btn-danger">غياب</span>
                                @else
                                    <span class="btn-success">حضور</span>
                                @endif
                            </td>
                            @endforeach



                        </tbody>
                    </table> 
                </div>  
                @endisset

               
            </div>           
        </div>

        
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
