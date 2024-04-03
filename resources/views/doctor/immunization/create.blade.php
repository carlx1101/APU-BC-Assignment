<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <title>Add Immunization Record | {{ env('APP_NAME') }}</title>

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
                        <h2 class="h3 card-header-title">Immunization Form</h2>
                    </header>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <form action="{{ route('doctor.immunization.store') }}" method="POST">
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

                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Vaccine Name</label>
                                        <input name="vaccine_name" class="form-control" type="text"
                                            placeholder="Vaccine Name">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Date of Immunization</label>
                                        <input name="date_of_immunization" class="form-control" type="date"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Lot Number</label>
                                        <input name="lot_number" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Dose Number</label>
                                        <input name="dose_number" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Manufacturer</label>
                                        <input name="manufacturer" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Administration Route</label>
                                        <input name="administration_route" class="form-control" type="text"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Anatomical Site</label>
                                        <input name="anatomical_site" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Adverse Reaction</label>
                                        <input name="adverse_reaction" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Next Due Date</label>
                                        <input name="next_due_date" class="form-control" type="date" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Vaccination Status</label>
                                        <input name="vaccination_status" class="form-control" type="text"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Patient Consent</label>
                                        <input name="patient_consent" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="">Contraindications</label>
                                <textarea class="form-control" name="contraindications" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Vaccination Schedule</label>
                                <textarea class="form-control" name="vaccination_schedule" cols="5" rows="3"></textarea>
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