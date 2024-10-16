<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/teacher/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.welcame')}} {{auth('teacher')->user()->Name}} </li>

        <!-- الامتحانات-->
        <li>
            <a href="{{route('student-dashbord.index')}}"><i class="fa fa-graduation-cap"></i><span
                    class="right-nav-text">الطلاب</span></a>
        </li>

        {{-- التقارير --}}
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#reborts">
                <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">
                        {{trans('main_trans.reborts')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="reborts" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('reborts')}}"> {{trans('main_trans.Attendance_reborts')}}</a> </li>
               
            </ul>
        </li>

        <!-- الاختبارات-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Quizzes">
                <div class="pull-left"> <i class="ti-panel"></i><span class="right-nav-text">
                        {{trans('main_trans.Quizzes')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Quizzes" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Quezzies.index')}}"> {{trans('main_trans.Quizze_list')}}</a> </li>
                <li> <a href=""> {{trans('main_trans.Question_list')}}</a> </li>
               
            </ul>
        </li>
       
         {{-- start online_classe --}}
         <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#online_classe">
                <div class="pull-left"><i class="fa fa-video-camera"></i><span class="right-nav-text">
                        {{trans('main_trans.online_classe')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="online_classe" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('online_classe.index')}}">  {{trans('main_trans.conect_zoom')}}</a> </li>

            </ul>
        </li>
        {{-- end online_classe --}}
        
        <!-- Settings-->
        <li>
            <a href="{{route('profail.index')}}"><i class="fa fa-address-book-o"></i><span
                    class="right-nav-text">{{trans('main_trans.profail')}} </span></a>
        </li>

    </ul>
</div>