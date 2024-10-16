@extends('layouts.master')
@section('css')

@section('title')
{{ trans('Accounts_trans.add_fees_invoices') }}
@stop
@endsection
@section('page-header')

@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                {{-- start add fess invoices   --}}
                <form class=" row mb-30" action="{{route('Fees_invoices.store')}}" method="POST">

                      @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="lest_FeesInvoices">
                                <div data-repeater-item>
                                    <div class="row">

                                        

                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">{{ trans('Accounts_trans.name') }} </label>
                                            <select class="fancyselect" name="student_id" required>
                                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                            </select>
                                        </div> 
                                        


                                      
                                           
                                            

                                            <div class="form-group col">
                                                <label for="inputState">{{ trans('Accounts_trans.type_fees') }}</label>
                                                <select class="custom-select mr-sm-2" name="Account">
                                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                   @foreach ($Accounts as $Account)
                                                        <option value="{{ $Account->id }}">{{ $Account->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        

                                        <div class="form-group col">
                                            <label for="inputState"> {{ trans('Accounts_trans.price')}}</label>
                                            <select class="custom-select mr-sm-2" name="amount">
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                @foreach ($Accounts as $Account)
                                                <option value="{{ $Account->amount }}">{{ $Account->amount }}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                        


                                        <div class="col">
                                            <label for="description" class="mr-sm-2">{{ trans('Accounts_trans.description') }}</label>
                                            <div class="box">
                                                <input type="text" class="form-control" name="description" required>
                                            </div>
                                        </div>


                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('Class_trans.Processes') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('Class_trans.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('Class_trans.add_row') }}"/>
                                </div>

                            </div>
                            
                            <input type="hidden" name="Grade_id"  value="{{ $student->Grade_id }}">
                            <input type="hidden" name="Classroom_id"  value="{{ $student->Classroom_id }}">
                       
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('Class_trans.Close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('Class_trans.submit') }}</button>
                            </div>


                        </div>
                    </div>
                </form>
                {{--  end add fess invoices  --}}
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
