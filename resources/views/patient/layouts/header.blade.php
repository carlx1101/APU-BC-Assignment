<!-- Header (Topbar) -->
<header class="u-header">
	<div class="u-header-left">
		<a class="u-header-logo" href="{{ route('home') }}">
			<img class="u-logo-desktop" src="./assets/img/logo.png" width="160" alt="Stream Dashboard">
			<img class="img-fluid u-logo-mobile" src="./assets/img/logo-mobile.png" width="50" alt="Stream Dashboard">
		</a>
	</div>

	<div class="u-header-middle">
		<a class="js-sidebar-invoker u-sidebar-invoker" href="#!" data-is-close-all-except-this="true"
			data-target="#sidebar">
			<i class="fa fa-bars u-sidebar-invoker__icon--open"></i>
			<i class="fa fa-times u-sidebar-invoker__icon--close"></i>
		</a>

		<div class="u-header-search" data-search-mobile-invoker="#headerSearchMobileInvoker"
			data-search-target="#headerSearch">
			<a id="headerSearchMobileInvoker" class="btn btn-link input-group-prepend u-header-search__mobile-invoker"
				href="#!">
				<i class="fa fa-search"></i>
			</a>

			<div id="headerSearch" class="u-header-search-form">
				<form>
					<div class="input-group">
						<button class="btn-link input-group-prepend u-header-search__btn align-items-center"
							type="submit">
							<i class="fa fa-search"></i>
						</button>
						<input class="form-control u-header-search__field" type="search" placeholder="Type to search…">
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="u-header-right">
		<!-- Activities -->
		{{-- <div class="dropdown mr-4">
			<a class="link-muted" href="#!" role="button" id="dropdownMenuLink" aria-haspopup="true"
				aria-expanded="false" data-toggle="dropdown">
				<span class="h3">
					<i class="far fa-envelope"></i>
				</span>
				<span class="u-indicator u-indicator-top-right u-indicator--xxs bg-secondary"></span>
			</a>

			<div class="dropdown-menu dropdown-menu-right border-0 py-0 mt-4" aria-labelledby="dropdownMenuLink"
				style="width: 360px;">
				<div class="card">
					<div class="card-header d-md-flex align-items-center py-3">
						<h2 class="h4 card-header-title">Activities</h2>
						<a class="ml-auto" href="#">Clear all</a>
					</div>

					<div class="card-body p-0">
						<div class="list-group list-group-flush">
							<!-- Activity -->
							<a class="list-group-item list-group-item-action" href="#">
								<div class="media align-items-center">
									<img class="u-avatar--sm rounded-circle mr-3" src="./assets/img/avatars/img1.jpg"
										alt="Image description">

									<div class="media-body">
										<div class="d-md-flex align-items-center">
											<h4 class="mb-1">Chad Cannon</h4>
											<small class="text-muted ml-md-auto">23 Jan 2018</small>
										</div>

										<p class="text-truncate mb-0" style="max-width: 250px;">
											We've just done the project.
										</p>
									</div>
								</div>
							</a>
							<!-- End Activity -->

							<!-- Activity -->
							<a class="list-group-item list-group-item-action" href="#">
								<div class="media align-items-center">
									<img class="u-avatar--sm rounded-circle mr-3" src="./assets/img/avatars/img2.jpg"
										alt="Image description">

									<div class="media-body">
										<div class="d-md-flex align-items-center">
											<h4 class="mb-1">Jane Ortega</h4>
											<small class="text-muted ml-md-auto">18 Jan 2018</small>
										</div>

										<p class="text-truncate mb-0" style="max-width: 250px;">
											<span class="text-primary">@Bruce</span> advertising your project is not
											good idea.
										</p>
									</div>
								</div>
							</a>
							<!-- End Activity -->

							<!-- Activity -->
							<a class="list-group-item list-group-item-action" href="#">
								<div class="media align-items-center">
									<img class="u-avatar--sm rounded-circle mr-3"
										src="./assets/img/avatars/user-unknown.jpg" alt="Image description">

									<div class="media-body">
										<div class="d-md-flex align-items-center">
											<h4 class="mb-1">Stella Hoffman</h4>
											<small class="text-muted ml-md-auto">15 Jan 2018</small>
										</div>

										<p class="text-truncate mb-0" style="max-width: 250px;">
											When the release date is expexted for the advacned settings?
										</p>
									</div>
								</div>
							</a>
							<!-- End Activity -->

							<!-- Activity -->
							<a class="list-group-item list-group-item-action" href="#">
								<div class="media align-items-center">
									<img class="u-avatar--sm rounded-circle mr-3" src="./assets/img/avatars/img4.jpg"
										alt="Image description">

									<div class="media-body">
										<div class="d-md-flex align-items-center">
											<h4 class="mb-1">Htmlstream</h4>
											<small class="text-muted ml-md-auto">05 Jan 2018</small>
										</div>

										<p class="text-truncate mb-0" style="max-width: 250px;">
											Adwords Keyword research for beginners
										</p>
									</div>
								</div>
							</a>
							<!-- End Activity -->
						</div>
					</div>

					<div class="card-footer py-3">
						<a class="btn btn-block btn-outline-primary" href="#">View all activities</a>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- End Activities -->

		<!-- Notifications -->
		{{-- <div class="dropdown mr-4">
			<a class="link-muted" href="#!" role="button" id="dropdownMenuLink" aria-haspopup="true"
				aria-expanded="false" data-toggle="dropdown">
				<span class="h3">
					<i class="far fa-bell"></i>
				</span>
				<span class="u-indicator u-indicator-top-right u-indicator--xxs bg-info"></span>
			</a>

			<div class="dropdown-menu dropdown-menu-right border-0 py-0 mt-4" aria-labelledby="dropdownMenuLink"
				style="width: 360px;">
				<div class="card">
					<div class="card-header d-md-flex align-items-center py-3">
						<h2 class="h4 card-header-title">Notifications</h2>
						<a class="ml-auto" href="#">Clear all</a>
					</div>

					<div class="card-body p-0">
						<div class="list-group list-group-flush">
							<!-- Notification -->
							<a class="list-group-item list-group-item-action" href="#">
								<div class="media align-items-center">
									<div class="u-icon u-icon--sm rounded-circle bg-danger text-white mr-3">
										<i class="fab fa-dribbble"></i>
									</div>

									<div class="media-body">
										<div class="d-md-flex align-items-center">
											<h4 class="mb-1">Dribbble</h4>
											<small class="text-muted ml-md-auto">23 Jan 2018</small>
										</div>

										<p class="text-truncate mb-0" style="max-width: 250px;">
											<span class="text-primary">@htmlstream</span> just liked your post!
										</p>
									</div>
								</div>
							</a>
							<!-- End Notification -->

							<!-- Notification -->
							<a class="list-group-item list-group-item-action" href="#">
								<div class="media align-items-center">
									<div class="u-icon u-icon--sm rounded-circle bg-info text-white mr-3">
										<i class="fab fa-twitter"></i>
									</div>

									<div class="media-body">
										<div class="d-md-flex align-items-center">
											<h4 class="mb-1">Twitter</h4>
											<small class="text-muted ml-md-auto">18 Jan 2018</small>
										</div>

										<p class="text-truncate mb-0" style="max-width: 250px;">
											Someone mentioned you on the tweet.
										</p>
									</div>
								</div>
							</a>
							<!-- End Notification -->

							<!-- Notification -->
							<a class="list-group-item list-group-item-action" href="#">
								<div class="media align-items-center">
									<div class="u-icon u-icon--sm rounded-circle bg-success text-white mr-3">
										<i class="fab fa-spotify"></i>
									</div>

									<div class="media-body">
										<div class="d-md-flex align-items-center">
											<h4 class="mb-1">Spotify</h4>
											<small class="text-muted ml-md-auto">18 Jan 2018</small>
										</div>

										<p class="text-truncate mb-0" style="max-width: 250px;">
											You've just recived $25 free gift card.
										</p>
									</div>
								</div>
							</a>
							<!-- End Notification -->

							<!-- Notification -->
							<a class="list-group-item list-group-item-action" href="#">
								<div class="media align-items-center">
									<div class="u-icon u-icon--sm rounded-circle bg-info text-white mr-3">
										<i class="fab fa-facebook-f"></i>
									</div>

									<div class="media-body">
										<div class="d-md-flex align-items-center">
											<h4 class="mb-1">Facebook</h4>
											<small class="text-muted ml-md-auto">18 Jan 2018</small>
										</div>

										<p class="text-truncate mb-0" style="max-width: 250px;">
											<span class="text-primary">@htmlstream</span> commented in your post.
										</p>
									</div>
								</div>
							</a>
							<!-- End Notification -->
						</div>
					</div>

					<div class="card-footer py-3">
						<a class="btn btn-block btn-outline-primary" href="#">View all notifications</a>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- End Notifications -->

		<!-- Apps -->
		{{-- <div class="dropdown mr-4">
			<a class="link-muted" href="#!" role="button" id="dropdownMenuLink" aria-haspopup="true"
				aria-expanded="false" data-toggle="dropdown">
				<span class="h3">
					<i class="far fa-circle"></i>
				</span>
				<span class="u-indicator u-indicator-top-right u-indicator--xxs bg-warning"></span>
			</a>

			<div class="dropdown-menu dropdown-menu-right border-0 py-0 mt-4" aria-labelledby="dropdownMenuLink"
				style="width: 360px;">
				<div class="card">
					<div class="card-header d-md-flex align-items-center py-3">
						<h2 class="h4 card-header-title">Apps</h2>
						<a class="ml-auto" href="#">Learn more</a>
					</div>

					<div class="card-body py-3">
						<div class="row">
							<!-- App -->
							<div class="col-4 px-2 mb-2">
								<a class="u-apps d-flex flex-column rounded" href="#!">
									<img class="img-fluid u-avatar--xs mx-auto mb-2"
										src="./assets/img/brands-sm/img1.png" alt="">
									<span class="text-center">Assana</span>
								</a>
							</div>
							<!-- End App -->

							<!-- App -->
							<div class="col-4 px-2 mb-2">
								<a class="u-apps d-flex flex-column rounded" href="#!">
									<img class="img-fluid u-avatar--xs mx-auto mb-2"
										src="./assets/img/brands-sm/img2.png" alt="">
									<span class="text-center">Slack</span>
								</a>
							</div>
							<!-- End App -->

							<!-- App -->
							<div class="col-4 px-2 mb-2">
								<a class="u-apps d-flex flex-column rounded" href="#!">
									<img class="img-fluid u-avatar--xs mx-auto mb-2"
										src="./assets/img/brands-sm/img3.png" alt="">
									<span class="text-center">Cloud</span>
								</a>
							</div>
							<!-- End App -->

							<!-- App -->
							<div class="col-4 px-2">
								<a class="u-apps d-flex flex-column rounded" href="#!">
									<img class="img-fluid u-avatar--xs mx-auto mb-2"
										src="./assets/img/brands-sm/img5.png" alt="">
									<span class="text-center">Facebook</span>
								</a>
							</div>
							<!-- End App -->

							<!-- App -->
							<div class="col-4 px-2">
								<a class="u-apps d-flex flex-column rounded" href="#!">
									<img class="img-fluid u-avatar--xs mx-auto mb-2"
										src="./assets/img/brands-sm/img4.png" alt="">
									<span class="text-center">Spotify</span>
								</a>
							</div>
							<!-- End App -->

							<!-- App -->
							<div class="col-4 px-2">
								<a class="u-apps d-flex flex-column rounded" href="#!">
									<img class="img-fluid u-avatar--xs mx-auto mb-2"
										src="./assets/img/brands-sm/img6.png" alt="">
									<span class="text-center">Twitter</span>
								</a>
							</div>
							<!-- End App -->
						</div>
					</div>

					<div class="card-footer py-3">
						<a class="btn btn-block btn-outline-primary" href="#">View all apps</a>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- End Apps -->

		<!-- User Profile -->
		<div class="dropdown ml-2">
			<a class="link-muted d-flex align-items-center" href="#!" role="button" id="dropdownMenuLink"
				aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
				<img class="u-avatar--xs img-fluid rounded-circle mr-2" src="./assets/img/avatars/img1.jpg"
					alt="User Profile">
				<span class="text-dark d-none d-sm-inline-block">
					Bruce Goodman <small class="fa fa-angle-down text-muted ml-1"></small>
				</span>
			</a>

			<div class="dropdown-menu dropdown-menu-right border-0 py-0 mt-3" aria-labelledby="dropdownMenuLink"
				style="width: 260px;">
				<div class="card">
					<div class="card-body">
						<ul class="list-unstyled mb-0">
							<li>
								<form method="POST" action="{{ route('logout') }}" id="logoutForm">
									@csrf
									<a class="d-flex align-items-center link-dark" href="{{ route('logout') }}"
										onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
										<span class="h3 mb-0"><i class="far fa-share-square text-muted mr-2"></i></span>
										Sign Out
									</a>
								</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- End User Profile -->
	</div>
</header>
<!-- End Header (Topbar) -->