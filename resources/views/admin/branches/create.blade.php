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
                    <form action="{{ route('branches.store') }}" method="POST">
                        @csrf

                        <!-- Form Controls for Adding a New Branch -->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="card">
                                    <header class="card-header">
                                        <h2 class="h3 card-header-title">Add New Branch</h2>
                                    </header>

                                    <div class="card-body">
                                        <!-- Name -->
                                        <div class="form-group mb-4">
                                            <label for="branchName">Branch Name</label>
                                            <input id="branchName" class="form-control" type="text" name="name" placeholder="Branch Name" required>
                                        </div>

                                        <!-- Address -->
                                        <div class="form-group mb-4">
                                            <label for="branchAddress">Branch Address</label>
                                            <textarea id="branchAddress" class="form-control" name="address" rows="3" placeholder="Branch Address" required></textarea>
                                        </div>

                                        <!-- Contact -->
                                        <div class="form-group mb-4">
                                            <label for="branchContact">Contact Number</label>
                                            <input id="branchContact" class="form-control" type="text" name="contact" placeholder="Contact Number" required>
                                        </div>

                                        <!-- Actions -->
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Save Branch</button>
                                            <a href="{{ route('branches.index') }}" class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
