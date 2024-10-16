@extends('layouts.master')
@section('css')

@section('title')
    {{trans('main_trans.List_sections')}}
    
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('main_trans.List_sections')}}</h4>
        </div>   <br><br>
       
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
                {{-- start table --}}
             
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        
                        <th scope="col">{{trans('Students_trans.Grade')}}</th>                     
                        {{-- <th scope="col">{{trans('Students_trans.classrooms')}}</th> --}}
                        <th scope="col">{{trans('Students_trans.section')}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($sections as $section)
                            
                       
                        <td>{{$loop->iteration}}</td>
                        <td>{{$section->Grade->name}}</td>
                        <td>{{$section->section_name}}</td>                                                                                                                      

                    </tr>

                    @endforeach

                </tbody>
            </table>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
