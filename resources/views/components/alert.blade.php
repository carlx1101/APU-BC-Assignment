<div class="container mt-3">
    <!-- Success -->
    @if(session('success'))
    <div class="alert alert-success fade show" role="alert" id="successAlert">
        <i class="fa fa-check-circle alert-icon mr-3"></i>
        <span>{{ session('success') }}</span>
        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <!-- End Success -->

    <!-- Danger -->
    @if(session('error'))
    <div class="alert alert-danger fade show" role="alert" id="errorAlert">
        <i class="fa fa-minus-circle alert-icon mr-3"></i>
        <span>{{ session('error') }}</span>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <!-- End Danger -->
</div>

<script>
    // Auto-hide the alerts after 5 seconds
    setTimeout(function() {
        $('#successAlert').fadeOut('slow');
        $('#errorAlert').fadeOut('slow');
    }, 5000);
</script>