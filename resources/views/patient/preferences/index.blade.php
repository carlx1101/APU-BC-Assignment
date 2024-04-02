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
                        <h1 class="h3">Personal Preferences</h1>
                        <ol class="breadcrumb bg-transparent small p-0">
                            <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Personal Preferences</li>
                        </ol>
                    </nav>
                </div>
                <!-- End Breadcrumb -->

                <div class="container">
                    <!-- Patient Information -->
                    <div class="card mb-4">
                        <header class="card-header d-flex justify-content-between align-items-center">
                            <h2 class="h3 card-header-title mb-0">Patient Preferences</h2>
                            @if ($preferences->isEmpty())
                                <a href="{{ route('preferences.create') }}" class="btn btn-sm btn-success">Create
                                    Preferences</a>
                            @else
                                <a href="{{ route('preferences.edit', $preferences->first()->id) }}"
                                    class="btn btn-sm btn-primary">Edit Preferences</a>
                            @endif
                        </header>
                        <div class="card-body">
                            <p><strong>Name:</strong> John Doe</p>
                            {{-- @foreach ($preferences as $preference) --}}
                            @if ($preferences->isEmpty())
                                <p><strong>Hobbies:</strong>-</p>
                                <p><strong>Sports:</strong>-</p>
                                <p><strong>Languages:</strong>-</p>
                            @else
                                <p><strong>Hobbies:</strong> {{ $preferences->first()->hobbies }}</p>
                                <p><strong>Sports:</strong> {{ $preferences->first()->sports }}</p>
                                <p><strong>Languages:</strong> {{ $preferences->first()->languages }}</p>
                                <div class="text-right">
                                    <form action="{{ route('preferences.destroy', $preferences->first()->id) }}"
                                        method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            @endif
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>


            @include('patient.layouts.footer')


        </div>
    </main>

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
