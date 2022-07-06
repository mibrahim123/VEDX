<header class="header">
    <div class="header__wrapper">
        <div class="container">
            <div class="row header__mainmenu align-items-center">
                <div class="col--20">
                    <div class="header__logo">
                        <img src="{{asset('Images/common/vedx__logo.png')}}" alt="">
                    </div>
                </div>
                <div class="col--80">
                    <div class="header__menu">
                        <ul class="d-flex align-items-center justify-content-end mb-0">
                            <li>
                                <!-- <li class="current-menu-item"> -->
                                <a href="error404.html">How It Works</a>
                            </li>
                            <li>
                                <a href="categories.html">Categories</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="btn btn-signup">Signup</a>
                            </li>
                            <li>
                                <a href="login.html" class="btn btn-orange">Login</a>
                            </li>
                        </ul>
                    </div>
                    <div class="toggle__menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
