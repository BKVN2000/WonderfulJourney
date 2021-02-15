<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategory" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownCategory">
                        @foreach($categories as $category)
                            <a class="dropdown-item" href="{{route('ShowArticleByCategory',$category->id)}}">{{$category->category_name}}</a>  
                        @endforeach          
                    </div>
                </li>

                @auth
                    @if(Auth::User()->role === 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ViewAdminUsers')}}">Admin</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ViewMemberUsers')}}">User</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('UpdateUser') }}">Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ShowAllArticles',auth()->user()->id)}}">Blog</a>
                        </li>
                    @endif
                @endauth
            </ul>
            <div class="form-inline my-2 my-lg-0">
            @guest         
                <a class="nav-link" href="{{route('register')}}">SignUp</a>  
                <a class="nav-link" href="{{route('login')}}">Login</a>
            @else
                <a class="nav-link"><h4>Welcome, {{Auth::user()->name}}</h4></a>  

                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
            </div>
        </div>
    </nav>
    @yield('main_container')
</body>
</html>