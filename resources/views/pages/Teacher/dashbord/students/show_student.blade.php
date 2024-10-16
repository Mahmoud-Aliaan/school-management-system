@extends('layouts.master')
@section('css')

@section('title')
   {{ trans('main_trans.students_table') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">    {{ trans('main_trans.Attendance') }} </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="" class="default-color"> {{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Attendance') }}</li>
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
                <h5 style="font-family: 'Cairo', sans-serif;color: red"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
                <form method="post" action="{{route('attendence')}}">
                    @csrf
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                
                                <th scope="col">#</th>
                                <th scope="col"> {{trans('Students_trans.name')}}</th>
                                <th scope="col"> {{trans('Students_trans.email')}}</th>
                                <th scope="col">{{trans('Students_trans.gender')}}</th>
                                <th scope="col">{{trans('Students_trans.Grade')}}</th>                     
                                <th scope="col">{{trans('Students_trans.classrooms')}}</th>
                                <th scope="col">{{trans('Students_trans.section')}}</th>
                                <th scope="col">{{trans('Students_trans.processes')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->gender->Name}}</td>
                            <td>{{$student->Grade->name}}</td>
                            <td>{{$student->classroom->Class_name}}</td>
                            <td>{{$student->section->section_name}}</td>
                            <td>
                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                    <input name="attendences[{{ $student->id }}]" 
                                    @foreach ($student->attendance()->where('attendence_date',date('Y-m-d'))->get() as $attendance)
                                       {{ $attendance->attendence_status == 1 ? 'checked' : '' }}
                                    @endforeach
                                        class="leading-tight" type="radio" value="presence">
                                    <span class="text-success">حضور</span>
                                </label>

                                <label class="ml-4 block text-gray-500 font-semibold">
                                    <input name="attendences[{{ $student->id }}]" 
                                    @foreach ($student->attendance()->where('attendence_date',date('Y-m-d'))->get() as $attendance)
                                       {{ $attendance->attendence_status == 0 ? 'checked' : '' }}
                                    @endforeach
                                        class="leading-tight" type="radio" value="absent">
                                    <span class="text-danger">غياب</span>
                                </label>

                                <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                <input type="hidden" name="grade_id" value="{{ $student->Grade_id }}">
                                <input type="hidden" name="classroom_id" value="{{ $student->Classroom_id }}">
                                <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                                
                            </td>
                            
                            </tr>

                            @endforeach
                            
                        </tbody>
                    </table>
                    <P>
                        <button class="btn btn-success" type="submit">{{ trans('Students_trans.submit') }}</button>
                    </P>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
