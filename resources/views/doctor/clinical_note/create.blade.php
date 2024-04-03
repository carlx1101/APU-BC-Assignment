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
                        <h2 class="h3 card-header-title">Clinical Note Form</h2>
                    </header>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <form action="{{ route('doctor.clinical-note.store') }}" method="POST">
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
                                <label for="">Diagnosis</label>
                                <textarea class="form-control" name="diagnosis" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Procedures</label>
                                <textarea class="form-control" name="procedures" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Assesment Findings</label>
                                <textarea class="form-control" name="assessment_findings" cols="30"
                                    rows="10"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Treatment Plan</label>
                                <textarea class="form-control" name="treatment_plan" cols="30" rows="10"></textarea>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Referral</label>
                                        <input name="referrals" class="form-control" type="text"
                                            placeholder="Referal Name">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Patient Education</label>
                                        <input name="patient_education" class="form-control" type="text"
                                            placeholder="Patient Education">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Risk Management</label>
                                <textarea class="form-control" name="risks_management" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Follow-up Recommendation</label>
                                <textarea class="form-control" name="follow_up_recommendations" cols="30"
                                    rows="3"></textarea>
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