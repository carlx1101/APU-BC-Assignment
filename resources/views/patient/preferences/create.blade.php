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
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">

    <!-- Theme Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
</head>
<!-- End Head -->

<body>

    @include('patient.layouts.header')
    <main class="u-main" role="main">

        @include('patient.layouts.sidebar')

        <div class="u-content">
            <div class="u-body">
                <!-- Breadcrumb -->
                <div class="mb-4">
                    <nav aria-label="breadcrumb">
                        <h1 class="h3">Add Preferences</h1>
                        <ol class="breadcrumb bg-transparent small p-0">
                            <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Preferences</li>
                        </ol>
                    </nav>
                </div>
                <!-- End Breadcrumb -->

                <form action="{{ route('preferences.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <header class="card-header">
                                    <h2 class="h3 card-header-title">Add Personal Preferences</h2>
                                </header>
                                <div class="card-body">
                                    <!-- Hobbies -->
                                    <div class="form-group mb-4">
                                        <label for="hobbies">Hobbies</label>
                                        <input type="text" class="form-control" id="hobbies" name="hobbies"
                                            placeholder="Enter hobbies">
                                    </div>

                                    <!-- Sports -->
                                    <div class="form-group mb-4">
                                        <label for="sports">Sports</label>
                                        <input type="text" class="form-control" id="sports" name="sports"
                                            placeholder="Enter sports">
                                    </div>

                                    <!-- Languages -->
                                    <div class="form-group mb-4">
                                        <label for="languages">Languages</label>
                                        <input type="text" class="form-control" id="languages" name="languages"
                                            placeholder="Enter languages">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Patient ID (hidden input) -->
                    <input type="hidden" name="patient_id" value="{{ Auth::user()->id }}">

                    <!-- Submit Button -->
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add Preferences</button>
                        <a href="{{ route('preferences.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>


            @include('patient.layouts.footer')


        </div>
    </main>
    <!-- Global Vendor -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-migrate/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}">
    </script>

    <!-- Initialization  -->
    <script src="{{ asset('assets/js/sidebar-nav.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
