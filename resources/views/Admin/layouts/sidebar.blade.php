<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
               
                <li>
                    <a href="{{ route('admin.departments.index') }}"><i class="fa fa-hospital fa-2x"></i> <span style="font-size:20px;">Departments</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user fa-2x"></i> <span style="font-size:20px;"> Employees </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.employees.index') }}"><i class="fas fa-users"></i> Employees List</a></li>
                        <li><a href="{{ route('admin.doctors.index') }}"><i class="fa fa-user-md"></i> Doctors</a></li>
                    
                        <li><a href="{{ route('admin.nurses.index') }}"><i class="fa fa-stethoscope"></i> Nurses</a></li>
                   
                        <li><a href="admin/employees/receptionists"><i class="fas fa-user"></i> Receptionist(s)</a></li>
                    </ul>
                </li>
                
            
                
               
                
            </ul>
            <br>
            <img src="{{ asset('storage/img/tom.jpg') }}" alt="" width="220px" height="500px">

        </div>
    </div>
</div>