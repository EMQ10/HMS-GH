<div class="header">
    <div class="header-left">
        <a href="/admin" class="logo">
            <img src="{{ asset('storage/img/logo.png') }}" width="35" height="35" alt=""> <span>Health Care</span>
        </a>
    </div>
    
    <a id="toggle_btn" href="javascript:void(0);"><i class="fas fa-bars"></i></a>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars"></i></a>
    
   
    
    <ul class="nav user-menu float-right">
        <div class="rounded text-center align-items-center justify-content-center d-flex" style="background-color:white;">
            &nbsp;&nbsp;&nbsp;&nbsp; <i class=" fa fa-hospital fa-3x"  aria-hidden="true"></i> 
            <div class="rounded mt-3 d-flex pr-2 pl-2  align-items-baseline" style="background-color:white;">
                <h4> {{$hospitalName}} Hospital </h4>
            </div> &nbsp;&nbsp;
            
        </div>
       
       
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" src="{{ asset('storage/img/user.jpg') }}" width="24" alt="Admin">
                    <span class="status online"></span>
                </span>
                <span>Admin</span>
            </a>
            <div class="dropdown-menu">
                {{-- <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                <a class="dropdown-item" href="settings.html">Settings</a> --}}
                <h4><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></h4>
            </div>
        </li>
        
    </ul>
    <div class="dropdown mobile-user-menu float-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            {{-- <a class="dropdown-item" href="profile.html">My Profile</a>
            <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
            <a class="dropdown-item" href="settings.html">Settings</a> --}}
            <a class="dropdown-item" href="login.html">Logout</a>
        </div>
    </div>
</div>