   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center d-flex justify-content-center py-1">
        <img src="{{asset('Images/common/vedx__logo.png')}}" width="47px">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link d-flex align-items-center {{\Request::is('admin/dashboard') ? 'active' : ''}} ">
                        <i class="nav-icon fa fa-tachometer " aria-hidden="true"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{
                        (
                            \Request::is('admin/categories') ||
                            \Request::is('admin/categories/*') ||
                            \Request::is('admin/sub-categories') ||
                            \Request::is('admin/sub-categories/*') ||
                            \Request::is('admin/skills/*') ||
                            \Request::is('admin/skills')
                        ) ? 'menu-is-opening menu-open active' : ''
                    }}">
                        <i class="nav-icon fa fa-list" aria-hidden="true"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" {{
                        (
                            \Request::is('admin/categories') ||
                            \Request::is('admin/categories/*') ||
                            \Request::is('admin/sub-categories') ||
                            \Request::is('admin/sub-categories/*') ||
                            \Request::is('admin/skills/*') ||
                            \Request::is('admin/skills')

                        ) ? 'style = display:block' : ''
                    }}>
                        <li class="nav-item">
                            <a href="{{route('categories.index')}}" class="nav-link {{
                                    (
                                        \Request::is('admin/categories/*') ||
                                        \Request::is('admin/categories')
                                    )
                                    ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sub-categories.index')}}" class="nav-link {{
                                (
                                    \Request::is('admin/sub-categories/*') ||
                                    \Request::is('admin/sub-categories')
                                )
                                ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('skills.index')}}" class="nav-link {{
                                (
                                    \Request::is('admin/skills/*') ||
                                    \Request::is('admin/skills')
                                )
                                ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Skills</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Session Types</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tags</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Interests</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="nav-icon fa fa-graduation-cap" aria-hidden="true"></i>
                        <p>
                            Learners
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="nav-icon fa fa-user-plus" aria-hidden="true"></i>
                        <p>
                            Experts
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-calendar " aria-hidden="true"></i>
                        <p>
                            Manage Session
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="''" class="nav-link">
                        <i class="nav-icon fa fa-cog" aria-hidden="true"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="''" class="nav-link">
                        <i class="nav-icon  fa fa-quote-right " aria-hidden="true"></i>
                        <p>
                            Testimonials
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="''" class="nav-link">
                        <i class="nav-icon fa fa-sliders" aria-hidden="true"></i>
                        <p>
                            Manage CMS Pages
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

