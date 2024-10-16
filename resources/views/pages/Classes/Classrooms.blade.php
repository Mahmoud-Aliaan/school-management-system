@extends('layouts.master')
@section('css')

@section('title')
   {{ trans('main_trans.classes') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('Class_trans.List_classes') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.classes') }}</li>
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
                
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                   {{trans('Class_trans.add_class')}}
                </button>

                <button type="button" class="button x-small" id="btn_delete_all">
                    {{ trans('Class_trans.delete_checkbox') }}
                </button>
                <br><br>
                
                 {{--  START FOrm Select serch --}} 
                 <form action="{{route('search_Grades')}}" method="post">
                        
                    {{ csrf_field() }}
                     <select class="form-control" data-style="btn-info" name="Grade_id"  required
                       onchange="this.form.submit()" >
                        <option value="" selected disabled>{{trans('Class_trans.Search_By_Grade')}}</option>
                        @foreach($Grades as $Grade)
                        
                        <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                        @endforeach
                      </select>
                </form>
                <br>
              {{--  END FOrm Select serch --}}

                 {{-- START TABLE --}}

                 <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            {{-- <th><input name="select_all" class="form-select_all" type="checkbox"  onclick="CheckAll('box1', this)" id="flexCheckDefault"></th> --}}
                            <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                            <th scope="col">{{trans('Class_trans.Name_class')}}</th>
                            <th scope="col">{{trans('Class_trans.Name_Grade')}}</th>
                            <th scope="col">{{trans('Class_trans.Processes')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($details))
                           <?php  $List_Classes= $details ?>
                        
                        @else
                            <?php $List_Classes= $Classes ?>
                        
                            
                        @endif
                        <?php $i=0 ?>
                        @foreach($List_Classes as $Class)
                        <tr>
                            <?php $i++ ?>
                            <th scope="row">{{$i}}</th>
                            <td><input class="box1" type="checkbox" value="{{$Class->id}}" ></td>
                            <td>{{$Class->Class_name}}</td>
                            <td>{{$Class->Borger->name}}</td>
                            <td>
                                {{-- start btn  Delet & Edite --}}
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$Class->id}}">
                                    {{trans('Class_trans.Edit')}}
                                </button>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$Class->id}}">
                                    {{trans('Class_trans.Delete')}}
                                </button>
                                {{-- start btn  Delet & Edite --}}
                            </td>
                            <!-- START MODAL Edit GRADE -->
                                <div class="modal fade" id="edit{{$Class->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    {{ trans('Class_trans.edit_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{route('Classes.update','test')}}" method="POST">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">{{ trans('Class_trans.Name_class') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="Name" class="form-control" value="{{ $Class->getTranslation('Class_name', 'ar') }}" >
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $Class->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">{{ trans('Class_trans.Name_class_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control" name="Name_en" value="{{ $Class->getTranslation('Class_name', 'en') }}">
                                                        </div>
                                                    </div>
                                                    
                                                    <br><br>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('Class_trans.Name_Grade') }}
                                                            :</label>
                                                        <select class="form-control form-control-lg"
                                                                id="exampleFormControlSelect1" name="Grade_id">
                                                            <option value="{{ $Class->Borger->id }}">
                                                                {{ $Class->Borger->name }}
                                                            </option>
                                                            @foreach ($Grades as $Grade)
                                                                <option value="{{ $Grade->id }}">
                                                                    {{ $Grade->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
    
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('Class_trans.Close') }}</button>
                                                <button type="submit" class="btn btn-success">{{ trans('Class_trans.submit') }}</button>
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            {{-- END  MODAL Edit Class --}}

                             <!-- START MODAL Delete Class -->
                             <div class="modal fade" id="delete{{$Class->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                {{ trans('Class_trans.delete_class') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{route('Classes.destroy','test')}}" method="POST">
                                                {{ method_field('Delete') }}
                                                @csrf       
                                                {{ trans('Class_trans.Warning_class') }}                                            
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $Class->id }}">                                                                                                          
                                               
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">{{ trans('Class_trans.Close') }}</button>
                                            <button type="submit" class="btn btn-danger">{{ trans('Class_trans.Delete') }}</button>
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

              <!-- Start add_modal_class -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                    {{ trans('Class_trans.add_class') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form class=" row mb-30" action="{{ route('Classes.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="repeater">
                                            <div data-repeater-list="List_Classes">
                                                <div data-repeater-item>
                                                    <div class="row">

                                                        <div class="col">
                                                            <label for="Name"
                                                                class="mr-sm-2">{{ trans('Class_trans.Name_class') }}
                                                                :</label>
                                                            <input class="form-control" type="text" name="Name" />
                                                        </div>


                                                        <div class="col">
                                                            <label for="Name"
                                                                class="mr-sm-2">{{ trans('Class_trans.Name_class_en') }}
                                                                :</label>
                                                            <input class="form-control" type="text" name="name_class_en" />
                                                        </div>


                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2">{{ trans('Class_trans.Name_Grade') }}
                                                                :</label>

                                                            <div class="box">
                                                                <select class="fancyselect" name="Grade_id">
                                                                    @foreach ($Grades as $Grade)
                                                                        <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                                                    @endforeach
                                                                </select>
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

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('Class_trans.Close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-success">{{ trans('Class_trans.submit') }}</button>
                                            </div>


                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>

                    </div>

                    </div>
                
              {{--  End add_modal_class  --}}

               <!-- START Delete_All_CheckBoox-->
               <div class="modal fade" id="delete_all" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                               id="exampleModalLabel">
                               {{ trans('Classes_trans.Delete') }}
                           </h5>
                           <button type="button" class="close" data-dismiss="modal"
                                   aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <form action="" method="post">
                               {{method_field('Delete')}}
                               @csrf
                               {{ trans('Classes_trans.Warning_class_delete_all_row') }} 
                                   
                               <input id="delete_all_id" type="hidden" name="delete_all_id" class="form-control"
                                       value="">
                {{-- this value is Ebmty becuse value defult add script  selected --}}
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary"
                                           data-dismiss="modal">{{ trans('Classes_trans.Close') }}</button>
                                   <button type="submit"
                                           class="btn btn-danger">{{ trans('Classes_trans.submit') }}</button>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
                </div>   
                <!--END Delete Delete_All_CheckBoox -->

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')



{{-- Start Show model _ Delete_all --}}
<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });

</script>
{{-- End Show model _ Delete_all --}}

@endsection
