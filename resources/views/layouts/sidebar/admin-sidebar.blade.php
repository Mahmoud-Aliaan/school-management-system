<div class="scrollbar side-menu-bg">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('dashboard')}}"> {{trans('main_trans.home')}}</a> </li>
                
            </ul>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>

        

        <!-- Start Grades-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                <div class="pull-left"><i class="ti-palette"></i><span
                        class="right-nav-text">{{trans('main_trans.Grades')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="elements" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Grades.index')}}">{{trans('main_trans.Grades_list')}}</a></li>
                
            </ul>
        </li>
           <!-- End Grades-->

        <!-- Start CLasses-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                <div class="pull-left"><i class="ti-menu-alt"></i><span
                        class="right-nav-text">{{trans('main_trans.classes')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Classes.index')}}">{{trans('main_trans.List_classes')}}</a> </li>
               
            </ul>
        </li>
        <!-- End CLasses-->

        <!-- Start section -->                
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">
                    {{trans('main_trans.sections')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Form" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('sections.index')}}">{{trans('main_trans.List_sections')}}</a> </li>
                
            </ul>
        </li>
         <!-- End section -->
        {{-- start student --}}
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="fa fa-graduation-cap"></i>{{trans('main_trans.students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
            <ul id="students-menu" class="collapse">
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">{{trans('main_trans.Student_information')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Student_information" class="collapse">
                        <li> <a href="{{route('Students.create')}}">{{trans('main_trans.add_student')}}</a></li>
                        <li> <a href="{{route('Students.index')}}">{{trans('main_trans.students_table')}}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">{{trans('main_trans.students_Promotion')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Students_upgrade" class="collapse">
                        <li> <a href="{{route('Promotions.index')}}">{{trans('main_trans.students_Promotion')}}</a></li>
                        <li> <a href="{{route('Promotions.create')}}">{{trans('main_trans.mangment_Promotion')}}</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Graduate students">{{trans('main_trans.Graduate_students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Graduate students" class="collapse">
                        <li> <a href="{{route('Graduates.create')}}">{{trans('main_trans.add_Graduate')}}</a> </li>
                        <li> <a href="{{route('Graduates.index')}}">{{trans('main_trans.list_Graduate')}}</a> </li>
                    </ul>
                </li>
            </ul>
        </li>
         {{-- end student --}}

          <!-- students-->
        
         <!-- Start parints -->                
         <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                <div class="pull-left"><i class="fa fa-user"></i><span class="right-nav-text">

                        {{trans('main_trans.Parents')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
               
                <li> <a href="{{route('add_parint')}}">{{trans('main_trans.List_Parents')}}</a> </li>
                
            </ul>
        </li>
         <!-- End parints -->

         <!-- Start Teachers-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                <div class="pull-left"><i class="fa fa-user-secret"></i></i><span
                        class="right-nav-text">{{trans('main_trans.Teachers')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="chart" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Teachers.index')}}">{{trans('main_trans.List_Teachers')}}</a></li>
                
            </ul>
        </li>
        <!-- End Teachers-->

         <!-- Start the Accounts-->
         <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts">
                <div class="pull-left"><i class="fa fa-money"></i></i><span
                        class="right-nav-text">{{trans('main_trans.the_Accounts')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Accounts" class="collapse" data-parent="#sidebarnav"> 
                <li> <a href="{{route('Accounts.index')}}">{{trans('main_trans.study_fees')}}</a></li>
                <li> <a href="{{route('Fees_invoices.index')}}">{{trans('main_trans.fees_invoices')}}</a></li>
                <li> <a href="{{route('ProcessingFees.index')}}">{{trans('main_trans.fees_process')}}</a></li>

            </ul>
        </li>
        <!-- End the Accounts-->

        {{-- start attendance --}}
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendance">
                <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">
                        {{trans('main_trans.Attendance')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="attendance" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Attendance.index')}}">  {{trans('main_trans.students_table')}}</a> </li>
               
            </ul>
        </li>
        {{-- end attendance --}}

          {{-- start Subject --}}
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subject">
                <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">
                        {{trans('main_trans.Subject')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Subject" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Subjects.index')}}">  {{trans('main_trans.Subject')}}</a> </li>
               
            </ul>
        </li>
        {{-- end Subject --}}

         {{-- start Exams --}}
         <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Quizze">
                <div class="pull-left"><i class="ti-panel"></i><span class="right-nav-text">
                        {{trans('main_trans.Quizzes')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Quizze" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Quizzes.index')}}">  {{trans('main_trans.Quizze_list')}}</a> </li>
                <li> <a href="{{route('Questions.index')}}">  {{trans('main_trans.Question_list')}}</a> </li>
            </ul>
        </li>
        {{-- end Exams --}}
        

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

         {{-- start library --}}
         <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#library">
                <div class="pull-left"><i class="fa fa-address-book-o"></i><span class="right-nav-text">
                        {{trans('main_trans.library')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="library" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('libararys.index')}}">  {{trans('main_trans.library_list')}}</a> </li>

            </ul>
        </li>
        {{-- end library --}}

        {{-- start settings --}}
        <li> <a href="{{route('settings.index')}}">  {{trans('main_trans.Settings')}}</a> </li>
        {{-- start settings --}}

        <!-- menu item todo-->

        <li>
            <a href="todo-list.html"><i class="ti-calendar"></i><span class="right-nav-text">Todo
                    list</span> </a>
        </li>
        <!-- menu item chat-->
        <li>
            <a href="chat-page.html"><i class="ti-comments"></i><span class="right-nav-text">Chat
                </span></a>
        </li>
        <!-- menu item mailbox-->
        <li>
            <a href="mail-box.html"><i class="ti-email"></i><span class="right-nav-text">Mail
                    box</span> <span class="badge badge-pill badge-warning float-right mt-1">HOT</span> </a>
        </li>
        <!-- menu item Charts-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                <div class="pull-left"><i class="ti-pie-chart"></i><span
                        class="right-nav-text">Charts</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="chart" class="collapse" data-parent="#sidebarnav">
                <li> <a href="chart-js.html">Chart.js</a> </li>
                <li> <a href="chart-morris.html">Chart morris </a> </li>
                <li> <a href="chart-sparkline.html">Chart Sparkline</a> </li>
            </ul>
        </li>

        <!-- menu font icon-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">font
                        icon</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                <li> <a href="themify-icons.html">Themify icons</a> </li>
                <li> <a href="weather-icon.html">Weather icons</a> </li>
            </ul>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Widgets, Forms & Tables </li>
        <!-- menu item Widgets-->
        <li>
            <a href="widgets.html"><i class="ti-blackboard"></i><span class="right-nav-text">Widgets</span>
                <span class="badge badge-pill badge-danger float-right mt-1">59</span> </a>
        </li>
        <!-- menu item Form-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Form &
                        Editor</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Form" class="collapse" data-parent="#sidebarnav">
                <li> <a href="editor.html">Editor</a> </li>
                <li> <a href="editor-markdown.html">Editor Markdown</a> </li>
                <li> <a href="form-input.html">Form input</a> </li>
                <li> <a href="form-validation-jquery.html">form validation jquery</a> </li>
                <li> <a href="form-wizard.html">form wizard</a> </li>
                <li> <a href="form-repeater.html">form repeater</a> </li>
                <li> <a href="input-group.html">input group</a> </li>
                <li> <a href="toastr.html">toastr</a> </li>
            </ul>
        </li>
        <!-- menu item table -->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">data
                        table</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="table" class="collapse" data-parent="#sidebarnav">
                <li> <a href="data-html-table.html">Data html table</a> </li>
                <li> <a href="data-local.html">Data local</a> </li>
                <li> <a href="data-table.html">Data table</a> </li>
            </ul>
        </li>
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">More Pages</li>
        <!-- menu item Custom pages-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                <div class="pull-left"><i class="ti-file"></i><span class="right-nav-text">Custom
                        pages</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                <li> <a href="projects.html">projects</a> </li>
                <li> <a href="project-summary.html">Projects summary</a> </li>
                <li> <a href="profile.html">profile</a> </li>
                <li> <a href="app-contacts.html">App contacts</a> </li>
                <li> <a href="contacts.html">Contacts</a> </li>
                <li> <a href="file-manager.html">file manager</a> </li>
                <li> <a href="invoice.html">Invoice</a> </li>
                <li> <a href="blank.html">Blank page</a> </li>
                <li> <a href="layout-container.html">layout container</a> </li>
                <li> <a href="error.html">Error</a> </li>
                <li> <a href="faqs.html">faqs</a> </li>
            </ul>
        </li>
        <!-- menu item Authentication-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                <div class="pull-left"><i class="ti-id-badge"></i><span
                        class="right-nav-text">Authentication</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                <li> <a href="login.html">login</a> </li>
                <li> <a href="register.html">register</a> </li>
                <li> <a href="lockscreen.html">Lock screen</a> </li>
            </ul>
        </li>
        <!-- menu item maps-->
        <li>
            <a href="maps.html"><i class="ti-location-pin"></i><span class="right-nav-text">maps</span>
                <span class="badge badge-pill badge-success float-right mt-1">06</span></a>
        </li>
        <!-- menu item timeline-->
        <li>
            <a href="timeline.html"><i class="ti-panel"></i><span class="right-nav-text">timeline</span>
            </a>
        </li>
        <!-- menu item Multi level-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">Multi
                        level Menu</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">Level
                        item 1<div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="auth" class="collapse">
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#login">Level
                                item 1.1<div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="login" class="collapse">
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse"
                                        data-target="#invoice">level item 1.1.1<div class="pull-right"><i
                                                class="ti-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="invoice" class="collapse">
                                        <li> <a href="#">level item 1.1.1.1</a> </li>
                                        <li> <a href="#">level item 1.1.1.2</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li> <a href="#">level item 1.2</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">level
                        item 2<div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="error" class="collapse">
                        <li> <a href="#">level item 2.1</a> </li>
                        <li> <a href="#">level item 2.2</a> </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>