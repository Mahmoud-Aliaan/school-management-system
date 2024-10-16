@extends('layouts.master')
@section('css')

@section('title')
{{trans('main_trans.fees_invoices')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('main_trans.fees_invoices')}}</h4>
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
                            <th scope="col">#</th>
                            <th scope="col"> {{trans('Accounts_trans.name')}}</th>
                            <th scope="col"> {{trans('Accounts_trans.type_fees')}}</th>
                            <th scope="col">{{trans('Accounts_trans.price')}}</th>
                            <th scope="col">{{trans('Accounts_trans.Grade')}}</th>
                          
                            <th scope="col">{{trans('Accounts_trans.classrooms')}}</th>
                            <th scope="col">{{trans('Accounts_trans.description')}}</th>
                            <th scope="col">{{trans('Accounts_trans.processes')}}</th>
                          </tr>
                    </thead>
                    <tbody>
                        <tr>
                       @foreach($Fees_Invoices as $Fees_Invoice)

                        <td>{{$loop->iteration }}</td>
                        <td>{{$Fees_Invoice->student->name}} </td>
                        <td>{{$Fees_Invoice->Accounts->title}} </td>
                        <td>{{ number_format($Fees_Invoice->amount, 2) }}</td>
                        <td>{{$Fees_Invoice->Grade->name}} </td>
                        <td>{{$Fees_Invoice->classroom->Class_name}} </td>
                        <td>{{$Fees_Invoice->description}} </td>
                        <td>
                            <a href="{{route('Fees_invoices.edit',$Fees_Invoice->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee{{ $Fees_Invoice->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>

                        </td>
                        @include('pages.Fees_Invoices.delete');
                        </tr>
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
