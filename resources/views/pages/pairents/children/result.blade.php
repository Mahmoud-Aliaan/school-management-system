@extends('layouts.master')
@section('css')

@section('title')
نتائج
الاختبارات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
          
           
            <div class="card-body">
                <h4>  نتائج الاختبارات</h4>
                {{-- start table --}}
                <table class="table table-striped">
                    <thead>
                       
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col"> {{trans('Students_trans.name')}}</th>
                        <th scope="col"> {{trans('main_trans.Quizzes')}}</th>
                        <th scope="col">{{trans('Students_trans.score')}}</th>
                        <th scope="col">{{trans('Students_trans.date_ex')}}</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                       
                                                    
                      <tr>
                        @foreach ($degrees as $degree)
                        <td>{{$loop->iteration}}</td>
                        <td>{{$degree->student->name}}</td>
                        <td>{{$degree->quizze->name}}</td>
                        <td>{{$degree->score}}</td>
                        <td>{{$degree->date}}</td>
                        
                       
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
