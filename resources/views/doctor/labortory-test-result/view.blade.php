<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <title>Labortory Test Result | {{ env('APP_NAME') }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="Bootstrap Theme, Freebies, Dashboard, MIT license">
    <meta name="description" content="Stream - Dashboard UI Kit">
    <meta name="author" content="htmlstream.com">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

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

    @include('doctor.layouts.header')
    <main class="u-main" role="main">


        @include('doctor.layouts.sidebar')

        <div class="u-content">
            @include('components.alert')
            <div class="u-body">
                <!-- End Breadcrumb -->
                <div class="mb-4">
                    <nav aria-label="breadcrumb">
                        <h1 class="h3">Labortory Test</h1>
                        <ol class="breadcrumb bg-transparent small p-0">
                            <li class="breadcrumb-item"><a href="{{ route('doctor.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Labortory Test</li>
                        </ol>
                    </nav>
                </div>
                <!-- End Breadcrumb -->

                <!-- Overall Income -->
                <div class="card mb-4">
                    <!-- Card Header -->
                    <header class="card-header d-md-flex align-items-center">
                        <h2 class="h3 card-header-title">Labortory Test</h2>
                    </header>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <div class="d-flex justify-content-between mb-4">
                                <p>Patient Name: <b>{{ $data->patient_name }}</b></p>
                                <p>Physician Attendant Name: <b>{{ $data->physician_attendant_name }}</b></p>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Test Type</label>
                                        <input id="" class="form-control" type="text" placeholder="Ex. X-ray Scan"
                                            name="test_type" value="{{ $data->test_type }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Test Date</label>
                                        <input id="" class="form-control" type="date" placeholder="Date of Examination"
                                            name="test_date" value="{{ $data->test_date }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group mb-4">
                                        <label for="">Results</label>
                                        <input id="" class="form-control form-pill" type="text"
                                            placeholder="Ex. Fracture" name="test_result"
                                            value="{{ $data->test_result }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group mb-4">
                                        <label for="">Reference Range</label>
                                        <input id="" class="form-control form-pill" type="text"
                                            placeholder="Ex. 10-20 ml" name="reference_range"
                                            value="{{ $data->reference_range }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Testing Facility</label>
                                <input id="" class="form-control" type="text" placeholder="Ex. Pantai Hospital Level. 8"
                                    name="testing_facility" value="{{ $data->testing_facility }}" disabled>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Interpretation</label>
                                <textarea class="form-control" name="interpretation" cols="30" disabled
                                    rows="10">{{ $data->interpretation }}</textarea>
                            </div>
                        </div>
                        <!-- End Card Body -->

                    </div>
                    <!-- End Overall Income -->
                </div>


                @include('doctor.layouts.footer')

            </div>
    </main>

    <!-- Global Vendor -->
    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-migrate/jquery-migrate.min.js')}}"></script>
    <script src="{{asset('assets/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}">
    </script>

    <!-- Initialization  -->
    <script src="{{asset('assets/js/sidebar-nav.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>