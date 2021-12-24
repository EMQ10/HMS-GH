<!DOCTYPE html>
<html lang="en">

    <head>
        @include('inc.head')
        <title>Login - Health Care</title>
    </head>

<body>
    <div class="main-wrapper account-wrapper">
       
        <div class="splitL left">

            <div class="centered">
                @if (session()->has('message'))  
                        {{-- {{ dd(session()->get('message')); }} --}}
                        <div style="width:100%;">
                                    <div style="padding-left:15%; padding-right:15%;" class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                        <h4 class="alert-heading">{{ session()->get('message') }}</h4>
                                        {{-- <p> Attempted to access a non authorized page </p> --}}
                                    </div>     
                                {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> --}}   
                        </div>
                
                     @endif
                <div class="account-page">
			        <div class="account-center">
				        <div class="account-box">                 
                            <form action="login" method="POST" class="form-signin">
                                @csrf   

                                <div class="account-logo">
                                    <a href="login"><img src="{{ asset('storage/img/logo-dark.png') }}" alt=""></a>
                                </div> <br>
                                
                                @if(session()->has('status'))
                                    <div class="alert alert-danger"> {{ session()->get('status') }}  </div>
                                @endif

                                @if(session()->has('statusPassword'))
                                    <div class="alert alert-success text-center"> {{ session()->get('statusPassword') }}  </div>
                                @endif

                                <div class="form-group">
                                    <label>Username / Email</label>
                                    <input type="text" id="usernameOrEmail" value="{{ old('usernameOrEmail') }}" placeholder="Email address or Username" 
                                    name="usernameOrEmail" class="form-control" autofocus>
                                    <i class="far fa-envelope"></i>
                                </div>
                                
                                @error('usernameOrEmail')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror <br>
            
                                <div class="form-group">
                                    <label>Password</label> &nbsp; <i class="fas fa-lock"></i> 
                                    <input type="password" id="password" placeholder="Password" name="password" data-eye class="form-control" >  
                                </div>
            
                                @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 

                                

                                <div class="form-group text-right">
                                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary account-btn submit">Login</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
			</div>
        </div>

        <div class="splitR right">      
           {{-- <img src="{{ asset('storage/img/login/doctor1.jpg') }}" alt=""> --}}
        </div>


    </div>

   @include('inc.scripts')
</body>

</html>