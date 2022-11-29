<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Ujian PKK 22 Dieo Surya
    </title>


    @stack('prepend-style')
    @include('includes.perpus.style')
    @stack('addon-style')
</head>

<body>

    <!-- header section starts  -->

    <header class="header">
        <div class="header-1">
            <a href="#" class="logo">
                <i class="bx bx-health"></i> Jamu Isekai
            </a>

            <form action="" class="search-form">
                <input type="search" name="" placeholder="search here..." id="search-box" />
                <label for="search-box" class="fas fa-search"></label>
            </form>

            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
                <div id="login-btn" class="fas fa-ajax"></div>
            </div>
            <!-- Authentication Links -->
            @guest
                <a class="logo" href="{{ route('login') }}">{{ __('Login') }}
                    <i class="fas fa-user"></i>
                </a>
                @if (Route::has('register'))
                    <a class="logo" href="{{ route('register') }}">{{ __('register') }}
                        <i class="fas fa-user"></i>
                    </a>
                @endif
            @else
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest

        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="#home">home</a>

            </nav>
        </div>
    </header>

    <!-- header section ends -->

    <!-- bottom navbar  -->

    <nav class="bottom-navbar">
        <a href="#home" class="fas fa-home"></a>

    </nav>

    <!-- login form  -->

    <div class="login-form-container">
        <div id="close-login-btn" class="fas fa-times"></div>

        <form action="">
            <h3>sign in</h3>
            <span>username</span>
            <input type="email" name="" class="box" placeholder="enter your email" id="" />
            <span>password</span>
            <input type="password" name="" class="box" placeholder="enter your password" id="" />
            <div class="checkbox">
                <input type="checkbox" name="" id="remember-me" />
                <label for="remember-me"> remember me</label>
            </div>
            <input type="submit" value="sign in" class="btn" />
            <p>forget password ? <a href="#">click here</a></p>
            <p>don't have an account ? <a href="#">create one</a></p>
        </form>
    </div>


    @yield('content')
    @include('includes.perpus.footer')

</body>

@stack('prepend-script')
@include('includes.perpus.script')
@stack('addon-script')

</html>
Footer
