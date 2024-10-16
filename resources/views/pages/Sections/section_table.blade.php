@extends('layouts.master')
@section('css')

@section('title')
{{ trans('main_trans.sections') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.List_sections') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.sections') }}</li>
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
           {{-- botton add --}}
           <button type="button" class="button x-small" data-toggle="modal" data-target="#add_section">
            {{trans('Section_trans.add_section')}}
        </button>
        <br><br>
            
           <div class="accordion gray plus-icon ">
            @foreach ($Grades as $Grade)
              <div class="acd-group">
                  <a href="#" class="acd-heading">{{$Grade->name}}</a>
                  <div class="acd-des">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('Section_trans.section_name')}}</th>
                                <th>{{trans('Section_trans.Class_name')}}</th>
                                <th>{{trans('Section_trans.Grades_name')}}</th>
                                <th>{{trans('Section_trans.processes')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php $i=0?>    
                            @foreach ($Grade->sections as $list_Section)
                            <tr>
                              <?php $i++ ?>
                                <td>{{$i}}</td>
                                <td>{{ $list_Section->section_name }}</td>
                                <td>{{ $list_Section->My_classs->Class_name }}</td>
                                <td>
                                    @if ($list_Section->Status === 1)
                                    <label
                                        class="badge badge-success">{{ trans('Section_trans.Status_Section_AC') }}</label>
                                @else
                                    <label
                                        class="badge badge-danger">{{ trans('Section_trans.Status_Section_No') }}</label>
                                @endif
                                </td>
                                
                                <td>
                                    <a href="#"
                                    class="btn btn-outline-info btn-sm"
                                    data-toggle="modal"
                                    data-target="#edit{{ $list_Section->id }}">{{ trans('Section_trans.edite') }}</a>
                                 <a href="#"
                                    class="btn btn-outline-danger btn-sm"
                                    data-toggle="modal"
                                    data-target="#delete{{ $list_Section->id }}">{{ trans('Section_trans.delete') }}</a>

                                </td>
                            </tr>
                            
                            <!--تعديل قسم جديد -->
                            <div class="modal fade"
                                    id="edit{{ $list_Section->id }}"
                                    tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                style="font-family: 'Cairo', sans-serif;"
                                                id="exampleModalLabel">
                                                {{ trans('Section_trans.edit_section') }}
                                            </h5>
                                            <button type="button" class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close">
                                            <span
                                                aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form
                                                action="{{ route('sections.update', 'test') }}"
                                                method="POST">
                                                {{ method_field('patch') }}
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text"
                                                                name="Name"
                                                                class="form-control"
                                                                value="{{ $list_Section->getTranslation('section_name', 'ar') }}">
                                                    </div>

                                                    <div class="col">
                                                        <input type="text"
                                                                name="Name_en"
                                                                class="form-control"
                                                                value="{{ $list_Section->getTranslation('section_name', 'en') }}">
                                                        <input id="id"
                                                                type="hidden"
                                                                name="id"
                                                                class="form-control"
                                                                value="{{ $list_Section->id }}">
                                                    </div>

                                                </div>
                                                <br>


                                                <div class="col">
                                                    <label for="inputName"
                                                            class="control-label">{{ trans('Section_trans.Grades_name') }}</label>
                                                    <select name="Grade_id"
                                                            class="custom-select"
                                                            onclick="console.log($(this).val())">
                                                        <!--placeholder-->
                                                        <option
                                                            value="{{ $Grade->id }}">
                                                            {{ $Grade->name }}
                                                        </option>
                                                        @foreach ($list_Grades as $list_Grade)
                                                            <option
                                                                value="{{ $list_Grade->id }}">
                                                                {{ $list_Grade->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <br>

                                                <div class="col">
                                                    <label for="inputName"
                                                            class="control-label">{{ trans('Section_trans.Class_name') }}</label>
                                                    <select name="Class_id"
                                                            class="custom-select">
                                                        <option
                                                            value="{{ $list_Section->My_classs->id }}">
                                                            {{ $list_Section->My_classs->Class_name }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <br>

                                                <div class="col">
                                                    <div class="form-check">

                                                        @if ($list_Section->Status === 1)
                                                            <input
                                                                type="checkbox"
                                                                checked
                                                                class="form-check-input"
                                                                name="Status"
                                                                id="exampleCheck1">
                                                        @else
                                                            <input
                                                                type="checkbox"
                                                                class="form-check-input"
                                                                name="Status"
                                                                id="exampleCheck1">
                                                        @endif
                                                        <label
                                                            class="form-check-label"
                                                            for="exampleCheck1">{{ trans('Section_trans.Status') }}</label><br>

                                                            <div class="col">
                                                                <label for="inputName" class="control-label">{{ trans('Section_trans.Name_Teacher') }}</label>
                                                                <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                                    @foreach($list_Section->teachers as $teacher)
                                                                        <option selected value="{{$teacher['id']}}">{{$teacher['Name']}}</option>
                                                                    @endforeach

                                                                    @foreach($Teachers as $teacher)
                                                                        <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                    </div>
                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('Section_trans.Close') }}</button>
                                            <button type="submit"
                                                    class="btn btn-info">{{ trans('Section_trans.submit') }}</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                          
                             <!-- delete_modal_Grade -->
                         <div class="modal fade"
                             id="delete{{ $list_Section->id }}"
                             tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                            class="modal-title"
                                            id="exampleModalLabel">
                                            {{ trans('Section_trans.delete_section') }}
                                        </h5>
                                        <button type="button" class="close"
                                                data-dismiss="modal"
                                                aria-label="Close">
                                        <span
                                            aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('sections.destroy', 'test') }}"
                                            method="post">
                                            {{ method_field('Delete') }}
                                            @csrf
                                            {{ trans('Section_trans.warning_section') }}
                                            <input id="id" type="hidden"
                                                   name="id"
                                                   class="form-control"
                                                   value="{{ $list_Section->id }}">
                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Section_trans.Close') }}</button>
                                                <button type="submit"
                                                        class="btn btn-danger">{{ trans('Section_trans.submit') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                            @endforeach
                        </tbody>
                    </table>
                  </div>
              </div>
              
              
              @endforeach 
          </div>
          </div>
        </div>   
      </div>
    
</div>
<!-- row closed -->

<!-- START MODAL  GRADE -->
    <div class="modal fade" id="add_section" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Section_trans.add_section') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('sections.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Section_trans.section_name_ar') }}
                                :</label>
                            <input id="Name" type="text" name="Name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('Section_trans.section_name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="Name_en">
                        </div>
                    </div>
                    <br>
                    {{--  START FOrm Select serch  --}}
                    <div class="col">
                        <label for="inputName" class="control-label">
                            {{trans('Section_trans.Grades_name')}}
                        </label>

                        <select class="custom-select" data-style="btn-info" name="Grade_id"  required
                        onchange="console.log($(this).val())"> 
                            <option value="" selected disabled>{{trans('Section_trans.select_Grade')}} </option>
                            @foreach($list_Grades as $item)
                            
                            <option value="{{$item->id}}">{{$item->name}}</option>
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
                            <option value="" selected disabled> </option>
                            
                        </select>
                        

                    </div>
                    {{--  END FOrm Select serch --}}
                    <br><br>
                    <div class="col">
                        <label for="inputName" class="control-label">
                            {{trans('Section_trans.select_teacher')}}
                        </label>

                        <select class="custom-select"  multiple name="teacher_id[]" data-style="btn-info" name="Grade_id"  required > 
                            <option value="" selected disabled>{{trans('Section_trans.teacher_name')}} </option>
                            @foreach($Teachers as $Teacher)
                            
                            <option value="{{$Teacher->id}}">{{$Teacher->Name}}</option>
                            @endforeach
                        </select>
                        

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
{{-- END  MODAL GRADE --}}

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
