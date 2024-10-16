<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
          
 
            @if (auth('web')->check())
            @include('layouts.sidebar.admin-sidebar')
            @endif
           
            @if (auth('student')->check())
            @include('layouts.sidebar.student-sidebar')
            @endif
            @if (auth('teacher')->check()) 
            @include('layouts.sidebar.teacher-sidebar')
            @endif
            @if (auth('parint')->check()) 
            @include('layouts.sidebar.parint-sidebar')
            @endif
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
