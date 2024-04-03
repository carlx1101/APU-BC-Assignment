<!-- Sidebar -->
<aside id="sidebar" class="u-sidebar">
	<div class="u-sidebar-inner">
		<header class="u-sidebar-header">
			<a class="u-sidebar-logo" href="index.html">
				<img class="img-fluid" src="{{asset('assets/img/logo.png')}}" width="124" alt="Stream Dashboard">
			</a>
		</header>
		<nav class="u-sidebar-nav">
			<ul class="u-sidebar-nav-menu u-sidebar-nav-menu--top-level">
				<!-- Dashboard -->
				<li class="u-sidebar-nav-menu__item">
					<a class="u-sidebar-nav-menu__link {{ request()->routeIs('doctor.home') ? 'active':'' }}"
						href="{{ route('doctor.home') }}">
						<i class="fa fa-cubes u-sidebar-nav-menu__item-icon"></i>
						<span class="u-sidebar-nav-menu__item-title">Dashboard</span>
					</a>
				</li>
				<!-- End Dashboard -->


				<!-- Tables -->
				<li class="u-sidebar-nav-menu__item">
					<a class="u-sidebar-nav-menu__link {{ request()->routeIs('doctor.clinical-note.index') ? 'active':'' }}"
						href="{{route('doctor.clinical-note.index')}}">
						<i class="fa fa-stethoscope u-sidebar-nav-menu__item-icon"></i>
						<span class="u-sidebar-nav-menu__item-title">Clinical Note</span>
					</a>
				</li>
				<!-- End Tables -->

				<li class="u-sidebar-nav-menu__item">
					<a class="u-sidebar-nav-menu__link" href="{{route('doctors.index')}}">
						<i class="fa fa-medkit u-sidebar-nav-menu__item-icon"></i>
						<span class="u-sidebar-nav-menu__item-title">Medication</span>
					</a>
				</li>


				<!-- Other Pages -->
				{{-- <li class="u-sidebar-nav-menu__item u-sidebar-nav--opened">
					<a class="u-sidebar-nav-menu__link active" href="#!" data-target="#subMenu3">
						<i class="far fa-folder-open u-sidebar-nav-menu__item-icon"></i>
						<span class="u-sidebar-nav-menu__item-title">Other Pages</span>
						<i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
						<span class="u-sidebar-nav-menu__indicator"></span>
					</a>

					<ul id="subMenu3" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level"
						style="display: block;">
						<li class="u-sidebar-nav-menu__item">
							<a class="u-sidebar-nav-menu__link active" href="./blank.html">
								<span class="u-sidebar-nav-menu__item-icon">B</span>
								<span class="u-sidebar-nav-menu__item-title">Blank Page</span>
							</a>
						</li>
						<li class="u-sidebar-nav-menu__item">
							<a class="u-sidebar-nav-menu__link" href="./404.html">
								<span class="u-sidebar-nav-menu__item-icon">E</span>
								<span class="u-sidebar-nav-menu__item-title">Error 404</span>
							</a>
						</li>
						<li class="u-sidebar-nav-menu__item">
							<a class="u-sidebar-nav-menu__link" href="./500.html">
								<span class="u-sidebar-nav-menu__item-icon">E</span>
								<span class="u-sidebar-nav-menu__item-title">Error 500</span>
							</a>
						</li>
					</ul>
				</li> --}}
				<!-- End Other Pages -->

				<hr>



				<!-- Free Download -->
				<li class="u-sidebar-nav-menu__item">
					<a class="u-sidebar-nav-menu__link" href=""
						onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
						<i class="far fa-share-square u-sidebar-nav-menu__item-icon"></i>
						<span class="u-sidebar-nav-menu__item-title">Logout</span>
					</a>
				</li>
				<!-- End Free Download -->
			</ul>
		</nav>
	</div>
</aside>
<!-- End Sidebar -->