
<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
	</div>

	<div class="pull-right">
		<div class="ico-item">
			<img src="{{Auth::user()->photo}}" alt="" class="ico-img">
			<ul class="sub-ico-item">
				<li>
                    <a class="dropdown-item js__logout" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     Déconnexion
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                </li>
			</ul>
		</div>
	</div>
</div>
