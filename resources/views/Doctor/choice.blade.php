<!DOCTYPE html>
<html lang="en">
<head>
    @include('inc.head')
    {{-- <link rel="stylesheet" href="{{ asset('/css/') }}"> --}}
</head>
<body>
    @php
    
        $btnClass=array( "class='btn btn-primary btn-lg'",
            "class='btn btn-secondary btn-lg'",
            "class='btn btn-success btn-lg'",
            "class='btn btn-warning btn-lg'");
                    
            $i=3;

            echo"
            <div class='login-page-wrap'>     
                <center>
                    <div style='background-color:rgba(135, 165, 200, 0.609); border-style:inset; border-radius:30px 2px 30px 2px; width:50%; margin-top:10%; '>
                        <br>
                        <h2>Which hospital system are you attempting to log into? : </h2>
                        <div class='ui-btn-wrap'>
                            <ul>";

                                foreach($tab as $subTab)
                                {
                                    $hospitalID=$subTab[0];
                                    $hospitalName = $subTab[1];
                                    echo "<li><button type='button' onclick=displayChosenHospitalInterface($hospitalID); $btnClass[$i] >$hospitalName</button></li>";
                                    $i--;
                                    if($i==0){$i=3;}
                                }
                                echo" 
                            </ul>
                        </div>
                    </div>
                </center>
            </div>";
    @endphp

    {{-- @include('inc.jsfiles') --}}
    <script>
       
        function displayChosenHospitalInterface(chosenHospitalID)
        {    
            window.location.href="login/"+chosenHospitalID;
        }
        
     </script>
</body>
</html>
