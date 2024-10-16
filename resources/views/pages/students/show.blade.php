@extends('layouts.master')
@section('css')

@section('title')
 {{trans('Students_trans.student_detalse')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('Students_trans.student_detalse')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('main_trans.Dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{trans('main_trans.students_table')}}</li>
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
                <div class="tab nav-border" style="position: relative;">
                    <div class="d-block d-md-flex justify-content-between">
                       
                        <div class="d-block w-100 nav-tabs-custom">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="months-tab" data-toggle="tab"
                                        href="#months" role="tab" aria-controls="months"
                                        aria-selected="true"> {{trans('Students_trans.student_detalse')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="year-tab" data-toggle="tab" href="#year"
                                        role="tab" aria-controls="year" aria-selected="false">
                                        {{trans('Students_trans.Attachments')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br><br>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="months" role="tabpanel"
                            aria-labelledby="months-tab">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>{{trans('Students_trans.name')}}</th>
                                        <td>{{$student->name}}</td>
                                        <th>{{trans('Students_trans.email')}}</th>
                                        <td>{{$student->email}}</td>
                                        <th>{{trans('Students_trans.gender')}}</th>
                                        <td>{{$student->gender->Name}}</td>
                                        <th>{{trans('Students_trans.Nationality')}}</th>
                                        <td>{{$student->Nationalitie->Name}}</td>
                                        

                                    </tr>
                                    <tr>
                                        <th>{{trans('Students_trans.Grade')}}</th>
                                        <td>{{$student->Grade->name}}</td>
                                        <th>{{trans('Students_trans.classrooms')}}</th>
                                        <td>{{$student->classroom->Class_name}}</td>
                                        <th>{{trans('Students_trans.section')}}</th>
                                        <td>{{$student->section->section_name}}</td>
                                        <th>{{trans('Students_trans.Date_of_Birth')}}</th>
                                        <td>{{$student->Date_Birth}}</td>
                                    </tr>

                                    <tr>
                                        <th>{{trans('Students_trans.parent')}}</th>
                                        <td>{{$student->My_parint->Name_Father}}</td>
                                        <th>{{trans('Students_trans.academic_year')}}</th>
                                        <td>{{$student->academic_year}}</td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="year-tab">
                            {{-- start add images --}}
                            <div class="card-body">
                                <form method="post" action="{{route('Upload_attachment')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label
                                                for="academic_year">{{trans('Students_trans.Attachments')}}
                                                : <span class="text-danger">*</span></label>
                                            <input type="file" accept="image/*" name="photos[]" multiple required>
                                            <input type="hidden" name="student_name" value="{{$student->name}}">
                                            <input type="hidden" name="student_id" value="{{$student->id}}">
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="button button-border x-small">
                                        {{trans('Students_trans.submit')}}
                                    </button>
                                </form>
                            </div>
                        {{-- end add images --}}
                            <br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('Students_trans.Attachments_name')}}</th>
                                        <th>{{trans('Students_trans.created_at')}}</th>
                                        <th>{{trans('Students_trans.processes')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($student->images as $Attachment)
                                    
                                    <tr>
                                        
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$Attachment->file_Name}}</td>
                                        <td>{{$Attachment->created_at->diffForHumans()}}</td>
                                        <td> 
                                            <td colspan="2">
                                                <a class="btn btn-outline-info btn-sm"
                                                   href="{{url('Download_attachment')}}/{{ $Attachment->imageable->name }}/{{$Attachment->file_Name}}"
                                                   role="button"><i class="fa fa-download"></i>&nbsp; {{trans('Students_trans.Download')}}</a>

                                                 <button type="button" class="btn btn-outline-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_img{{ $Attachment->id }}"
                                                        title="{{ trans('Grades_trans.Delete') }}">{{trans('Students_trans.delete')}}
                                                </button>

                                            </td>
                                        </td>
                                    </tr>
                                    @include('pages\students\delete_imag')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
