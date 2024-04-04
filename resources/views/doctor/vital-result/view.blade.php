<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <title>Vital Result | {{ env('APP_NAME') }}</title>

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
                        <h1 class="h3">Vital Result</h1>
                        <ol class="breadcrumb bg-transparent small p-0">
                            <li class="breadcrumb-item"><a href="{{ route('doctor.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Vital Result</li>
                        </ol>
                    </nav>
                </div>
                <!-- End Breadcrumb -->

                <!-- Overall Income -->
                <div class="card mb-4">
                    <!-- Card Header -->
                    <header class="card-header d-md-flex align-items-center">
                        <h2 class="h3 card-header-title">Vital Result</h2>
                    </header>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <div class="d-flex justify-content-between mb-4">
                                <p>Patient Name: <b>{{ $data->patient_name }}</b></p>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Blood Pressure</label>
                                        <input name="blood_pressure" class="form-control form-pill" type="number"
                                            placeholder="" value="{{ $data->blood_pressure }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Heart Rate</label>
                                        <input name="heart_rate" class="form-control form-pill" type="number"
                                            placeholder="" value="{{ $data->heart_rate }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Respiratory Rate</label>
                                        <input name="respiratory_rate" class="form-control form-pill" type="number"
                                            placeholder="" value="{{ $data->respiratory_rate }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Temperature</label>
                                        <input name="temperature" class="form-control form-pill" type="number"
                                            placeholder="" value="{{ $data->temperature }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Oxygen Saturation</label>
                                        <input name="oxygen_saturation" class="form-control form-pill" type="number"
                                            placeholder="" value="{{ $data->oxygen_saturation }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">BMI</label>
                                        <input name="BMI" class="form-control form-pill" type="number" placeholder=""
                                            value="{{ $data->BMI }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Weight</label>
                                        <input name="weight" class="form-control form-pill" type="number" placeholder=""
                                            value="{{ $data->weight }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Height</label>
                                        <input name="height" class="form-control form-pill" type="number" placeholder=""
                                            value="{{ $data->height }}" disabled>
                                    </div>
                                </div>
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