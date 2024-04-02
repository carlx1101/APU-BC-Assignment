<!DOCTYPE html>
<html lang="en" class="no-js">
	<!-- Head -->
	<head>
		<title>Blank Page | Stream - Dashboard UI Kit</title>

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
		<link rel="stylesheet" href="./assets/vendor/font-awesome/css/all.min.css">
		<link rel="stylesheet" href="./assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">

		<!-- Theme Styles -->
		<link rel="stylesheet" href="./assets/css/theme.css">
	</head>
	<!-- End Head -->

	<body>
		@include('patient.layouts.header')

		<main class="u-main" role="main">
			@include('patient.layouts.sidebar')

			<div class="u-content">
				<div class="u-body">
					<!-- End Breadcrumb -->
					<div class="mb-4">
						<nav aria-label="breadcrumb">
							<h1 class="h3">Blank Page</h1>
						  <ol class="breadcrumb bg-transparent small p-0">
						    <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
						  </ol>
						</nav>
					</div>
					<!-- End Breadcrumb -->
				</div>

				@include('patient.layouts.footer')
			</div>
		</main>

		<!-- Global Vendor -->
		<script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
		<script src="./assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
		<script src="./assets/vendor/popper.js/dist/umd/popper.min.js"></script>
		<script src="./assets/vendor/bootstrap/bootstrap.min.js"></script>

		<!-- Plugins -->
		<script src="./assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- Initialization  -->
		<script src="./assets/js/sidebar-nav.js"></script>
		<script src="./assets/js/main.js"></script>
	</body>
</html>
