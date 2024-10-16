<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{route('dashboard')}}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.welcame')}} {{auth('parint')->user()->Name_Father}} </li>


        <!-- الابناء-->
        <li>
            <a href="{{route('childern.index')}}"><i class="fa fa-users" aria-hidden="true"></i><span
                    class="right-nav-text">الأبناء</span></a>
        </li>

        
         <!-- Attendance الحضور و الغياب-->
         <li>
            <a href="{{route('attendence')}}"><i class="ti-calendar" aria-hidden="true"></i><span
                    class="right-nav-text">{{trans('main_trans.Attendance')}}</span></a>
        </li>

         <!-- rebort_invoices-->
         <li>
            <a href="{{route('student_invoices')}}"><i class="fa fa-users" aria-hidden="true"></i><span
                    class="right-nav-text">{{trans('main_trans.rebort_invoices')}}</span></a>
        </li>

        <!-- Settings-->
        <li>
            <a href="{{route('profail_parint')}}"><i class="fa fa-user"></i><span
                    class="right-nav-text">الملف الشخصي</span></a>
        </li>

    </ul>
</div>