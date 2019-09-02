<header> 
	<nav class="nav-wrapper pink darken-1">
	<div class="container">
        @if(!Auth::user())
         <a href="/" class="brand-logo">Estate Ms</a>
		<a href="" class="sidenav-trigger" data-target="nav-links">
			<i class="material-icons">menu</i>
        </a>

        @elseif(Auth::check() && Auth::user()->isAdmin())


        <a href="/home" class="brand-logo">Estate Ms</a>
		<a href="" class="sidenav-trigger" data-target="nav-links">
			<i class="material-icons">menu</i>
        </a>
        @else


        <a href="/visitorsdashboard" class="brand-logo">Estate Ms</a>
		<a href="" class="sidenav-trigger" data-target="nav-links">
			<i class="material-icons">menu</i>
        </a>

        @endif

        @if(!Auth::user()) 
		<ul class="right hide-on-med-and-down">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('frontend.index')}}">Houses</a></li>	
            <li><a href="">About</a></li>	
            <li><a href="">Contact</a></li>	
        </ul>
        @else
        <ul class="right hide-on-med-and-down">
                <li><a href="">{{Auth::user()->name}}</a></li>
                <li><a href="/visitorsdashboard">Houses</a></li>
                <li>
                       
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        
                        Logout
                  
                </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>	
            </ul>
        @endif
	</div>
</nav>

<ul class="sidenav gray darken-2" id="nav-links">
	<li><a href="">Sign Up</a></li>	
	<li><a href="">Login</a></li>
</ul>
</header>