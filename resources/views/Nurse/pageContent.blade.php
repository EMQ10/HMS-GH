<div class="content" style="background-image: url({{ url('storage/img/receptionist_background.jpg') }}); background-repeat: no-repeat; background-size:cover; height:878px;">
    
    <h2 class="text-dark text-center" style="background-color: #fff; border-radius: 10px; border-style:inset; width:320px; ">NURSE DASHBOARD</h2>
    <div class="container mt-5">
        <div class="row"  style="font-size:30px;">
            <div class="col-lg-6 col-xl-6 col-md-6 mt-5 text-center">
                <a href="{{ route('nurse.visit.choice') }}">
                    <i class="fa fa-users fa-10x" style="stroke: black; stroke-width:5px;"></i> <br>          
                </a>
                <b><h2 class="text-dark" >PATIENT VISITS</h2></b>
                    
            </div>
            <div class="col-lg-6 col-xl-6 col-md-6 mt-5 text-center" >
                <a href="{{ route('password.request') }}">
                    <i class="fa fa-cog fa-10x" style="stroke: black; stroke-width:5px;"></i> <br>   
                </a>    
                <b><h2 class="text-dark" >RESET PASSWORD</h2></b>
            </div>
        </div>
    </div>
</div>