<!-- background: linear-gradient(#ACB6E5, #74ebd5) -->
<div class="header" style="background-color: #ededed">
    <nav class="navbar top-navbar navbar-expand-md navbar-default">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('dashboard')}}">
                <!-- Logo icon -->
                <b style="background: linear-gradient(#ACB6E5, #74ebd5)"><img style="width: 60%;" src="{{url('ela-admin/images/logo.png')}}" alt="homepage" class="dark-logo" /></b>
                <!--End Logo icon -->
                <!-- Logo text -->
            </a>
        </div>

        <!-- end logo -->

        <!-- collapse nav -->
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item m-l-10"><a class="nav-link sidebartoggler hidden-sm-down text-muted" href="javascript:void(0)"><i class="ti-menu"  style="color: #282828"></i></a> </li>
            </ul>
            <span class="pull-right list-icons" style="color: #282828; font-weight: bold.;">Welcome, {{@Auth::user()->username}} <a href="{{ url('/logout') }}"><i class="mdi mdi-logout " style="color: #282828; font-weight: bolder;"></i></a></span>
        </div>
        <!-- end collapse nav -->
    </nav>
</div>
<!-- end header -->


