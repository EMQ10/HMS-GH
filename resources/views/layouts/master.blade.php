<?php
use App\Models\Role;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head')
    @yield('title')
    @yield('extraHeadStuff')
    
</head>
  
    
<body>
    <div class="main-wrapper">
        
        
        @auth
            @php
                $role = session()->get('roleID');    
                $roleName = Role::where('id', $role)->first()->name;   
            @endphp  
        @endauth

        @if($roleName == "Super Admin")
                @php $roleName = "Super-Admin";@endphp 
        @endif

        @include($roleName.'.layouts.header')

        @include($roleName.'.layouts.sidebar')

        <div class="page-wrapper">
          <br>
            @yield('pageContent')   
        </div>
    </div>

    <div class="sidebar-overlay" data-reff=""></div>

    @include('inc.scripts')
    @yield('extraScripts')
    
   

</body>
</html>