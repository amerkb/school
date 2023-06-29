<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg overflow-auto">
                <!-- Your content here -->

                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ url('/dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ 'Dashboard' }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ 'Programname' }} </li>

                    <!-- Grades-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">{{ 'Grades' }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('as') }}">{{ 'Grades list' }}</a></li>

                        </ul>
                    </li>
                    <!-- classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{ 'classes' }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('classindex') }}">{{ 'List classes' }}</a></li>
                        </ul>
                    </li>


                    <!-- sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard"></i></i><span
                                    class="right-nav-text">{{ 'Sections' }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('section') }}">{{ 'List Sections' }}</a></li>
                        </ul>
                    </li>


                    <!-- students-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i
                                class="fas fa-user-graduate"></i>{{ 'Students' }}<div class="pull-right"><i
                                    class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students-menu" class="collapse">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#Student_information">{{ 'Student' }}<div class="pull-right"><i
                                            class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Student_information" class="collapse">
                                    <li> <a href="{{ route('create') }}">{{ 'Add Student' }}</a></li>
                                    <li> <a href="{{ route('index') }}">{{ 'List Students' }}</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#Students_upgrade">{{ 'Students Promotions' }}<div class="pull-right">
                                        <i class="ti-plus"></i>
                                    </div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Students_upgrade" class="collapse">
                                    <li> <a href="{{ route('proindex') }}">{{ 'Add Promotion' }}</a></li>
                                    <li> <a href="{{ route('createpro') }}">{{ 'List Promotions' }}</a> </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#Graduate students">{{ 'Graduate Students' }}<div class="pull-right">
                                        <i class="ti-plus"></i>
                                    </div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Graduate students" class="collapse">
                                    <li> <a href="{{ route('createGra') }}">{{ 'Add Graduate' }}</a> </li>
                                    <li> <a href="{{ route('indexGra') }}">{{ 'List Graduate' }}</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>




                    <!-- Teachers-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span
                                    class="right-nav-text">{{ 'Teachers' }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('teacher') }}">{{ 'List Teachers' }}</a> </li>
                        </ul>
                    </li>


                    <!-- Parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                            <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                    class="right-nav-text">{{ 'Parents' }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('add_parent') }}">{{ 'Add Parents' }}</a> </li>
                        </ul>
                    </li>

                    <!-- Accounts-->


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">{{ 'Accounts' }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('indexfee') }}">Study Fees</a> </li>
                            <li> <a href="{{ route('Invoices_index') }}">Invoices</a> </li>
                            <li> <a href="{{ route('Receipt_index') }}">Receipt</a> </li>
                            <li> <a href="{{ route('Process_index') }}">Fee excluded</a> </li>
                            <li> <a href="{{ route('Payment_index') }}">Bills of exchange</a> </li>

                        </ul>
                    </li>

                    <!-- Attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                            <div class="pull-left"><i class="fas fa-calendar-alt"></i><span
                                    class="right-nav-text">{{ 'Attendance' }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('Attendance_index') }}">List of Students</a> </li>
                        </ul>
                    </li>
                    <!-- Subjects-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                    class="right-nav-text">Subjects</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('Sub_index') }}">Materials list</a> </li>
                        </ul>
                    </li>
                    <!-- Quizzes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#A-icon">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                    class="right-nav-text">Quizzes</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="A-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('Qui_index') }}">List Quizzes</a> </li>
                            <li> <a href="{{ route('Ques_index') }}">List Questions</a> </li>
                        </ul>
                    </li>
                    <!-- timetable-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#timetable-icon">
                            <div class="pull-left"><i class="fas fa-clock-o"></i><span
                                    class="right-nav-text">{{ 'timetable' }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="timetable-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('time_index') }}">  Add timetables</a> </li>
                            <li> <a href="{{ route('ttr_show') }}">  View timetables</a> </li>
                            <li> <a href="{{ route('ts.index') }}">  View timeSlots</a> </li>
                        </ul>
                    </li>

                    <!-- library-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                            <div class="pull-left"><i class="fas fa-book"></i><span
                                    class="right-nav-text">{{ 'library' }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('Lib_index') }}">Booklist</a> </li>
                            <li> <a href="{{ route('Lib_index') }}">Booklist</a> </li>
                        </ul>
                    </li>


                    <!-- Onlinec lasses-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                            <div class="pull-left"><i class="fas fa-video"></i><span
                                    class="right-nav-text">{{ 'Onlineclasses' }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('Online_index') }}">الاتصال مباشر مع زوم</a> </li>
                            <li> <a href="themify-icons.html">الاتصال الغير مباشر مع زوم</a> </li>
                        </ul>
                    </li>
               

                    <!-- Users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                            <div class="pull-left"><i class="fas fa-users"></i><span
                                    class="right-nav-text">{{ 'Users' }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route(('ori_index'))}}">School Oriented </a> </li>
                        </ul>
                    </li>

                     <!-- Settings-->
                    <li>
                        <a href="{{route('Seting_index')}}"><i class="fas fa-cogs"></i><span
                                class="right-nav-text">{{ 'Settings' }} </span></a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
