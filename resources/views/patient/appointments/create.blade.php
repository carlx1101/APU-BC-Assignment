<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <title>Register Provider</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="Bootstrap Theme, Freebies, Dashboard, MIT license">
    <meta name="description" content="Stream - Dashboard UI Kit">
    <meta name="author" content="htmlstream.com">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">

    <!-- Web Fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Components Vendor Styles -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">

    <!-- Theme Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">

    <style>
        .time-picker-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            gap: 10px;
        }

        .time-slot {
            padding: 10px;
            background-color: white;
            color: black;
            border-width: 1px;
            border-radius: 5px;
            cursor: pointer;
        }

        .time-slot.active {
            color: white;
            background-color: #0056b3;
        }
    </style>
</head>
<!-- End Head -->

<body>

    @include('patient.layouts.header')
    <main class="u-main" role="main">


        @include('patient.layouts.sidebar')

        <div class="u-content">
            <div class="u-body">
                <!-- Breadcrumb -->
                <div class="mb-4">
                    <nav aria-label="breadcrumb">
                        <h1 class="h3">Book Appointment</h1>
                        <ol class="breadcrumb bg-transparent small p-0">
                            <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Book Appointment</li>
                        </ol>
                    </nav>
                </div>
                <!-- End Breadcrumb -->

                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf

                    <!-- Appointment Details -->
                    <div class="row">
                        <!-- Select Date and Time -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <header class="card-header">
                                    <h2 class="h3 card-header-title">Select Date and Time</h2>
                                </header>
                                <div class="card-body">
                                    <!-- Date -->
                                    <div class="form-group mb-4">
                                        <label for="appointmentDate">Date</label>
                                        <input id="appointmentDate" class="form-control" type="date" name="appointment_date" required 
                                        min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" 
                                        max="{{ \Carbon\Carbon::now()->addWeeks(4)->format('Y-m-d') }}">
                                    </div>

                                    <!-- Time -->
                                    <div class="form-group mb-4">
                                        <label for="appointmentTime">Time</label>
                                        <div id="timePicker" class="time-picker-grid">
                                            @for ($i = 7; $i <= 20; $i++)
                                                @if ($i != 13) <!-- Exclude hour 13 -->
                                                    <button type="button" class="time-slot" data-time="{{ sprintf('%02d', $i) }}:00">
                                                        {{ sprintf('%02d', $i) }}:00
                                                    </button>
                                                @endif
                                            @endfor
                                        </div>
                                        <input type="hidden" id="appointmentTime" name="appointment_time" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Select Branch and Doctor -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <header class="card-header">
                                    <h2 class="h3 card-header-title">Select Branch and Doctor</h2>
                                </header>
                                <div class="card-body">
                                    <!-- Branch -->
                                    <div class="form-group mb-4">
                                        <label for="branch">Branch</label>
                                        <select id="branch" class="form-control" name="branch_id" required>
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Doctor -->
                                    <div class="form-group mb-4">
                                        <label for="doctor">Doctor</label>
                                        <select id="doctor" class="form-control" name="doctor_id" required>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Patient ID (hidden input) -->
                    <input type="hidden" name="patient_id" value="{{ Auth::user()->id }}">
                    <!-- Status (hidden input) -->
                    <input type="hidden" name="status" value="pending">

                    <!-- Submit Button -->
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Book Appointment</button>
                        <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>


            @include('admin.layouts.footer')


        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const timeSlots = document.querySelectorAll('.time-slot');
            const timeInput = document.getElementById('appointmentTime');

            timeSlots.forEach(slot => {
                slot.addEventListener('click', () => {
                    timeSlots.forEach(btn => btn.classList.remove('active'));
                    slot.classList.add('active');
                    timeInput.value = slot.getAttribute('data-time');
                });
            });
        });
    </script>
    <!-- Global Vendor -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-migrate/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}">
    </script>

    <!-- Initialization  -->
    <script src="{{ asset('assets/js/sidebar-nav.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
