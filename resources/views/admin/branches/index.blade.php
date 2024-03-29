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
                        <header class="card-header d-flex justify-content-between align-items-center">
                            <h2 class="h3 card-header-title mb-0">All Branches</h2>
                            <a href="{{ route('branches.create') }}" class="btn btn-sm btn-success">Add Branch</a>
                        </header>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Contact</th>
                                            <th class="text-center" scope="col">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($branches as $index => $branch)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $branch->name }}</td>
                                                <td>{{ $branch->address }}</td>
                                                <td>{{ $branch->contact }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
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
