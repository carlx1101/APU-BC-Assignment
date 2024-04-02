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
                <!-- End Breadcrumb -->
                <div class="mb-4">
                    <nav aria-label="breadcrumb">
                        <h1 class="h3">Modify Preferences</h1>
                        <ol class="breadcrumb bg-transparent small p-0">
                            <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Modify Preferences</li>
                        </ol>
                    </nav>
                </div>
                <!-- End Breadcrumb -->

                <form action="{{ route('preferences.update', $preference->id) }}" method="POST">
                    @csrf
                    @method('PUT') {{-- Laravel requires this method directive for update operations --}}

                    <!-- Form Controls for Editing Preferences -->
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <header class="card-header">
                                    <h2 class="h3 card-header-title">Modify Preferences</h2>
                                </header>

                                <div class="card-body">
                                    <!-- Hobbies -->
                                    <div class="form-group mb-4">
                                        <label for="hobbies">Hobbies</label>
                                        <input type="text" class="form-control" id="hobbies" name="hobbies"
                                            placeholder="Enter hobbies" value="{{ $preference->hobbies }}" required>
                                    </div>

                                    <!-- Sports -->
                                    <div class="form-group mb-4">
                                        <label for="sports">Sports</label>
                                        <input type="text" class="form-control" id="sports" name="sports"
                                            placeholder="Enter sports" value="{{ $preference->sports }}" required>
                                    </div>

                                    <!-- Languages -->
                                    <div class="form-group mb-4">
                                        <label for="languages">Languages</label>
                                        <input type="text" class="form-control" id="languages" name="languages"
                                            placeholder="Enter languages" value="{{ $preference->languages }}" required>
                                    </div>

                                    <!-- Patient ID (hidden input) -->
                                    <input type="hidden" name="patient_id" value="{{ Auth::user()->id }}">

                                    <!-- Actions -->
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Update Preferences</button>
                                        <a href="{{ route('preferences.index') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
