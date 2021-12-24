<?php use \Illuminate\Support\Facades\Session; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Achievements</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="#">About us</a>
      </li>
    </ul>
    
    @if (!Auth::check())
      
      <ul class="nav navbar-nav navbar-right">
        <li class='nav-item'>
            <a class='nav-link' href="login">Login</a>
        </li>
      </ul>

    @else  

      <ul class="nav navbar-nav navbar-right">
        <li class='nav-item'>
            <a class='nav-link' href="logout">Logout</a>
        </li>
      </ul>

    @endif

        
  </div>
</nav>