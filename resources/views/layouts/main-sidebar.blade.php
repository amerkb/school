{{--<div class="container-fluid">--}}
{{--    <div class="row">--}}
{{--        <!-- Left Sidebar start-->--}}
{{--        <div class="side-menu-fixed">--}}
{{--            <div class="scrollbar side-menu-bg overflow-auto">--}}
{{--                <!-- Your content here -->--}}

{{--                <ul class="nav navbar-nav side-menu" id="sidebarnav">--}}
{{--                    <!-- menu item Dashboard-->--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('/dashboard') }}">--}}
{{--                            <div class="pull-left"><i class="ti-home"></i><span--}}
{{--                                    class="right-nav-text">{{ 'Dashboard' }}</span>--}}
{{--                            </div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <!-- menu title -->--}}
{{--                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ 'Programname' }} </li>--}}

{{--                    <!-- Grades-->--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">--}}
{{--                            <div class="pull-left"><i class="fas fa-school"></i><span--}}
{{--                                    class="right-nav-text">{{ 'Grades' }}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">--}}
{{--                            <li><a href="{{ route('as') }}">{{ 'Grades list' }}</a></li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <!-- classes-->--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">--}}
{{--                            <div class="pull-left"><i class="fa fa-building"></i><span--}}
{{--                                    class="right-nav-text">{{ 'classes' }}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">--}}
{{--                            <li><a href="{{ route('classindex') }}">{{ 'List classes' }}</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}


{{--                    <!-- sections-->--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">--}}
{{--                            <div class="pull-left"><i class="fas fa-chalkboard"></i></i><span--}}
{{--                                    class="right-nav-text">{{ 'Sections' }}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">--}}
{{--                            <li><a href="{{ route('section') }}">{{ 'List Sections' }}</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}


{{--                    <!-- students-->--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i--}}
{{--                                class="fas fa-user-graduate"></i>{{ 'Students' }}<div class="pull-right"><i--}}
{{--                                    class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="students-menu" class="collapse">--}}
{{--                            <li>--}}
{{--                                <a href="javascript:void(0);" data-toggle="collapse"--}}
{{--                                    data-target="#Student_information">{{ 'Student' }}<div class="pull-right"><i--}}
{{--                                            class="ti-plus"></i></div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </a>--}}
{{--                                <ul id="Student_information" class="collapse">--}}
{{--                                    <li> <a href="{{ route('create') }}">{{ 'Add Student' }}</a></li>--}}
{{--                                    <li> <a href="{{ route('index') }}">{{ 'List Students' }}</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}

{{--                            <li>--}}
{{--                                <a href="javascript:void(0);" data-toggle="collapse"--}}
{{--                                    data-target="#Students_upgrade">{{ 'Students Promotions' }}<div class="pull-right">--}}
{{--                                        <i class="ti-plus"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </a>--}}
{{--                                <ul id="Students_upgrade" class="collapse">--}}
{{--                                    <li> <a href="{{ route('proindex') }}">{{ 'Add Promotion' }}</a></li>--}}
{{--                                    <li> <a href="{{ route('createpro') }}">{{ 'List Promotions' }}</a> </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}

{{--                            <li>--}}
{{--                                <a href="javascript:void(0);" data-toggle="collapse"--}}
{{--                                    data-target="#Graduate students">{{ 'Graduate Students' }}<div class="pull-right">--}}
{{--                                        <i class="ti-plus"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </a>--}}
{{--                                <ul id="Graduate students" class="collapse">--}}
{{--                                    <li> <a href="{{ route('createGra') }}">{{ 'Add Graduate' }}</a> </li>--}}
{{--                                    <li> <a href="{{ route('indexGra') }}">{{ 'List Graduate' }}</a> </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}




{{--                    <!-- Teachers-->--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">--}}
{{--                            <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span--}}
{{--                                    class="right-nav-text">{{ 'Teachers' }}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">--}}
{{--                            <li> <a href="{{ route('teacher') }}">{{ 'List Teachers' }}</a> </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}


{{--                    <!-- Parents-->--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">--}}
{{--                            <div class="pull-left"><i class="fas fa-user-tie"></i><span--}}
{{--                                    class="right-nav-text">{{ 'Parents' }}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">--}}
{{--                            <li> <a href="{{ url('add_parent') }}">{{ 'Add Parents' }}</a> </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <!-- Accounts-->--}}


{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">--}}
{{--                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span--}}
{{--                                    class="right-nav-text">{{ 'Accounts' }}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">--}}
{{--                            <li> <a href="{{ route('indexfee') }}">Study Fees</a> </li>--}}
{{--                            <li> <a href="{{ route('Invoices_index') }}">Invoices</a> </li>--}}
{{--                            <li> <a href="{{ route('Receipt_index') }}">Receipt</a> </li>--}}
{{--                            <li> <a href="{{ route('Process_index') }}">Fee excluded</a> </li>--}}
{{--                            <li> <a href="{{ route('Payment_index') }}">Bills of exchange</a> </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <!-- Attendance-->--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">--}}
{{--                            <div class="pull-left"><i class="fas fa-calendar-alt"></i><span--}}
{{--                                    class="right-nav-text">{{ 'Attendance' }}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">--}}
{{--                            <li> <a href="{{ route('Attendance_index') }}">List of Students</a> </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <!-- Subjects-->--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">--}}
{{--                            <div class="pull-left"><i class="fas fa-book-open"></i><span--}}
{{--                                    class="right-nav-text">Subjects</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">--}}
{{--                            <li> <a href="{{ route('Sub_index') }}">Materials list</a> </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <!-- Quizzes-->--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#A-icon">--}}
{{--                            <div class="pull-left"><i class="fas fa-book-open"></i><span--}}
{{--                                    class="right-nav-text">Quizzes</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="A-icon" class="collapse" data-parent="#sidebarnav">--}}
{{--                            <li> <a href="{{ route('Qui_index') }}">List Quizzes</a> </li>--}}
{{--                            <li> <a href="{{ route('Ques_index') }}">List Questions</a> </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <!-- timetable-->--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#timetable-icon">--}}
{{--                            <div class="pull-left"><i class="fas fa-clock-o"></i><span--}}
{{--                                    class="right-nav-text">{{ 'timetable' }}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="timetable-icon" class="collapse" data-parent="#sidebarnav">--}}
{{--                            <li> <a href="{{ route('time_index') }}">  Add timetables</a> </li>--}}
{{--                            <li> <a href="{{ route('ttr_show') }}">  View timetables</a> </li>--}}
{{--                            <li> <a href="{{ route('ts.index') }}">  View timeSlots</a> </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <!-- library-->--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">--}}
{{--                            <div class="pull-left"><i class="fas fa-book"></i><span--}}
{{--                                    class="right-nav-text">{{ 'library' }}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="library-icon" class="collapse" data-parent="#sidebarnav">--}}
{{--                            <li> <a href="{{ route('Lib_index') }}">Booklist</a> </li>--}}
{{--                            <li> <a href="{{ route('Lib_index') }}">Booklist</a> </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}


{{--                    <!-- Onlinec lasses-->--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">--}}
{{--                            <div class="pull-left"><i class="fas fa-video"></i><span--}}
{{--                                    class="right-nav-text">{{ 'Onlineclasses' }}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">--}}
{{--                            <li> <a href="{{ route('Online_index') }}">الاتصال مباشر مع زوم</a> </li>--}}
{{--                            <li> <a href="themify-icons.html">الاتصال الغير مباشر مع زوم</a> </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--               --}}

{{--                    <!-- Users-->--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">--}}
{{--                            <div class="pull-left"><i class="fas fa-users"></i><span--}}
{{--                                    class="right-nav-text">{{ 'Users' }}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">--}}
{{--                            <li> <a href="{{route(('ori_index'))}}">School Oriented </a> </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                     <!-- Settings-->--}}
{{--                    <li>--}}
{{--                        <a href="{{route('Seting_index')}}"><i class="fas fa-cogs"></i><span--}}
{{--                                class="right-nav-text">{{ 'Settings' }} </span></a>--}}
{{--                    </li>--}}

{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Left Sidebar End-->--}}{{--    {{ \App\Models\Type_User::where(--}}
{{--        "id",auth()->user()->type_id)->pluck("type")[0]}}--}}

{{--        <!--=================================--}}
@php
  $type=  \App\Models\Type_User::where( "id",auth()->user()->type_id)->pluck("type")[0];
@endphp

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ url('/dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
{{--          Grades      --}}
                @if(IsManager($type))
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                    Grades
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('as') }}">Grades list</a>
                    </nav>
                </div>
                @endif
                {{--          Class      --}}
                @if(IsManager($type))
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#Classes" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Classes
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="Classes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('classindex') }}"> classes List</a>
                    </nav>
                </div>
                @endif
                @if(IsManager($type) || IsOriented($type))
                {{--          sections      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#sections" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-chalkboard"></i></div>
                    Sections
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="sections" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('section') }}"> sections List</a>
                    </nav>
                </div>
                @endif
                @if(IsManager($type)|| IsOriented($type))
                    {{--          Bus      --}}
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                       data-bs-target="#Bus" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-bus"></i></div>
                        Bus
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="Bus" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('Bus_create') }}">  Add Bus</a>
                            <a class="nav-link" href="{{ route('Bus_index') }}">  Bus List</a>
                            <a class="nav-link" href="{{ route('ts.index') }}">  View timeSlots</a>
                        </nav>

                    </div>
                @endif
                @if(IsManager($type) || IsOriented($type)|| IsAccountant($type))
                {{--          student      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#student" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Student
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="student" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if(IsManager($type) )
                        <a class="nav-link" href="{{ route('create') }}"> Add Student</a>
                        @endif
                        <a class="nav-link" href="{{ route('index') }}"> students List</a>
                    </nav>
                </div>
                @endif
                @if(IsManager($type)|| IsOriented($type))
                {{--          Promotion      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#Promotion" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                    Promotion
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="Promotion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('proindex') }}"> Add Promotion</a>
                        <a class="nav-link" href="{{ route('createpro') }}"> Promotion List</a>
                    </nav>
                </div>
                @endif
                @if(IsManager($type)|| IsOriented($type))
                {{--          Graduate      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#Graduate" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
                    Graduate
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="Graduate" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('createGra') }}"> Add Graduate</a>
                        <a class="nav-link" href="{{ route('indexGra') }}"> Graduates List</a>
                    </nav>
                </div>
                @endif
                @if(IsManager($type)|| IsOriented($type) ||IsAccountant($type))
                {{--          Teachers      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#Teachers" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    Teachers
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="Teachers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if(IsManager($type) )
                        <a class="nav-link" href="{{ route('createteacher') }}"> Add teacher </a>
                        @endif
                        <a class="nav-link" href="{{ route('teacher') }}"> Teachers List</a>
                    </nav>
                </div>
                @endif

                @if(IsManager($type) || IsOriented($type))
                {{--          Parents      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#Parents" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                    Parents
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="Parents" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('add_parent') }}"> Parents List</a>
{{--                        <a class="nav-link" href=""> Parents List</a>--}}
                    </nav>
                </div>
                @endif
                @if(IsManager($type) ||IsAccountant($type))
                {{--          Accounts      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#Accounts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-money-bill-wave-alt"></i></div>
                    Accounts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="Accounts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('indexfee') }}">Study Fees</a>
                        <a class="nav-link" href="{{ route('Invoices_index') }}">Invoices</a>
                        <a class="nav-link" href="{{ route('Receipt_index') }}">Receipt</a>
                        <a class="nav-link"  href="{{ route('Process_index') }}">Fee excluded</a>
                        <a class="nav-link" href="{{ route('Payment_index') }}">Bills of exchange</a>
                        <a class="nav-link" href="{{ route('reparations_Index') }}">Reparations  </a>
                        <a class="nav-link" href="{{ route('inventory') }}">Inventory  </a>
                    </nav>
                </div>
                @endif
                @if(IsManager($type)|| IsOriented($type))
                {{--          Attendance      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#Attendance" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                    Attendance
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="Attendance" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('Attendance_index') }}">List of Students</a>
                    </nav>
                </div>
                @endif
                @if(IsManager($type) || IsOriented($type))
                {{--          Subjects      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#Subjects" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-book-open"></i></div>
                    Subjects
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="Subjects" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('Sub_create') }}">Add subjects </a>
                        <a class="nav-link" href="{{ route('Sub_index') }}">Subjects list</a>
                    </nav>

                </div>
                @endif
                @if(IsManager($type) || IsOriented($type))
                {{--          Quizzes      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#Quizzes" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-bookmark"></i></div>
                    Exems
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="Quizzes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('Qui_index') }}"> Exem List</a>
{{--                        <a class="nav-link" href="{{ route('Ques_index') }}"> Questions List</a>--}}
                    </nav>

                </div>
                @endif
                @if(IsManager($type)|| IsOriented($type))
                {{--          Result      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#Result" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-archive"></i></div>
                    Results
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="Result" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('Result_index') }}"> Add Result</a>
                    </nav>

                </div>
                @endif
                @if(IsManager($type)|| IsOriented($type))
                {{--          timetable      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#timetable" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                    TimeTable
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="timetable" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('time_index') }}">  Add timetables</a>
                        <a class="nav-link" href="{{ route('ttr_show') }}">  View timetables</a>
                        <a class="nav-link" href="{{ route('ts.index') }}">  View timeSlots</a>
                    </nav>

                </div>
                @endif
                @if(IsManager($type) || IsLibrarian($type))
                {{--          library      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                   data-bs-target="#library" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    library
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="library" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link"  href="{{ route('Lib_index') }}">curriculum list</a>
                        <a class="nav-link"  href="{{ route('book_index') }}">Book list</a>
                        <a class="nav-link"  href="{{ route('Questionli_index') }}">Question list</a>
                    </nav>

                </div>
                @endif
                @if(IsManager($type)|| IsOriented($type))
            {{--          Online      --}}
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
               data-bs-target="#Online" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                Online Classes
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>

            <div class="collapse" id="Online" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link"  href="{{ route('Online_indirectCreate') }}"> Add  online lecture </a>
                    <a class="nav-link"  href="{{ route('Online_index') }}"> List online lecture </a>
                </nav>

            </div>
                @endif
                @if(IsManager($type) ||IsAccountant($type))
        {{--          Users      --}}
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
           data-bs-target="#Users" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
            Users
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        <div class="collapse" id="Users" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
@if(IsManager($type) )
<a  class="nav-link" href="{{route(('ori_create'))}}">Add user</a>
                @endif
<a  class="nav-link" href="{{route(('ori_index'))}}"> User List</a>
</nav>

</div>
@endif
@if(IsManager($type))
{{--          Seeting      --}}
<a class="nav-link " href="{{route('Seting_index')}}"
data-bs-target="#Seeting" aria-expanded="false" aria-controls="collapseLayouts">
 <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i>
 </div>
 Settings
</a>
@endif
</div>
</div>
{{--        <div class="sb-sidenav-footer">--}}
{{--        </div>--}}
</nav>
</div>

