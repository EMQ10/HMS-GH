<!DOCTYPE html>
<html lang="en">

    <head>
        @include('inc.head')
        <title>Health Care</title>
    </head>

<body>
    {{View::make('layouts.welcomeheader')}}
        <h1 class="mt-5 text-center"> Health Care</h1> <br>
      
    @if (session()->has('message'))    

        <div style="width:40%; margin-left:30%;">
                    <div style="padding-left:15%; padding-right:15%;" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">{{ session()->get('message')}}</h4>
                        {{-- <p> Attempted to access a non authorized page </p> --}}
                    </div>     
                {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}   
        </div>
    @endif

    @include('layouts.welcomefooter')

</body>
</html>