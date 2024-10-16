@extends('layouts.master')
@section('css')

@section('title')
   {{ trans('main_trans.Quizzes') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.Quizze_list') }}</h4>
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
                {{-- botton add --}}
                        
                <a href="{{route('Quizzes.create')}}" class="btn btn-success btn-sm" role="button"
                aria-pressed="true">{{trans('Quizze_trans.add_Quizze')}}</a><br><br>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{trans('Quizze_trans.Quizze_name')}}</th>
                            <th scope="col">{{trans('Quizze_trans.teacher_name')}}</th>
                            <th scope="col">{{trans('Quizze_trans.Grade')}}</th>
                            <th scope="col">{{trans('Quizze_trans.classrooms')}}</th>
                            <th scope="col">{{trans('Quizze_trans.section')}}</th>
                            <th scope="col">{{trans('Quizze_trans.processes')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Quizzes as $Quizze)                                                  
                        <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$Quizze->name}}</td>
                           <td>{{$Quizze->Grade->name}}</td>
                           <td>{{$Quizze->classroom->Class_name}}</td>
                           <td>{{$Quizze->section->section_name}}</td>
                           <td>{{$Quizze->teachers->Name}}</td>
                           <td>
                            <a href="{{route('Quizzes.edit',$Quizze->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Quizze{{ $Quizze->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>

                        </td>
                       
                        </tr>
                        @include('pages.Quizzes.delete')
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
