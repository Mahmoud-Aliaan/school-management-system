@extends('layouts.master')
@section('css')

@section('title')

  {{ trans('main_trans.study_fees')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.study_fees')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.study_fees')}}</li>
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
                <a href="{{route('Accounts.create')}}" class="btn btn-success btn-sm" role="button"
                 aria-pressed="true"> {{ trans('Accounts_trans.add_acounts')}}</a><br><br>
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col">{{ trans('Accounts_trans.name')}}</th>
                            <th scope="col">{{ trans('Accounts_trans.price')}}</th>
                            <th scope="col"> {{ trans('Accounts_trans.Grade')}}</th>
                            <th>{{ trans('Accounts_trans.classrooms')}}</th>
                            <th>{{ trans('Accounts_trans.academic_year')}}</th>
                            <th>{{ trans('Accounts_trans.Notes')}}</th>
                            <th>{{ trans('Accounts_trans.processes')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($Accounts as $Account)         
                           
                            <td> {{$loop->iteration}}  </td>
                            <td>{{$Account->title}}</td>
                            <td>{{ number_format( $Account->amount , 2)}}</td>
                            <td>{{$Account->Grade->name}}</td>
                            <td>{{$Account->classroom->Class_name}}</td>
                            <td>{{$Account->year}}</td>
                            <td>{{$Account->description}}</td>
                            <td>
                                <a href="{{route('Accounts.edit',$Account->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee{{ $Account->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                <a href="#" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>

                            </td>
                            @include('pages.Accounts.delete');
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
