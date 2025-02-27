
@extends('layouts.master')
@section('css')

@section('title')
{{trans('main_trans.profail')}}
@stop
@endsection
@section('page-header')

@endsection
@section('content')
	
<!--  error try-cathe -->
	
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

        <section style="background-color: #eee;">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{URL::asset('assets/images/teacher.png')}}"
                                 alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 style="font-family: Cairo" class="my-3">{{$information->Name_Father}}</h5>
                            <p class="text-muted mb-1">{{$information->email}}</p>
                            <p class="text-muted mb-4">رب أسرة</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{route('profail_update',$information->id)}}" method="post">
                                @csrf
                               
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">اسم المستخدم باللغة العربية</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="name_ar"
                                                   value="{{ $information->getTranslation('Name_Father', 'ar') }}"
                                                   class="form-control">
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">اسم المستخدم باللغة الانجليزية</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="name_en"
                                                   value="{{ $information->getTranslation('Name_Father', 'en') }}"
                                                   class="form-control">
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">كلمة المرور</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="password" id="password" class="form-control" name="password">
                                        </p><br><br>
                                        <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                               id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">اظهار كلمة المرور</label>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-success">تعديل البيانات</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
