<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/backend/home') }}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ url('/backend/cities') }}">
                    <i class="fa fa-building"></i> <span>Cities</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/backend/accomodation-types') }}">
                    <i class="fa fa-bed" aria-hidden="true"></i> <span>Room Types</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/backend/tourist-attractions') }}">
                    <i class="fa fa-globe" aria-hidden="true"></i> <span>Tourist Attraction</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/backend/inn') }}">
                    <i class="fa fa-h-square" aria-hidden="true"></i> <span>Inn</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/backend/culinaries') }}">
                    <i class="fa fa-cutlery" aria-hidden="true"></i> <span>Culinary</span>
                </a>
            </li>
{{--            <li class="treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-pie-chart"></i>--}}
{{--                    <span>Charts</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>--}}
{{--                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>--}}
{{--                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>--}}
{{--                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
            {{--<li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                    <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                    <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                    <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                    <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                    <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                </ul>
            </li>--}}
{{--            <li class="treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-edit"></i> <span>Forms</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>--}}
{{--                    <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>--}}
{{--                    <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-table"></i> <span>Tables</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>--}}
{{--                    <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="pages/calendar.html">--}}
{{--                    <i class="fa fa-calendar"></i> <span>Calendar</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--              <small class="label pull-right bg-red">3</small>--}}
{{--              <small class="label pull-right bg-blue">17</small>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="pages/mailbox/mailbox.html">--}}
{{--                    <i class="fa fa-envelope"></i> <span>Mailbox</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--              <small class="label pull-right bg-yellow">12</small>--}}
{{--              <small class="label pull-right bg-green">16</small>--}}
{{--              <small class="label pull-right bg-red">5</small>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-folder"></i> <span>Examples</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>--}}
{{--                    <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>--}}
{{--                    <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>--}}
{{--                    <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>--}}
{{--                    <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>--}}
{{--                    <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>--}}
{{--                    <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>--}}
{{--                    <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>--}}
{{--                    <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-share"></i> <span>Multilevel</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
{{--                    <li class="treeview">--}}
{{--                        <a href="#"><i class="fa fa-circle-o"></i> Level One--}}
{{--                            <span class="pull-right-container">--}}
{{--                  <i class="fa fa-angle-left pull-right"></i>--}}
{{--                </span>--}}
{{--                        </a>--}}
{{--                        <ul class="treeview-menu">--}}
{{--                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>--}}
{{--                            <li class="treeview">--}}
{{--                                <a href="#"><i class="fa fa-circle-o"></i> Level Two--}}
{{--                                    <span class="pull-right-container">--}}
{{--                      <i class="fa fa-angle-left pull-right"></i>--}}
{{--                    </span>--}}
{{--                                </a>--}}
{{--                                <ul class="treeview-menu">--}}
{{--                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
{{--                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>--}}
{{--            <li class="header">LABELS</li>--}}
{{--            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
{{--            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
{{--            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
