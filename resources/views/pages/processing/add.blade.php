@extends('layouts.master')
@section('css')

@section('title')
    {{trans('Students_trans.add_processing')}}
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

       <h4> {{trans('Students_trans.add_processing')}} : {{$student->name}} </h4>
        <div class="card card-statistics h-100">
            <div class="card-body">
                {{-- start Form --}}
                <form method="post"  action="{{ route('ProcessingFees.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>المبلغ : <span class="text-danger">*</span></label>
                                <input  class="form-control" name="credit" type="number" >
                                <input  type="hidden" name="student_id"  value="{{$student->id}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>رصيد الطالب : </label>
                                <input  class="form-control" name="final_balance" value="{{ number_format($student->Invoices_student->sum('Debit') - $student->Invoices_student->sum('credit'), 2) }}" type="text" readonly>
                            </div>
                        </div>
                    </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>البيان : <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
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
