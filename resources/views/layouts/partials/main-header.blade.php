<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header">
        <!--
            Tip 1: You can change the background color of the logo header using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
        -->
{{--        <a href="{{route('dashboard')}}" class="big-logo">--}}
{{--            <img src="{{asset('assets/img/logoresponsive.png')}}" alt="logo img" class="logo-img">--}}
{{--        </a>--}}
        <a href="{{route('dashboard')}}" class="logo">
            <img src="{{asset('assets/img/logoheader.png')}}" alt="navbar brand" class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="la la-bars"></i>
					</span>
        </button>
        <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">
        <!--
            Tip 1: You can change the background color of the navbar header using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
        -->
        <div class="container-fluid">
            <div class="navbar-minimize">
                <button class="btn btn-minimize btn-rounded">
                    <i class="la la-navicon"></i>
                </button>
            </div>

            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="{{asset('assets/img/profile.jpg')}}" alt="image profile" width="36" class="img-circle"></a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <li>
                            <div class="user-box">
                                <div class="u-img"><img src="{{asset('assets/img/profile.jpg')}}" alt="image profile"></div>
                                <div class="u-text">
                                    <h4>{{ Auth::user()->name }}</h4>
{{--                                    <p class="text-muted">hello@themekita.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>--}}
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Account Setting</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link quick-sidebar-toggler">
                        <i class="flaticon-shapes-1"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
