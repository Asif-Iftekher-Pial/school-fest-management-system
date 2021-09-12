<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
                <a class="nav-link" href="{{url('/admin/home')}}"
                    ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard</a
                >
                <div class="sb-sidenav-menu-heading">Setups</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                    User Control
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/admin/user_list') }}">Admin User List</a>
                        <a class="nav-link" href="{{ url('/admin/register') }}">Create New User</a></nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                    ><div class="sb-nav-link-icon"><i class="fas fa-poll"></i></div>
                    Event Setup
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                            >Events
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                        ></a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('events.index') }}">Event List</a>
                                <a class="nav-link" href="{{ route('events.create') }}">Add new event</a>
                                {{-- <a class="nav-link" href="password.html">Forgot Password</a> --}}
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pageCategory" aria-expanded="false" aria-controls="pageCategory"
                            >Category
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                        ></a>
                        <div class="collapse" id="pageCategory" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('category.index') }}">Category List</a>
                                <a class="nav-link" href="{{ route('category.create') }}">Category Add</a>
                                {{-- <a class="nav-link" href="500.html">500 Page</a></nav> --}}
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                            >Groups
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                        ></a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('groups.index') }}">Group List</a>
                                <a class="nav-link" href="{{ route('groups.create') }}">Group Add</a>
                                {{-- <a class="nav-link" href="500.html">500 Page</a></nav> --}}
                        </div>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="{{ url('admin/school-list') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    School List</a>
                <a class="nav-link" href="{{ url('admin/students-list') }}"><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Students List</a>
                <a class="nav-link" href=""><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>History</a>

                <div class="sb-sidenav-menu-heading">Page Setup</div>
                <a class="nav-link" href="{{ route('pageSetup.index') }}"><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>Page setup</a>
                <a class="nav-link" href="{{ route('chairman.index') }}"><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>Chairman message</a>
                <a class="nav-link" href="#"><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>About Us</a>
                <a class="nav-link" href="{{ route('mission.index') }}"><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>Mission and Vission</a>
                
                <a class="nav-link" href="{{ route('committees.index') }}"><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>Committee List</a>
                <a class="nav-link" href="{{ route('sliderimages.index') }}"><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>Slider Images</a>
                <a class="nav-link" href="{{ route('sponsors.index') }}"><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Sponsors List</a>
                <a class="nav-link" href="{{ route('albums.index') }}"><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Image Gallery</a>
                <a class="nav-link" href="{{ route('videogallery.index') }}"><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Video Gallery</a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            {{-- <div class="small">Logged in as:</div>
            Start Bootstrap --}}
        </div>
    </nav>
</div>