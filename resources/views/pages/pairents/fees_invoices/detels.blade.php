@extends('layouts.master')
@section('css')

@section('title')
{{trans('main_trans.rebort_invoices')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('main_trans.rebort_invoices')}}</h4>
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
                            <th scope="col">{{trans('Accounts_trans.price')}}</th>               
                            <th scope="col">{{trans('Accounts_trans.description')}}</th>
                            <th scope="col">{{trans('Accounts_trans.date')}}</th>
                          </tr>
                    </thead>
                    <tbody>
                        <tr>
                       @foreach($recipt_students as $recipt_student)

                        <td>{{$loop->iteration }}</td>
                        <td>{{$recipt_student->student->name}} </td>
                        <td>{{$recipt_student->description}} </td>
                        <td>{{$recipt_student->Debit}} </td>                        
                        <td>{{$recipt_student->date}} </td>
                       
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
