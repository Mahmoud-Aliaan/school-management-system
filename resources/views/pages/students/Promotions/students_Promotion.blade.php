@extends('layouts.master')
@section('css')

@section('title')
{{trans('main_trans.students_Promotion')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('main_trans.students_Promotion')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{trans('main_trans.students_Promotion')}}</li>
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
                @if (Session::has('error_promotions'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('error_promotions')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

                <h6 style="color: rgb(206, 26, 26);font-family: Cairo">المرحلة الدراسية القديمة</h6><br>

            <form method="post" action="{{route('Promotions.store')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputState">{{trans('Students_trans.Grade')}}</label>
                        <select class="custom-select mr-sm-2" name="Grade_id" required>
                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($Grades as $Grade)
                                <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span
                                class="text-danger">*</span></label>
                        <select class="custom-select mr-sm-2" name="Classroom_id" required>

                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="section_id">{{trans('Students_trans.section')}} : </label>
                        <select class="custom-select mr-sm-2" name="section_id" required>

                        </select>
                    </div>
                    {{-- yer  --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="academic_year">
                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                @php
                                    $current_year = date("Y");
                                @endphp
                                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                    <option value="{{ $year}}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <br><h6 style="color: rgb(76, 0, 255);font-family: Cairo">المرحلة الدراسية الجديدة</h6><br>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputState">{{trans('Students_trans.Grade')}}</label>
                        <select class="custom-select mr-sm-2" name="Grade_id_new" >
                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($Grades as $Grade)
                                <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="Classroom_id">{{trans('Students_trans.classrooms')}}: <span
                                class="text-danger">*</span></label>
                        <select class="custom-select mr-sm-2" name="Classroom_id_new" >

                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="section_id">:{{trans('Students_trans.section')}} </label>
                        <select class="custom-select mr-sm-2" name="section_id_new" >

                        </select>
                    </div>

                    {{-- yer new --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="academic_year">{{trans('Students_trans.academic_year_new')}} : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="academic_year_new">
                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                @php
                                    $current_year = date("Y");
                                @endphp
                                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                    <option value="{{ $year}}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">تاكيد</button>
            </form>

        </div>
    </div>
</div>

</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
