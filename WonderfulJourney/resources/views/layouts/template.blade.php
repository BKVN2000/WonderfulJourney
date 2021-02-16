<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <script  src="{{asset('assets/js/jquery.min.js') }}" ></script>
    <script  src="{{asset('assets/js/bootstrap.js') }}" ></script>
    <script  src="{{asset('assets/js/bootstrap.min.js') }}" ></script>

</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownCategory" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownCategory">
                        @foreach($categories as $category)
                            <a class="dropdown-item" href="{{route('ShowArticleByCategory',$category->id)}}">{{$category->name}}</a>  
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
                            <a class="nav-link" href="{{ route('ShowUpdateUserForm',Auth::id())}}">Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ShowMemberArticles',auth()->user()->id)}}">Blog</a>
                        </li>
                    @endif
                @endauth
            </ul>
            <div class="form-inline my-2 my-lg-0">
            @guest         
                <a class="nav-link" href="{{route('register')}}">SignUp</a>  
                <a class="nav-link" href="{{route('login')}}">Login</a>
            @else
                <a class="nav-link"><small>Welcome, {{Auth::user()->name}}</small></a>  

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