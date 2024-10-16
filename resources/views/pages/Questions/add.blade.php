@extends('layouts.master')
@section('css')

@section('title')
{{trans('Questions_trans.add_question')}}
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

                {{-- add Form --}}
                <form action="{{route('Questions.store')}}" method="POST" autocomplete="off">
                    {{-- @method('Pathe') --}}
                    @csrf
                    {{-- start Quizze  --}}
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Questions_trans.name_ar') }}
                                :</label>
                            <input id="Name" type="text" name="Name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('Questions_trans.name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="Name_en">
                        </div>
                    </div>
                   
                      {{-- End Quizze  --}}                    

                      <br><br>

                      {{-- sratr answers  --}} 
                      <div class="col">
                        <div class="form-group">
                            <label for="Grade_id"> {{ trans('Questions_trans.answers') }} :</label>
                            <input type="text" class="form-control" name="answers">
                        </div>
                    </div>                     
                    {{-- End answers  --}}
                     
                      {{-- sratr right_answer  --}} 
                      <div class="col">
                        <div class="form-group">
                            <label for="Grade_id"> {{ trans('Questions_trans.right_answer') }} :</label>
                            <input type="text" class="form-control" name="right_answer">
                        </div>
                    </div>
                    {{-- End right_answer  --}}
                     <br><br>
                     {{-- sratr Quizze_name  --}}
                        <div class="row"> 
                            <div class="col">
                                <div class="form-group">
                                    <label for="Grade_id"> {{trans('Questions_trans.Quizze_name')}}  : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Quizze_id">
                                        <option selected disabled>حدد {{trans('Questions_trans.Quizze_name')}} ...</option>
                                        @foreach($Quizzes as $Quizze)
                                            <option  value="{{ $Quizze->id }}">{{ $Quizze->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                {{-- End score  --}}

                                {{-- start score  --}}
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id"> {{trans('Questions_trans.score')}}  : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="score_id">
                                            <option selected disabled>حدد {{trans('Questions_trans.score')}} ...</option>
                                                        <option value="5">5</option>
                                                        <option value="10">10</option>
                                                        <option value="15">15</option>
                                                        <option value="20">20</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- End score  --}}
                        </div>
                        
                        <br><br>
                         
                        {{-- <div class="col">
                            <div class="form-group">
                                <label for="Grade_id"> {{trans('Questions_trans.score')}}  : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="subject_id">
                                    <option selected disabled>حدد {{trans('Questions_trans.score')}} ...</option>
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                </select>
                            </div>
                        </div> --}}
                        <br><br>
                        
                        
                    </div>
                    <br><br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('Quizze_trans.submit') }} </button>

                       
                    
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
