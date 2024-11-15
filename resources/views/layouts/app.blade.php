<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obituary Management</title>

    <!-- Include Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Page content -->
    @yield('content')

    <!-- Data attributes for session messages -->
    <div id="toast-messages"
        data-success="{{ session('success') }}"
        data-error="{{ session('error') }}">
    </div>

    <script>
        // Retrieve success and error messages from the data attributes

        // Ensure Toastr is loaded before using it

        if (typeof toastr !== "undefined") {
            // Retrieve success and error messages from the data attributes
            var successMessage = document.getElementById('toast-messages').getAttribute('data-success');
            var errorMessage = document.getElementById('toast-messages').getAttribute('data-error');

            // Show the success message if it's available
            if (successMessage) {
                toastr.success(successMessage, "Success", {
                    "positionClass": "toast-top-right",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                });
            }

            // Show the error message if it's available
            if (errorMessage) {
                toastr.error(errorMessage, "Error", {
                    "positionClass": "toast-top-right",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                });
            }
        } else {
            console.error('Toastr is not defined. Ensure the library is loaded properly.');
        }
    </script>
</body>

</html>