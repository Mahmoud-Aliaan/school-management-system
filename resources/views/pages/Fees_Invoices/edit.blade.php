@extends('layouts.master')
@section('css')

@section('title')

{{ trans('Accounts_trans.edit_Fess_invoices')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('Accounts_trans.edit_Fess_invoices')}}</h4>
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

            <form method="post" action="{{route('Fees_invoices.update','test')}}" autocomplete="off">
                @method('PUT')
                 @csrf
                 
                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputEmail4"> {{ trans('Accounts_trans.name_ar')}} </label></label>
                        <input type="text" name="title_ar" class="form-control" value="{{$Fees_Invoices->student->name}}" readonly>
                        <input type="hidden" value="{{$Fees_Invoices->id}}" name="id" class="form-control"> 
                    </div>

                  


                    <div class="form-group col">
                        <label for="inputEmail4">{{ trans('Accounts_trans.price')}}</label>
                        <input type="number"  name="amount" class="form-control" value="{{$Fees_Invoices->amount}}">
                    </div>

                </div>


                <div class="form-row">

                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputZip"> {{ trans('Accounts_trans.type_fees')}}</label>
                            <select class="custom-select mr-sm-2" name="Account_id">
                                @foreach($Accounts as $Account)
                                    <option value="{{$Account->id}}" {{$Account->id == $Fees_Invoices->account_id ? 'selected':"" }}>{{$Account->title}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label for="inputAddress">ملاحظات</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{$Fees_Invoices->description}}</textarea>
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
