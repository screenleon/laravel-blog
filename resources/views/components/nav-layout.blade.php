<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laveral') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item{{ Request::url() == route('index') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('index') }}">Home
                        @if (Request::url() == route('index'))
                            <span class="sr-only">(current)</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item{{ Request::url() == route('posts.index') ? ' active' : '' }}">
                    <a class="nav-link" href="route('posts.index')">Posts</a>
                    @if (Request::url() == route('index'))
                        <span class="sr-only">(current)</span>
                    @endif
                </li>
                <li class="nav-item dropdown">
                    <a href="#" id="toolsDropdown" class="nav-link dropdown-toggle uppercase" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ __('Tools')}}
                    </a>
                </li>
            </ul>
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </div>
    </div>
</nav>
