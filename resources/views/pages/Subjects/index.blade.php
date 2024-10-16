@extends('layouts.master')
@section('css')

@section('title')
   {{trans('main_trans.Subject')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{trans('main_trans.Subject_table')}}</h4>
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
                 {{-- botton add --}}
         
        <a href="{{route('Subjects.create')}}" class="btn btn-success btn-sm" role="button"
        aria-pressed="true">{{trans('Subjects_trans.add_subject')}}</a><br><br>
        
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> {{trans('Subjects_trans.name')}}</th>
                            <th> {{trans('Subjects_trans.Grade')}}</th>
                            <th> {{trans ('Subjects_trans.classrooms')}}</th>
                            <th> {{trans('Subjects_trans.Name_Teacher')}}</th>
                            <th> {{ trans('Subjects_trans.processes')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            
                       
                        <tr>
                            @foreach ($Subjects as $Subject )
                            <td>{{$loop->iteration}}</td>
                            <td>{{$Subject->name}}</td>                       
                            {{-- <td>{{$Subject->Grade->name}}</td> 
                            <td>{{$Subject->classroom->Class_name}}</td> --}}
                             <td>{{$Subject->grade_id}}</td> 
                            <td>{{$Subject->classroom_id}}</td> 
                            <td>{{$Subject->teachers->Name}}</td>
                           
                            <td>
                                
                                <div class="dropdown show">
                                    <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ trans('Subjects_trans.processes')}}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{route('Subjects.edit',$Subject->id)}}"><i style="color: #1d248f" class="fa fa-edit "></i>&nbsp;  {{trans('Subjects_trans.edit_subject')}}</a>
                                        <a class="dropdown-item" data-target="#delete_Subject{{ $Subject->id }}" data-toggle="modal" href="#delete_Subject{{ $Subject->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  {{trans('Subjects_trans.delete_subject')}}  </a>

                                    </div>
                                </div> 
                                
                                {{-- <a href="{{route('subjects.edit',$subject->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_subject{{ $subject->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                            --}}
                            </td>

                        </tr>
                        @include('pages.Subjects.delete')
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
