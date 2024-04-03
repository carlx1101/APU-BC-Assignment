<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <title>Create Clinical Notes | {{ env('APP_NAME') }}</title>

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

                <!-- Overall Income -->
                <div class="card mb-4">
                    <!-- Card Header -->
                    <header class="card-header d-md-flex align-items-center">
                        <h2 class="h3 card-header-title">Vital Result Form</h2>
                    </header>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <form action="{{ route('doctor.vital-result.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="card-body">
                            <div class="form-group mb-4">
                                <label for="">Select Patient</label>
                                <select name="patient_id" class="form-control">
                                    <option value="" selected>Select a patient</option>
                                    @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Only for existing patients.
                                    <span class="text-danger"> NOTE: The
                                        information will be shared among hospital providers!</span>
                                </small>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Blood Pressure</label>
                                        <input name="blood_pressure" class="form-control form-pill" type="number"
                                            placeholder="Blood Pressure">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Heart Rate</label>
                                        <input name="heart_rate" class="form-control form-pill" type="number"
                                            placeholder="Heart Rate">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Respiratory Rate</label>
                                        <input name="respiratory_rate" class="form-control form-pill" type="number"
                                            placeholder="Respiratory Rate">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Temperature</label>
                                        <input name="temperature" class="form-control form-pill" type="number"
                                            placeholder="Temperature (°C)">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Oxygen Saturation</label>
                                        <input name="oxygen_saturation" class="form-control form-pill" type="number"
                                            placeholder="Oxygen Saturation">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">BMI</label>
                                        <input name="BMI" class="form-control form-pill" type="number"
                                            placeholder="BMI">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Weight</label>
                                        <input name="weight" class="form-control form-pill" type="number"
                                            placeholder="Weight (KG)">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Height</label>
                                        <input name="height" class="form-control form-pill" type="number"
                                            placeholder="Height">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Card Body -->

                        <footer class="card-footer d-flex justify-content-end">
                            <div class="col-md-4">
                                <button class="btn btn-primary btn-block" type="submit">Submit</button>
                            </div>
                        </footer>
                    </form>
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