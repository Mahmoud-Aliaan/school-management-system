@extends('layouts.master')
@section('css')

@section('title')
   {{trans('Students_trans.receipt_student')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('Students_trans.receipt_student')}}</h4>
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
                {{-- start table --}}
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('Students_trans.name')}}</th>
                            <th>{{trans('Students_trans.price')}}</th>
                            <th>{{trans('Students_trans.description')}}</th>
                            <th>{{trans('Students_trans.processes')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($receipt_students as $receipt_student)
                            
                        
                        <tr>
                            <td> {{$loop->iteration }}</td>
                            <td> {{$receipt_student->student->name }}</td>
                            <td>{{$receipt_student->Debit}}</td>
                            <td>{{$receipt_student->description}}</td>
                            <td>
                           
                              
                                <a href="{{route('receipt_students.edit',$receipt_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete_Student{{ $receipt_student->id }}" title="{{ trans('Students_trans.Delete') }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                           

                        </tr>
                        @include('pages.receipt.delete')
                        @endforeach
                    </tbody>
                </table>
                {{-- end table --}}
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
