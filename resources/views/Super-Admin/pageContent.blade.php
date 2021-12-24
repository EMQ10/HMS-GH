<div class="content" style="background-image: url({{ url('storage/img/receptionist_background.jpg') }}); background-repeat: no-repeat; background-size:cover; height:878px;">
  
    <h2 class="text-dark text-center" style="background-color: #fff; border-radius: 10px; border-style:inset; width:450px; ">SUPER ADMIN DASHBOARD</h2>
    <div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6" >
                <div class="dash-widget" style="border-radius:22px 0px 0px 0px ;">
                    <span class="dash-widget-bg1"><i class="fa fa-user-md" aria-hidden="true"></i>  </span>
                    <div class="dash-widget-info text-right">
                        <h3>{{ $numOfDoctors }}</h3>
                        <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                <div class="dash-widget" style="border-radius:0px 22px 0px 0px ;">
                    <span class="dash-widget-bg2"><i class="fas fa-users"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>{{ $numOfPatients }}</h3>
                        <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                <div class="dash-widget" style="border-radius:0px 0px 0px 22px ;">
                    <span class="dash-widget-bg3"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>{{ $numOfNurses }}</h3>
                        <span class="widget-title3">Nurses <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                <div class="dash-widget" style="border-radius:0px 0px 22px 0px ;">
                    <span class="dash-widget-bg4"><i class="fas fa-user"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>{{ $numOfReceptionists }}</h3>
                        <span class="widget-title4">Receptionists <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="dash-widget" style="border-radius:22px;">
                    <span class="dash-widget-bg5"><i class="fas fa-hospital"></i></span>
                    {{-- <span class="text-right align-items-center">
                        <h1 style="color:#794576;">{{ $numOfHospitals }}</h1>
                    </span> --}}
                    <div class="mt-3 mb-2"></div>
                
                    <div class="dash-widget-info text-center align-items-center">
                       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
                        <span class="widget-title5 mr-5 ml-5">Hospitals Under Health Care (Ministry of Health) <i class="fa fa-check" aria-hidden="true"></i></span>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        <span class="ml-5 text-right" style="color:#794576; font-size:25px;">{{ $numOfHospitals }}</span>
                    </div>
                     
                    

                    
                     
                </div>
            </div>
        </div>
    </div>
    
</div>