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

                <!-- Vital Result -->
                <div class="card mb-4">
                    <header class="card-header d-md-flex align-items-center">
                        <h2 class="h3 card-header-title">Vital Result</h2>
                        <a class="btn btn-primary ml-md-auto"
                            href="{{ route('doctor.vital-result.create') }}">Create</a>
                    </header>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Patient Name</th>
                                        <th scope="col">Blood Pressure</th>
                                        <th scope="col">Heart Rate</th>
                                        <th scope="col">Respitory Rate</th>
                                        <th scope="col">Temperature</th>
                                        <th scope="col">Oxygen Saturation</th>
                                        <th scope="col">Weight</th>
                                        <th scope="col">Height</th>
                                        <th scope="col">BMI</th>
                                        <th scope="col">Measurement Date</th>
                                        <th class="text-center" scope="col">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($vitalResults as $vitalResult)
                                    <tr>
                                        <td>{{ $vitalResult->id }}</td>
                                        <td>{{ $vitalResult->patient->name }}</td>
                                        <td>{{ $vitalResult->blood_pressure }}</td>
                                        <td>{{ $vitalResult->heart_rate }}</td>
                                        <td>{{ $vitalResult->respiratory_rate }}</td>
                                        <td>{{ $vitalResult->temperature }}</td>
                                        <td>{{ $vitalResult->oxygen_saturation }}</td>
                                        <td>{{ $vitalResult->weight }}</td>
                                        <td>{{ $vitalResult->height }}</td>
                                        <td>{{ $vitalResult->BMI }}</td>
                                        <td>{{ \Carbon\Carbon::parse($vitalResult->measurement_datetime)->format('l, F
                                            j, Y \a\t g:i A') }}</td>
                                        <td class="text-center">
                                            <a id="actions1Invoker" class="link-muted" href="#!" aria-haspopup="true"
                                                aria-expanded="false" data-toggle="dropdown">
                                                <i class="fa fa-sliders-h"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right dropdown"
                                                style="width: 150px;" aria-labelledby="actions1Invoker">
                                                <ul class="list-unstyled mb-0">
                                                    @isset($vitalResult->global_hash)
                                                    <li>
                                                        <a class="d-flex align-items-center link-muted py-2 px-3"
                                                            href="javascript:void(0);"
                                                            onclick="navigator.clipboard.writeText('{{ $vitalResult->global_hash }}').then(() => alert('Link copied to clipboard!'));">
                                                            <i class="fa fa-clipboard mr-2"></i> Copy link
                                                        </a>
                                                    </li>
                                                    @endisset
                                                    @isset($vitalResult->hash_value)
                                                    <li>
                                                        <a class="d-flex align-items-center link-muted py-2 px-3"
                                                            href="javascript:void(0);"
                                                            onclick="navigator.clipboard.writeText('{{ $vitalResult->hash_value }}').then(() => alert('Link copied to clipboard!'));">
                                                            <i class="fa fa-clipboard mr-2"></i> Copy link (Asymmetric)
                                                        </a>
                                                    </li>
                                                    @endisset
                                                    <li>
                                                        <a class="d-flex align-items-center link-muted py-2 px-3 send-modal-btn"
                                                            data-toggle="modal" data-vital-id="{{ $vitalResult->id }}"
                                                            href="#exampleModal">
                                                            <i class="fa fa-share-square mr-2"></i> Send
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="d-flex align-items-center link-muted py-2 px-3"
                                                            href="#!">
                                                            <i class="fa fa-minus mr-2"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Vital Result -->
            </div>


            @include('doctor.layouts.footer')

        </div>
    </main>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="POST" id="recipientForm">
                @csrf
                @method('POST')

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Share Vital Record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-4">
                            <label for="">Select Recipient</label>
                            <select name="recipient_id" class="form-control">
                                <option value="" selected>Select a recipient</option>
                                @foreach ($recipientList as $recipient)
                                <option value="{{ $recipient->id }}">{{ $recipient->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Only the selected recipient will be able to view the
                                information.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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

    <script>
        $(document).ready(function() {
                    $('.send-modal-btn').on('click', function(e) {
                    e.preventDefault();
                    
                    let vitalId = $(this).data('vital-id');
                    
                    $('#recipientForm').attr('action', `/doctor/vital-result/${vitalId}/share`);
                    $('#exampleModal').modal('show');
                    });
                    
                    $('#exampleModal').on('hidden.bs.modal', function() {
                    $('#recipientForm').attr('action', '');
                    });
                    });
    </script>
</body>

</html>