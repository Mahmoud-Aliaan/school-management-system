@extends('layouts.master')
@section('css')

@section('title')

   {{trans('Grade_trans.Grades')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            
            <button type="button" class="button x-small" data-toggle="modal" data-target="#add_Grade">
                {{trans('Grade_trans.add_Grade')}}
            </button>
            <br><br>
            
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
@endsection
@section('content')
<!-- row -->
<div class="row">
{{-- error message --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                {{-- START TABLE --}}

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{trans('Grade_trans.Grade_name')}}</th>
                                <th scope="col">{{trans('Grade_trans.Notes')}}</th>
                                <th scope="col">{{trans('Grade_trans.processes')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0 ?>
                            @foreach($Grades as $Grade)
                            <tr>
                                <?php $i++ ?>
                                <th scope="row">{{$i}}</th>
                                <td>{{$Grade->name}}</td>
                                <td>{{$Grade->notes}}</td>
                                <td>
                                    {{-- start btn  Delet & Edite --}}
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$Grade->id}}">
                                        {{trans('Grade_trans.edite')}}
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$Grade->id}}">
                                        {{trans('Grade_trans.delete')}}
                                    </button>
                                    {{-- start btn  Delet & Edite --}}
                                </td>
                                <!-- START MODAL Edit GRADE -->
                                    <div class="modal fade" id="edit{{$Grade->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                        {{ trans('Grade_trans.edit_Grade') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- edit_form -->
                                                    <form action="{{ route('Grades.update','test') }}" method="POST">
                                                        {{ method_field('patch') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="Name" class="mr-sm-2">{{ trans('Grade_trans.stage_name_ar') }}
                                                                    :</label>
                                                                <input id="Name" type="text" name="Name" class="form-control" value="{{ $Grade->getTranslation('name', 'ar') }}" >
                                                                <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $Grade->id }}">
                                                            </div>
                                                            <div class="col">
                                                                <label for="Name_en" class="mr-sm-2">{{ trans('Grade_trans.stage_name_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control" name="Name_en" value="{{ $Grade->getTranslation('name', 'en') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">{{ trans('Grade_trans.Notes') }}
                                                                :</label>
                                                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                                                rows="3" >{{$Grade->notes}}</textarea>
                                                        </div>
                                                        <br><br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Grade_trans.Close') }}</button>
                                                    <button type="submit" class="btn btn-success">{{ trans('Grade_trans.submit') }}</button>
                                                </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                {{-- END  MODAL Edit GRADE --}}

                                 <!-- START MODAL Delete GRADE -->
                                 <div class="modal fade" id="delete{{$Grade->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    {{ trans('Grade_trans.delete_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ route('Grades.destroy','test') }}" method="POST">
                                                    {{ method_field('Delete') }}
                                                    @csrf       
                                                    {{ trans('Grade_trans.warning_Grade') }}                                            
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $Grade->id }}">                                                                                                          
                                                   
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('Grade_trans.Close') }}</button>
                                                <button type="submit" class="btn btn-success">{{ trans('Grade_trans.submit') }}</button>
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            {{-- END  MODAL Edit GRADE --}}
                                @endforeach
                            </tr>
                       
                        </tbody>
                  </table>
                  {{-- END TABLE --}}
            </div>
        </div>
    </div>
    <!-- START MODAL Add GRADE -->
    <div class="modal fade" id="add_Grade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('Grade_trans.add_Grade') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('Grades.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">{{ trans('Grade_trans.stage_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="Name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">{{ trans('Grade_trans.stage_name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="Name_en">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ trans('Grade_trans.Notes') }}
                                :</label>
                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>
                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('Grade_trans.Close') }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('Grade_trans.submit') }}</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    {{-- END  MODAL GRADE --}}

    
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
