@extends('layouts.master')
@section('css')

@section('title')
    {{trans('Students_trans.edit_processing')}}
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
       <h4> {{trans('Students_trans.edit_processing')}} : {{$processing->student->name}} </h4>
        <div class="card card-statistics h-100">
            <div class="card-body">
                {{-- start Form --}}
                <form method="post"  action="{{ route('ProcessingFees.update' , 'test') }}" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>المبلغ : <span class="text-danger">*</span></label>
                                <input  class="form-control" name="Debit" type="number" >
                                <input  type="text" name="credit"  value="{{$processing->amount}}" class="form-control">
                                <input  type="hidden" name="id"  value="{{$processing->id}}" class="form-control">
                                <input  type="hidden" name="student_id"  value="{{$processing->student_id}}" class="form-control">

                            </div>
                        </div>

 
                    </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>البيان : <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$processing->description}}</textarea>
                            </div>
                        </div>
                    </div> <br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
                </form>
                {{-- end Form --}}
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
