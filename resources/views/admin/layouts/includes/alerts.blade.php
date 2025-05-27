@if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                    popup: 'swal-toast'
                }
            });
        });
    </script>
@endif


<!-- in your blade layout file -->
@if (session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                    popup: 'swal-toast'
                }
            });
        });
    </script>
@endif


@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const errorMessage = `{{ $errors->first() }}`; // show only first error in toast

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'warning',
                title: errorMessage,
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                customClass: {
                    popup: 'swal-toast'
                }
            });
        });
    </script>
@endif
