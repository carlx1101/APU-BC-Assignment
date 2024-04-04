<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <title>View Clinical Notes | {{ env('APP_NAME') }}</title>

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
                        <h1 class="h3">Clinical Notes</h1>
                        <ol class="breadcrumb bg-transparent small p-0">
                            <li class="breadcrumb-item"><a href="{{ route('doctor.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Clinical Notes</li>
                        </ol>
                    </nav>
                </div>
                <!-- End Breadcrumb -->

                <!-- Overall Income -->
                <div class="card mb-4">
                    <!-- Card Header -->
                    <header class="card-header d-md-flex align-items-center justify-content-between">
                        <h2 class="h3 card-header-title">Clinical Note</h2>
                        <h2 class="h4 card-header-title">{{
                            \Carbon\Carbon::parse($data->assessment_datetime)->format('l, F j, Y \a\t h:i A') }}</h2>
                    </header>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="form-group mb-4">
                            Patient Name: {{ $data->patient_name }}
                        </div>


                        <div class="form-group mb-4">
                            <label for="">Diagnosis</label>
                            <textarea class="form-control" name="diagnosis" cols="30" rows="10"
                                disabled>{{ $data->diagnosis }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Procedures</label>
                            <textarea class="form-control" name="procedures" cols="30" rows="10"
                                disabled>{{ $data->procedures }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Assesment Findings</label>
                            <textarea class="form-control" name="assessment_findings" cols="30" rows="10"
                                disabled>{{ $data->assessment_findings }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Treatment Plan</label>
                            <textarea class="form-control" name="treatment_plan" cols="30" rows="10"
                                disabled>{{ $data->treatment_plan }}</textarea>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Referral</label>
                                    <input name="referrals" class="form-control" type="text" placeholder=""
                                        value="{{ $data->referrals }}" disabled>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Patient Education</label>
                                    <input name="patient_education" class="form-control" type="text" placeholder=""
                                        disabled value="{{ $data->patient_education }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Risk Management</label>
                            <textarea class="form-control" name="risks_management" cols="30" rows="10"
                                disabled>{{ $data->risks_management }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Follow-up Recommendation</label>
                            <textarea class="form-control" name="follow_up_recommendations" cols="30" rows="3"
                                disabled>{{ $data->follow_up_recommendations }}</textarea>
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