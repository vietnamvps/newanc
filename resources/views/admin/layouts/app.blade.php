<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME')}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <livewire:styles />
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    @include('admin.inc.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

            @include('admin.inc.sidebar')
            <!-- /.sidebar-menu -->

    <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        {{ $slot }}
    </div>
        <!-- /.content -->
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
        @include('admin.inc.footer')
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{ asset('assets/js/adminlte.js')}}"></script>

<script src="{{ asset('assets/plugins/toastr/toastr.min.js' )}}"></script>

<script>
    $(document).ready(function () {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
        }

        window.addEventListener('hide-form', event => {
            $('#form').modal('hide');
            toastr.success(event.detail.message, 'Thành công!');
        });
    });
</script>

<script>
    window.addEventListener('show-form', event => {
        $('#form').modal('show');
    })

    window.addEventListener('show-delete-modal', event => {
        $('#confirmationModal').modal('show');
    })

    window.addEventListener('hide-delete-modal', ecent => {
        $('#confirmationModal').modal('hide');
        toastr.success(event.detail.message, 'Thành công!');
    })
</script>
<livewire:scripts />
</body>
</html>
