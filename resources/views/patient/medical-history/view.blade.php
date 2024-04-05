<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <title>View Medical History | {{ env('APP_NAME') }}</title>

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

    @include('patient.layouts.header')
    <main class="u-main" role="main">


        @include('patient.layouts.sidebar')

        <div class="u-content">
            @include('components.alert')
            <div class="u-body">

                <!-- End Breadcrumb -->
                <div class="mb-4">
                    <nav aria-label="breadcrumb">
                        <h1 class="h3">Medical History</h1>
                        <ol class="breadcrumb bg-transparent small p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Medical History</li>
                        </ol>
                    </nav>
                </div>
                <!-- End Breadcrumb -->

                <!-- Overall Income -->
                <div class="card mb-4">
                    <!-- Card Header -->
                    <header class="card-header d-md-flex align-items-center justify-content-between">
                        <h2 class="h3 card-header-title">Medical History</h2>
                    </header>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="form-group mb-4">
                            Patient Name: {{ $data->patient_name }}
                        </div>


                        <div class="form-group mb-4">
                            <label for="">Diagnosis Record</label>
                            <textarea class="form-control" name="diagnosis_record" cols="30" rows="10"
                                disabled>{{ $data->diagnosis_record }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Treatment Detail</label>
                            <textarea class="form-control" name="treatment_details" cols="30" rows="10"
                                disabled>{{ $data->treatment_details }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Surgery</label>
                            <textarea class="form-control" name="surgery" cols="30" rows="10"
                                disabled>{{ $data->surgery }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Hospitalization History</label>
                            <textarea class="form-control" name="hospitalization_history" cols="30" rows="10"
                                disabled>{{ $data->hospitalization_history }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Chronic Conditions</label>
                            <textarea class="form-control" name="chronic_conditions" cols="30" rows="10"
                                disabled>{{ $data->chronic_conditions }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Family Medical History</label>
                            <textarea class="form-control" name="family_medical_history" cols="30" rows="3"
                                disabled>{{ $data->family_medical_history }}</textarea>
                        </div>
                    </div>
                    <!-- End Card Body -->
                </div>
                <!-- End Overall Income -->
            </div>


            @include('patient.layouts.footer')

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