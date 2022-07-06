  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="{{ Auth::user()->profile_photo_url }}"
                 class="user-image img-circle elevation-2"
                 alt="{{ Auth::user()->name }}">
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header h-auto">
                    <img src="{{ Auth::user()->profile_photo_url }}"
                         class="img-circle elevation-1 m-auto"
                         alt="{{ Auth::user()->name }}">
                         <p>
                            {{ Auth::user()->name }}
                          </p>
                </li>
                <li class="user-footer d-flex justify-between">
                    <div class="pull-left flex-1">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="btn btn-default btn-flat"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                    </div>
                    <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->


