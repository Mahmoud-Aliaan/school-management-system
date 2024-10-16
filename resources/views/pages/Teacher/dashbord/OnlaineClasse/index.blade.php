@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main_trans.online_classe') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('main_trans.online_classe')}}</h4>
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
         
                    {{-- <a href="{{route('online_classe.create')}}" class="btn btn-success btn-sm" role="button"
                    aria-pressed="true">{{trans('online_classe_trans.add_online_classe')}}</a> --}}
                    <a class="btn btn-warning" href="{{route('indirect_teacher.create')}}">اضافة حصة اوفلاين </a><br><br>


                <table class="table table-striped">
                    <thead>
                        <tr  class="alert-success">
                            <th scope="col">#</th>
                            <th scope="col">{{trans('online_classe_trans.Grade')}}</th>                     
                            <th scope="col">{{trans('online_classe_trans.classrooms')}}</th>
                            <th scope="col">{{trans('online_classe_trans.section')}}</th>
                            <th scope="col">{{trans('online_classe_trans.tecther')}}</th>
                            <th scope="col">{{trans('online_classe_trans.topic')}}</th>
                            <th scope="col">{{trans('online_classe_trans.duration')}}</th>
                            <th scope="col">{{trans('online_classe_trans.start_time')}}</th>
                            <th scope="col">{{trans('online_classe_trans.url_classe')}}</th>
                            <th scope="col">{{trans('online_classe_trans.processes')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($online_classes as $online_classe)
                            
                       
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$online_classe->Grade->name}}</td>                           
                            <td>{{$online_classe->classroom->Class_name}}</td>
                            <td>{{$online_classe->section->section_name}}</td>

                            {{-- <td>{{$online_classe->user->name}}</td> --}}
                            <td>{{auth()->user()->name}}</td>
                            <td>{{$online_classe->topic}}</td>
                            <td>{{$online_classe->duration}}</td>
                            <td>{{$online_classe->start_at}}</td>
                            
                            <td class="text-danger"><a href="{{$online_classe->join_url}}" target="_blank">انضم الان</a></td>
                            <td>

			
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_online_classe{{$online_classe->id}}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>

			            </td>

                        </tr>

  			            @include('pages.OnlaineClasse.delete') 

                    </tbody>
                    @endforeach
                </table>   



            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
