@extends('layouts.master')
@section('css')

@section('title')
 {{trans('main_trans.list_Graduate')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{trans('main_trans.list_Graduate')}}<i class="fa fa-graduation-cap"></i></h4>
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

                <table id="datatable" class="table  table-hover table-sm table-bordered p-0">
                    <thead>
                       
                      <tr>
                        <th scope="col"  class="alert-info">#</th>
                        <th scope="col"  class="alert-success"> {{trans('Students_trans.name')}}</th>
                        <th scope="col"  class="alert-success"> {{trans('Students_trans.email')}}</th>
                        <th scope="col"  class="alert-success">{{trans('Students_trans.gender')}}</th>
                        <th scope="col"  class="alert-success">{{trans('Students_trans.Grade')}}</th>
                      
                        <th scope="col"  class="alert-success">{{trans('Students_trans.classrooms')}}</th>
                        <th scope="col"  class="alert-success">{{trans('Students_trans.section')}}</th>
                        <th scope="col" class="alert-info">{{trans('Students_trans.processes')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($students as $student)
                            <td> {{$loop->iteration}}  </td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->gender->Name}}</td>
                            <td>{{$student->Grade->name}}</td>
                            <td>{{$student->classroom->Class_name}}</td>
                            <td>{{$student->section->section_name}}</td>
                            <td>
                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#return_studen{{$student->id}}"> {{trans('Students_trans.student_back')}}</button>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Delete_one{{$student->id}}">{{trans('Students_trans.Delete_student')}} </button>

                            </td>
                            @include('pages.students.Graduates.return_studen')
                            @include('pages.students.Graduates.delete_one')

                        </tr>

                      
                        @endforeach
                    </tbody>
                   
                </table>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
