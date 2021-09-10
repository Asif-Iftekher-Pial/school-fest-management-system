<ul class="nav flex-column">
	<li class="nav-item">
		<a class="nav-link text-white" href="{{ url('/school-dashboard') }}">
			<i class="fa fa-tachometer" aria-hidden="true"></i> <b>Dashboard</b>
		</a>
	</li>
	<div class="dropdown-divider"></div>
	<li class="nav-item">
		<a class="nav-link text-white" href="{{ url('/school-profile') }}">
			<i class="fa fa-user" aria-hidden="true"></i> School Profile
		</a>
	</li>
	<div class="dropdown-divider"></div>
	<li class="nav-item">
		<a class="nav-link text-white" href="{{ url('/student-groups') }}"><i class="fa fa-users" aria-hidden="true"></i> Student Groups</a>
	</li>
	<div class="dropdown-divider"></div>
	<li class="nav-item">
		<a class="nav-link text-white" href="{{ url('/students') }}"><i class="fa fa-list-ul" aria-hidden="true"></i> Student List</a>
	</li>
	<div class="dropdown-divider"></div>
	<li class="nav-item">
		<a class="nav-link text-white" href="#"><i class="fa fa-history" aria-hidden="true"></i> History</a>
	</li>
	<div class="dropdown-divider"></div>
	<li class="nav-item">
		<a class="nav-link text-white" href="#"><i class="fa fa-cog" aria-hidden="true"></i> Setup</a>
	</li>
	<div class="dropdown-divider"></div>
	<li class="nav-item">
        <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

	</li>
	<div class="dropdown-divider"></div>
</ul>