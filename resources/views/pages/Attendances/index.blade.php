@extends('layouts.master')
@section('css')

@section('title')
{{trans('main_trans.Attendance')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{trans('main_trans.Attendance')}}</h4>
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

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                {{-- start --}}
                <div class="accordion gray plus-icon ">
                    @foreach ($Grades as $Grade)
                      <div class="acd-group">
                          <a href="#" class="acd-heading">{{$Grade->name}}</a>
                          <div class="acd-des">

                            
                         
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('Section_trans.section_name')}}</th>
                                        <th>{{trans('Section_trans.Class_name')}}</th>
                                        <th>{{trans('Section_trans.Grades_name')}}</th>
                                        <th>{{trans('Section_trans.processes')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <?php $i=0?>    
                                    @foreach ($Grade->sections as $list_Section )
                                    <tr>
                                      <?php $i++ ?>
                                        <td>{{$i}}</td>
                                        <td>{{ $list_Section->section_name }}</td>
                                        <td>{{ $list_Section->My_classs->Class_name }}</td>
                                        <td>
                                            @if ($list_Section->Status === 1)
                                            <label
                                                class="badge badge-success">{{ trans('Section_trans.Status_Section_AC') }}</label>
                                        @else
                                            <label
                                                class="badge badge-danger">{{ trans('Section_trans.Status_Section_No') }}</label>
                                        @endif
                                        </td>
                                        
                                        <td>
                                         
                                            <a href="{{route('Attendance.show',$list_Section->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true"> قائمة الطلاب</a>
        
                                        </td>
                                    </tr>
                                    
                                  
        
                                  
                                    
        
                                    @endforeach
                                </tbody>
                            </table>
                          </div>
                        
                          
                      </div>
                      
                      
                      @endforeach 
                  </div>
                {{-- end --}}
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
