@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('Teacher_trans.quess_students_exam') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
          
            <h3 class="mb-0">{{ trans('Teacher_trans.quess_students_exam') }}</h3>
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
                {{-- start student  --}}

                
                     <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>اسم الطالب</th>
                                <th>اخر سؤال</th>
                                <th>الدرجه</th>
                                <th>الحالة </th>
                                <th>تاريخ اجراء الاختبار</th>
                                <th>العمليات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($degrees as $degree)
                                
                           
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$degree->student->name}}</td>
                                    <td>{{$degree->question_id}}</td>
                                    <td>{{$degree->score}}</td>                                   
                                    @if ($degree->abuse == 0 )
                                    <td style="color: green"> لا يوجد تلاعب</td>                                                                      
                                    @else
                                    <td style="color: red">  يوجد تلاعب</td> 
                                    @endif
                                    <td>{{$degree->date}}</td>
                                    
                                    <td>
                                        <a href="{{route('Quezzie.repeat',$degree->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="{{ trans('Teacher_trans.repeat') }}" ><i class="fa fa-repeat" aria-hidden="true"></i></a>
                                                    {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Quizze{{ $Quizze->id }}" title="{{ trans('Teacher_trans.repeat') }}"><i class="fa fa-repeat" aria-hidden="true"></i></button> --}}

                                        </td>

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
