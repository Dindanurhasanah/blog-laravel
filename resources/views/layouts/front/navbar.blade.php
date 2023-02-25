<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('home_front') }}"><img src="{{ asset('front/images/version/tech-logo.png') }}" alt=""></a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home_front') }}">Home</a>
            </li>
            @php($post_counter=0)
            @foreach ($categories as $category)
                @php($post_counter= $category->posts->count()) 
                @if($post_counter > 0) 
                    @php($main_menu= $category->priority) <!-- priority 1 - show category on Main menu -->
                    @php($published= $category->status) <!-- status 0 - category no published -->
                    @if($published==1 and $main_menu=1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.single', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                        </li>  
                    @endif
                @endif
            @endforeach                 
           
        </ul>
        <ul class="navbar-nav mr-2">
            @if (!Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}" rel="tooltip" data-placement="bottom" title="Sign up"><i class="fa fa-user"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" rel="tooltip" data-placement="bottom" title="Log in"><i class="fa fa-sign-in"></i></a>
                </li>
            </ul>
        @else
        <ul class="navbar-nav mr-2">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}" rel="tooltip" data-placement="bottom" title="View profil"><i class="fa fa-address-card"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" rel="tooltip" data-placement="bottom" title="Sign out"><i class="fa fa-sign-out" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
        @endif
    </div>
</nav>