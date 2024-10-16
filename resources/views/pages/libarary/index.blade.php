@extends('layouts.master')
@section('css')

@section('title')
   {{ trans('main_trans.library_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{ trans('main_trans.library_list') }}</h4>
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

<!--  error try-cathe -->
	
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

                {{-- botton add --}}
         
                <a href="{{route('libararys.create')}}" class="btn btn-success btn-sm" role="button"
                aria-pressed="true">{{trans('libarary_trans.add_libarary')}}</a><br><br>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            
                            
                            <th scope="col">#</th>
                            <th>{{trans('libarary_trans.name_book')}}</th>
                            <th>{{trans('libarary_trans.teacher')}}</th>
                            <th>{{trans('libarary_trans.Grade')}}</th>
                            <th>{{trans('libarary_trans.classrooms')}}</th>
                            <th>{{trans('libarary_trans.section')}}</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libararys as $libarary)
                            
                        
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$libarary->title}}</td>
                            <td>{{$libarary->Grade->name}}</td>
                            <td>{{$libarary->classroom->Class_name}}</td>
                            <td>{{$libarary->section->section_name}}</td>
                            <td>

                                <a href="{{route('downloadAttachment',$libarary->file_name)}}" title="تحميل الكتاب" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa fa-download"></i></a>

			                <a href="{{route('libararys.edit',$libarary->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_libarary{{ $libarary->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>

			            </td>

                        </tr>

  			            @include('pages.libarary.delete') 

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
