@extends('layouts.master')
@section('css')

@section('title')
{{trans('Students_trans.Payments_table')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('Students_trans.Payments_table')}}</h4>
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
                            <th>#</th>
                            <th>{{trans('Students_trans.name')}}</th>
                            <th>{{trans('Students_trans.price')}}</th>
                            <th>{{trans('Students_trans.description')}}</th>
                            <th>{{trans('Students_trans.processes')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Payments as $Payment)
                            
                        
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$Payment->student->name}}</td>
                            <td>{{$Payment->amount}}</td>
                            <td>{{$Payment->description}}</td>
                            <td><td>
                                <a href=" {{route('PaymentStudents.edit',$Payment->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Payment{{ $Payment->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
    
                            </td>
                            @include('pages.Payment.delete');
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
