<!DOCTYPE html>
<html lang="en" class="no-js">
	<!-- Head -->
	<head>
		<title>Register Provider</title>

		<!-- Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="keywords" content="Bootstrap Theme, Freebies, Dashboard, MIT license">
		<meta name="description" content="Stream - Dashboard UI Kit">
		<meta name="author" content="htmlstream.com">

		<!-- Favicon -->
		<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">

		<!-- Web Fonts -->
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

		<!-- Components Vendor Styles -->
		<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">

		<!-- Theme Styles -->
		<link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
	</head>
	<!-- End Head -->

	<body>

        @include('admin.layouts.header')
		<main class="u-main" role="main">


        @include('admin.layouts.sidebar')

			<div class="u-content">
				<div class="u-body">
					<!-- End Breadcrumb -->
					<div class="mb-4">
						<nav aria-label="breadcrumb">
							<h1 class="h3">All Branches</h1>
						  <ol class="breadcrumb bg-transparent small p-0">
						    <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">All Branches</li>
						  </ol>
						</nav>
					</div>
					<!-- End Breadcrumb -->


                    <div class="card mb-4">
						<header class="card-header">
							<h2 class="h3 card-header-title">All Branches </h2>
						</header>

						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Name</th>
											<th scope="col">Company</th>
											<th scope="col">Role</th>
											<th scope="col">Salary</th>
											<th scope="col" width="180">Tag</th>
											<th class="text-center" scope="col">Actions</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td>1</td>
											<td>Dale Mack</td>
											<td>Apple Inc.</td>
											<td>Developer</td>
											<td>$ 56,900</td>
											<td>
												<a class="badge badge-soft-warning" href="#">Angular</a>
												<a class="badge badge-soft-warning" href="#">React</a>
												<a class="badge badge-soft-warning" href="#">Vue</a>
											</td>
											<td class="text-center">
												<a id="actions1Invoker" class="link-muted" href="#!" aria-haspopup="true" aria-expanded="false"
												   data-toggle="dropdown">
													<i class="fa fa-sliders-h"></i>
												</a>

												<div class="dropdown-menu dropdown-menu-right dropdown" style="width: 150px;" aria-labelledby="actions1Invoker">
													<ul class="list-unstyled mb-0">
														<li>
															<a class="d-flex align-items-center link-muted py-2 px-3" href="#!">
																<i class="fa fa-plus mr-2"></i> Add
															</a>
														</li>
														<li>
															<a class="d-flex align-items-center link-muted py-2 px-3" href="#!">
																<i class="fa fa-minus mr-2"></i> Remove
															</a>
														</li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>Blanche Powers</td>
											<td>Dropbox Inc.</td>
											<td>Sales Manager</td>
											<td>$ 35,450</td>
											<td>
												<a class="badge badge-soft-primary" href="#">Admin</a>
												<a class="badge badge-soft-primary" href="#">Manager</a>
											</td>
											<td class="text-center">
												<a id="actions2Invoker" class="link-muted" href="#!" aria-haspopup="true" aria-expanded="false"
												   data-toggle="dropdown">
													<i class="fa fa-sliders-h"></i>
												</a>

												<div class="dropdown-menu dropdown-menu-right dropdown" style="width: 150px;" aria-labelledby="actions2Invoker">
													<ul class="list-unstyled mb-0">
														<li>
															<a class="d-flex align-items-center link-muted py-2 px-3" href="#!">
																<i class="fa fa-plus mr-2"></i> Add
															</a>
														</li>
														<li>
															<a class="d-flex align-items-center link-muted py-2 px-3" href="#!">
																<i class="fa fa-minus mr-2"></i> Remove
															</a>
														</li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Alvin Meyer</td>
											<td>Microsoft Inc.</td>
											<td>Developer</td>
											<td>$ 89,240</td>
											<td>
												<a class="badge badge-soft-success" href="#">Backend</a>
												<a class="badge badge-soft-success" href="#">DevOPs</a>
											</td>
											<td class="text-center">
												<a id="actions3Invoker" class="link-muted" href="#!" aria-haspopup="true" aria-expanded="false"
												   data-toggle="dropdown">
													<i class="fa fa-sliders-h"></i>
												</a>

												<div class="dropdown-menu dropdown-menu-right dropdown" style="width: 150px;" aria-labelledby="actions3Invoker">
													<ul class="list-unstyled mb-0">
														<li>
															<a class="d-flex align-items-center link-muted py-2 px-3" href="#!">
																<i class="fa fa-plus mr-2"></i> Add
															</a>
														</li>
														<li>
															<a class="d-flex align-items-center link-muted py-2 px-3" href="#!">
																<i class="fa fa-minus mr-2"></i> Remove
															</a>
														</li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>4</td>
											<td>Harriet Delgado</td>
											<td>Google Inc.</td>
											<td>Designer</td>
											<td>$ 96,450</td>
											<td>
												<a class="badge badge-soft-info" href="#">UI</a>
												<a class="badge badge-soft-info" href="#">UX</a>
												<a class="badge badge-soft-info" href="#">Design</a>
											</td>
											<td class="text-center">
												<a id="actions4Invoker" class="link-muted" href="#!" aria-haspopup="true" aria-expanded="false"
												   data-toggle="dropdown">
													<i class="fa fa-sliders-h"></i>
												</a>

												<div class="dropdown-menu dropdown-menu-right dropdown" style="width: 150px;" aria-labelledby="actions4Invoker">
													<ul class="list-unstyled mb-0">
														<li>
															<a class="d-flex align-items-center link-muted py-2 px-3" href="#!">
																<i class="fa fa-plus mr-2"></i> Add
															</a>
														</li>
														<li>
															<a class="d-flex align-items-center link-muted py-2 px-3" href="#!">
																<i class="fa fa-minus mr-2"></i> Remove
															</a>
														</li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>5</td>
											<td>Elsie Davis</td>
											<td>Dell Corp.</td>
											<td>Support Manager</td>
											<td>$ 35,900</td>
											<td>
												<a class="badge badge-soft-danger" href="#">Support</a>
											</td>
											<td class="text-center">
												<a id="actions5Invoker" class="link-muted" href="#!" aria-haspopup="true" aria-expanded="false"
												   data-toggle="dropdown">
													<i class="fa fa-sliders-h"></i>
												</a>

												<div class="dropdown-menu dropdown-menu-right dropdown" style="width: 150px;" aria-labelledby="actions5Invoker">
													<ul class="list-unstyled mb-0">
														<li>
															<a class="d-flex align-items-center link-muted py-2 px-3" href="#!">
																<i class="fa fa-plus mr-2"></i> Add
															</a>
														</li>
														<li>
															<a class="d-flex align-items-center link-muted py-2 px-3" href="#!">
																<i class="fa fa-minus mr-2"></i> Remove
															</a>
														</li>
													</ul>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>


        @include('admin.layouts.footer')


			</div>
		</main>

		<!-- Global Vendor -->
		<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-migrate/jquery-migrate.min.js')}}"></script>
		<script src="{{asset('assets/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap/bootstrap.min.js')}}"></script>

		<!-- Plugins -->
		<script src="{{asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!-- Initialization  -->
		<script src="{{asset('assets/js/sidebar-nav.js')}}"></script>
		<script src="{{asset('assets/js/main.js')}}"></script>
	</body>
</html>
