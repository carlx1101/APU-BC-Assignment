<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <title>Add Medication | {{ env('APP_NAME') }}</title>

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
                        <h2 class="h3 card-header-title">Medication Form</h2>
                    </header>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <form action="{{ route('doctor.medication.store') }}" method="POST">
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
                                <small class="form-text text-muted">Only for existing patients.</small>
                            </div>

                            <div class="form-group">
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

                            <div class="form-group mb-4">
                                <label for="">Medication Name</label>
                                <input id="" class="form-control" type="text" placeholder="Ex. Paracetamol"
                                    name="medication_name">
                            </div>
                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group mb-4">
                                        <label for="">Dosage</label>
                                        <input id="" class="form-control form-pill" type="text"
                                            placeholder="Ex. 2 pills per serving" name="dosage">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group mb-4">
                                        <label for="">Frequency</label>
                                        <input id="" class="form-control form-pill" type="text"
                                            placeholder="Ex. Twice per day" name="frequency">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group mb-4">
                                        <label for="">Start Date</label>
                                        <input id="" class="form-control" type="date" placeholder="Start Date"
                                            name="start_date">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group mb-4">
                                        <label for="">End Date</label>
                                        <input id="" class="form-control" type="date" placeholder="End Date"
                                            name="end_date">
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