@extends('layouts.master')
@section('css')

@section('title')
{{trans('main_trans.mangment_Promotion')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('main_trans.mangment_Promotion')}}</h4>
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
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_Promotion">
                    {{trans('Students_trans.back_Promotion')}}
                  </button><br><br>
                 <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0">
                        <thead >
                            <tr>
                                
                                <th>#</th>
                                <th  class="alert-info">{{trans('Students_trans.student_name')}}</th> 
                                <th  class="alert-danger">{{trans('Students_trans.From_Grade')}}</th>
                                <th  class="alert-danger">{{trans('Students_trans.From_Class')}}</th>
                                <th  class="alert-danger">{{trans('Students_trans.From_Section')}}</th>
                                <th  class="alert-success">{{trans('Students_trans.new_Grade')}}</th>
                                <th  class="alert-success">{{trans('Students_trans.new_Class')}}</th>
                                <th  class="alert-success">{{trans('Students_trans.new_Section')}}</th>
                                <th  class="alert-info">{{trans('Students_trans.processes')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <@foreach ($Promotions as $Promotion)
                                    
                                <td>{{$loop->index+1}}</td>
                                <td>{{$Promotion->student->name}}</td>
                                <td>{{$Promotion->Grade->name}}</td>
                                <td>{{$Promotion->classroom->Class_name}}</td>
                                <td>{{$Promotion->section->section_name}}</td>

                                <td>{{$Promotion->Grade_New->name}}</td>
                                <td>{{$Promotion->classroom_New->Class_name}}</td>
                                <td>{{$Promotion->section_New->section_name}}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Delete_one{{$Promotion->id}}"> {{trans('Students_trans.student_back')}}</button>
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#">{{trans('Students_trans.Graduate_back')}} </button>

                                </td>
                                
                            </tr>

                            
                            @include('pages.students.Promotions.delete_Promotion') 
                             @include('pages.students.Promotions.delete_one')
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
