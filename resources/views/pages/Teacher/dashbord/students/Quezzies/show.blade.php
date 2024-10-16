@extends('layouts.master')
@section('css')

@section('title')

{{trans('main_trans.Question_list')}}

@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('main_trans.Question_list')}} :<span style="color: rgb(224, 15, 61)">{{$Quizzes->name}}</span> </h4>
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
                         
                <a href="{{route('Questions.show',$Quizzes->id)}}" class="btn btn-success btn-sm" role="button"
                aria-pressed="true">{{trans('Questions_trans.add_question')}}</a><br><br>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>{{trans('Questions_trans.title')}}</th>
                            <th>{{trans('Questions_trans.answers')}}</th>
                            <th>{{trans('Questions_trans.right_answer')}}</th>
                            <th>{{ trans('Questions_trans.score')}}</th>
                            {{-- <th>{{trans('Questions_trans.Quizze_name')}}</th>                            --}}
                            <th>{{trans('Questions_trans.processes')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Questions as $Question)
                            
                       
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$Question->title}}</td>
                            <td>{{$Question->answers}}</td>
                            <td>{{$Question->right_answer}}</td>
                            <td>{{$Question->score}}</td>
                            {{-- <td>{{$Question->Quizze->name}}</td> --}}
                            
                            <td>
                                <a href="{{route('Questions.edit',$Question->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Question{{ $Question->id }}" title="{{ trans('Questions_trans.delete') }}"><i class="fa fa-trash"></i></button>
    
                            </td>                                                     

                        </tr>
                        @include('pages.Teacher.dashbord.students.Qusitions.delete') 
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
