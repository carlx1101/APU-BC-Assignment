<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <title>Create Medical History | {{ env('APP_NAME') }}</title>

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

                <!-- Overall Income -->
                <form action="{{ route('patient.medical-history.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card mb-4">
                        <!-- Card Header -->
                        <header class="card-header d-md-flex align-items-center justify-content-between">
                            <h2 class="h3 card-header-title">Medical History Form</h2>

                            <div class="form-group mb-0">
                                <label class="d-flex align-items-center justify-content-start">
                                    <span class="form-label-text mr-4">Share in Network</span>

                                    <div class="form-toggle">
                                        <input name="share_in_blockchain" type="checkbox">

                                        <div class="form-toggle__item">
                                            <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </header>
                        <!-- End Card Header -->

                        <!-- Card Body -->

                        <div class="card-body">

                            <div class="form-group mb-4">
                                <label for="">Diagnosis Record</label>
                                <textarea class="form-control" name="diagnosis_record" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Treatment Detail</label>
                                <textarea class="form-control" name="treatment_details" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Surgery</label>
                                <textarea class="form-control" name="surgery" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Hospitalization History</label>
                                <textarea class="form-control" name="hospitalization_history" cols="30"
                                    rows="10"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Chronic Conditions</label>
                                <textarea class="form-control" name="chronic_conditions" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Family Medical History</label>
                                <textarea class="form-control" name="family_medical_history" cols="30"
                                    rows="10"></textarea>
                            </div>
                        </div>
                        <!-- End Card Body -->

                        <footer class="card-footer d-flex justify-content-end">
                            <div class="col-md-4">
                                <button class="btn btn-primary btn-block" type="submit">Submit</button>
                            </div>
                        </footer>
                    </div>
                </form>
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