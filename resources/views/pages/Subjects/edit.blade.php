@extends('layouts.master')
@section('css')

@section('title')
{{trans('Subjects_trans.edit_subject')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('Subjects_trans.edit_subject')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
  <!--  error try-cathe -->
@endsection
@section('content')
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
              
	


                {{-- add Form --}}
                <form action="{{route('Subjects.update','test')}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Subjects_trans.Subject_name_ar') }}
                                :</label>
                                <input  type="hidden" name="id" class="form-control" value="{{$Supject->id}}">
                            <input  type="text" name="Name" class="form-control" value="{{$Supject->getTranslation('name', 'ar')}}">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('Subjects_trans.Subject_name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="Name_en" value="{{$Supject->getTranslation('name', 'en')}}">
                        </div>
                    </div>
                    <br>
                    {{--  START FOrm Select serch  --}}
                    <div class="row">
                        <div class="col">
                            <label for="inputName" class="control-label">
                                {{ trans('Section_trans.Grades_name')}}
                            </label>

                            <select class="custom-select" data-style="btn-info" name="Grade_id"  required
                            onchange="console.log($(this).val())"> 
                                <option value="" selected disabled>{{trans('Section_trans.select_Grade')}} </option>
                                @foreach($Grades as $Grade)
                                
                                <option value="{{$Grade->id}}" {{$Grade->id == $Supject->Grade_id ? 'selected' : ''}}> {{$Grade->name}}</option>
                                @endforeach
                            </select>
                            

                        </div>
                        <br><br>
                        {{--  START FOrm return data serch  --}}
                        <div class="col">
                            <label for="inputName" class="control-label">
                                {{trans('Section_trans.Class_name')}}
                            </label>

                            <select class="form-control" data-style="btn-info" name="Class_id"  required>
                                {{-- <option  value="{{ $Supject->classroom->id }}">{{ $Supject->classroom->Class_name }}   </option> --}}
                               
                                
                            </select>
                            

                        </div>
                    </div>
                    {{--  END FOrm Select serch  --}}
                    <br><br>
                    <div class="row">
                        <div class="col">
                            <label for="inputName" class="control-label">
                                {{trans('Section_trans.select_teacher')}}
                            </label>

                            <select class="custom-select"  multiple name="teacher_id" data-style="btn-info" name="Grade_id"  required > 
                                <option value="" selected disabled>{{trans('Section_trans.teacher_name')}} </option>
                                @foreach($Teachers as $Teacher)
                                
                                <option value="{{$Teacher->id}}" {{$Teacher->id ==  $Supject->teacher_id ? 'selected' : ""}}>{{$Teacher->Name}}</option>
                                @endforeach
                            </select>
                            

                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('Section_trans.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('Section_trans.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    // foucas blese becuse reel man mahmud this esye Coude
    
    $(document).ready(function () {
        $('select[name="Grade_id"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Class_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

</script>
@endsection
