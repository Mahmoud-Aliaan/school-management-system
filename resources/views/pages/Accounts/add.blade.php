@extends('layouts.master')
@section('css')

@section('title')

  {{ trans('main_trans.study_fees')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.study_fees')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.study_fees')}}</li>
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

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('Accounts.store') }}" autocomplete="off">
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputEmail4"> {{ trans('Accounts_trans.name_ar')}} </label></label>
                        <input type="text" value="{{ old('title_ar') }}" name="title_ar" class="form-control">
                    </div>

                    <div class="form-group col">
                        <label for="inputEmail4"> {{ trans('Accounts_trans.name_en')}}</label>
                        <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control">
                    </div>


                    <div class="form-group col">
                        <label for="inputEmail4">{{ trans('Accounts_trans.price')}}</label>
                        <input type="number" value="{{ old('amount') }}" name="amount" class="form-control">
                    </div>

                </div>


                <div class="form-row">

                    <div class="form-group col">
                        <label for="inputState"> {{ trans('Accounts_trans.Grade')}}</label>
                        <select class="custom-select mr-sm-2" name="Grade_id">
                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($Grades as $Grade)
                                <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="inputZip"> {{ trans('Accounts_trans.classrooms')}} </label>
                        <select class="custom-select mr-sm-2" name="Classroom_id">

                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">{{ trans('Accounts_trans.academic_year')}} </label>
                        <select class="custom-select mr-sm-2" name="year">
                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                            @php
                                $current_year = date("Y")
                            @endphp
                            @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                <option value="{{ $year}}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="inputZip"> {{ trans('Accounts_trans.type_fees')}}</label>
                        <select class="custom-select mr-sm-2" name="Fee_type">
                            <option value="1"> {{ trans('Accounts_trans.Study_fees')}} </option>
                            <option value="2">{{ trans('Accounts_trans.bass_fees')}} </option>
                        </select>
                    </div>
                </div>

                
            </div>

                <div class="form-group">
                    <label for="inputAddress">ملاحظات</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">{{ trans('Accounts_trans.Click')}}</button>


            </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
