@extends('layouts.master')
@section('css')

@section('title')
    {{trans('main_trans.students_table')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('main_trans.students_table')}}</h4>
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
                <table class="table table-striped">
                    <thead>
                       
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col"> {{trans('Students_trans.name')}}</th>
                        <th scope="col"> {{trans('Students_trans.email')}}</th>
                        <th scope="col">{{trans('Students_trans.gender')}}</th>
                        <th scope="col">{{trans('Students_trans.Grade')}}</th>                     
                        <th scope="col">{{trans('Students_trans.classrooms')}}</th>
                        <th scope="col">{{trans('Students_trans.section')}}</th>
                        <th scope="col">{{trans('Students_trans.processes')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                       
                                                    
                      <tr>
                        @foreach ($students as $student)
                        <td>{{$loop->iteration}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->gender->Name}}</td>
                        <td>{{$student->Grade->name}}</td>
                        <td>{{$student->classroom->Class_name}}</td>
                        <td>{{$student->section->section_name}}</td>
                        <td>
                            {{-- 
                                <a href="{{route('Students.edit',$student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete_Student{{ $student->id }}" title="{{ trans('Students_trans.Delete') }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a href="{{route('Students.show',$student->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa fa-eye"></i></a> 
                            --}}

                            <div class="dropdown show">
                                <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    العمليات
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('Students.show',$student->id)}}"><i style="color: #ffc107" class="fa fa-eye "></i>&nbsp;    {{trans('Students_trans.show_data_student')}}</a>
                                    <a class="dropdown-item" href="{{route('Students.edit',$student->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;   {{trans('Students_trans.edit_data_student')}}    </a>
                                    <a class="dropdown-item" href="{{route('Fees_invoices.show',$student->id)}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp; {{trans('Students_trans.add_fees_student')}}   &nbsp;</a>
                                    <a class="dropdown-item" href="{{route('receipt_students.show',$student->id)}}"><i style="color: #9dc8e2" class="fa fa-edit"></i>&nbsp; {{trans('Students_trans.add_receipt_student')}} </a>
                                    <a class="dropdown-item" href="{{route('ProcessingFees.show',$student->id)}}"><i style="color: #061a27" class="fa fa-edit"></i>&nbsp;  {{trans('Students_trans.fees_process')}}  </a>
                                    <a class="dropdown-item" href="{{route('PaymentStudents.show',$student->id)}}"><i style="color: #1a93a3" class="fa fa-edit"></i>&nbsp; &nbsp; {{trans('Students_trans.Payments')}}  </a>

                                    <a class="dropdown-item" data-target="#Delete_Student{{ $student->id }}" data-toggle="modal" href="##Delete_Student{{ $student->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  {{trans('Students_trans.delete_data_student')}}  </a>
                                </div>
                            </div>
                        </td>
                      </tr>
                      @include('pages.students.delete_student')
                     

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
