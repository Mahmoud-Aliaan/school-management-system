@extends('layouts.master')
@section('css')

@section('title')
{{trans('main_trans.Quizze_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> جدول الامتحانات</h4>
        </div>
        <br><br>
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
                            <th scope="col">{{trans('Quizze_trans.Quizze_name')}}</th>                           
                            <th scope="col">{{trans('Quizze_trans.Grade')}}</th>
                            <th scope="col">{{trans('Quizze_trans.classrooms')}}</th>
                            <th scope="col">{{trans('Quizze_trans.section')}}</th>
                            <th scope="col">{{trans('Quizze_trans.processes')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            
                            
                            @foreach ($Quizzes as $Quizze)
                          
                            <td>{{$loop->iteration}}</td>
                            <td>{{$Quizze->name}}</td>                         
                           <td>{{$Quizze->Grade->name}}</td>
                           <td>{{$Quizze->classroom->Class_name}}</td>
                           <td>{{$Quizze->section->section_name}}</td>   

                            <td>
                                @if($Quizze->degree->count() > 0 && $Quizze->id == $Quizze->degree[0]->quizze_id)
                            {{$Quizze->degree[0]->score}}
                            @else
                                <a href="{{route('exam.show',$Quizze->id)}}" 
                                     class="btn btn-outline-success btn-sm" role="button"
                                    aria-pressed="true" onclick="alertAbuse()">
                                     <i class="fa fa-pencil-square-o"></i>
                            </a>
                            @endif
                            
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
<script>
    function alertAbuse() {
        alert("برجاء عدم إعادة تحميل الصفحة بعد دخول الاختبار - في حال تم تنفيذ ذلك سيتم الغاء الاختبار بشكل اوتوماتيك ");
    }
</script>
@endsection
