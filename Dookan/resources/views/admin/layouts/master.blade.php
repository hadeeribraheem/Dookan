<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dookan Admin</title>

    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- Font poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--dataTable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css" />

    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- select 2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    {{-- @if($settings->layout === 'RTL')
         <link rel="stylesheet" href="{{asset('backend/assets/css/rtl.css')}}">
     @endif--}}


<style>
    #toast-container .toast.toast-error {
        background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHOSURBVEhLrZa/SgNBEMZzh0WKCClSCKaIYOED+AAKeQQLG8HWztLCImBrYadgIdY+gIKNYkBFSwu7CAoqCgkkoGBI/E28PdbLZmeDLgzZzcx83/zZ2SSXC1j9fr+I1Hq93g2yxH4iwM1vkoBWAdxCmpzTxfkN2RcyZNaHFIkSo10+8kgxkXIURV5HGxTmFuc75B2RfQkpxHG8aAgaAFa0tAHqYFfQ7Iwe2yhODk8+J4C7yAoRTWI3w/4klGRgR4lO7Rpn9+gvMyWp+uxFh8+H+ARlgN1nJuJuQAYvNkEnwGFck18Er4q3egEc/oO+mhLdKgRyhdNFiacC0rlOCbhNVz4H9FnAYgDBvU3QIioZlJFLJtsoHYRDfiZoUyIxqCtRpVlANq0EU4dApjrtgezPFad5S19Wgjkc0hNVnuF4HjVA6C7QrSIbylB+oZe3aHgBsqlNqKYH48jXyJKMuAbiyVJ8KzaB3eRc0pg9VwQ4niFryI68qiOi3AbjwdsfnAtk0bCjTLJKr6mrD9g8iq/S/B81hguOMlQTnVyG40wAcjnmgsCNESDrjme7wfftP4P7SP4N3CJZdvzoNyGq2c/HWOXJGsvVg+RA/k2MC/wN6I2YA2Pt8GkAAAAASUVORK5CYII=") !important;
    }
</style>
</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        <!-- Navbar Content -->
        @include('admin.layouts.navbar')
        <!-- Navbar Content End-->

        <!-- sidebar Content -->
        @include('admin.layouts.sidebar')
        <!-- sidebar Content -->


        <main id="main">
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
        </main>
    </div>
</div>

{{--
<script src="https://kit.fontawesome.com/c276b48e85.js" crossorigin="anonymous"></script>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

--}}

<script src="{{ asset('js/admin.js') }}"></script>
<!-- font awesome icons -->
<script src="https://kit.fontawesome.com/c276b48e85.js" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- select 2-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- toastr.js -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!--bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!--dataTable-->
<script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
<script>
    new DataTable('#Data_table');
</script>


<!-- Toastr for Validation Errors -->
<script>
    $(document).ready(function() {
        // Toastr configuration with icon settings
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
            "hideMethod": "fadeOut"
        };
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
            @if(Session::has('toastr'))
                toastr.success('{{ Session::get('toastr') }}');
            @endif
    });
</script>

<script>
    $(document).ready(function() {

        // Font Awesome icon classes
        const icons = [
            'fa-solid fa-hard-drive', 'fa-solid fa-microchip', 'fa-solid fa-person-dress', 'fa-solid fa-house',
            'fa-solid fa-house-user', 'fa-solid fa-heart', 'fa-solid fa-droplet', 'fa-solid fa-dumbbell',
            'fa-solid fa-gamepad', 'fa-solid fa-car-side', 'fa-solid fa-book', 'fa-solid fa-heartbeat',
            'fa-solid fa-baby', 'fa-solid fa-shopping-basket', 'fa-solid fa-paw'
        ];

        const dropdown = document.getElementById('icon-dropdown');

        const defaultOption = new Option('Choose an icon', '');
        dropdown.appendChild(defaultOption);

        icons.forEach(iconClass => {
            const option = document.createElement('option');
            option.value = iconClass;
            option.textContent = iconClass.replace('fa-solid fa-', ''); // Remove 'fa-solid fa-' prefix for display
            option.dataset.icon = iconClass;
            dropdown.appendChild(option);
        });

        // Initialize Select2 with icons support
        $('#icon-dropdown').select2({
            templateResult: formatIcon,
            templateSelection: formatIcon,
            escapeMarkup: function (markup) {
                return markup;
            },
            width: '100%'
        });

        // Format icons in the dropdown
        function formatIcon(icon) {
            if (!icon.id) {
                return icon.text; // Return the text for the default option
            }
            const iconClass = $(icon.element).data('icon');
            const iconName = iconClass.replace('fa-solid fa-', ''); // Remove 'fa-solid fa-' prefix for display
            const iconElement = `<i class="${iconClass}"></i>  ${iconName}`;
            return iconElement;
        }
    });

</script>

</body>
</html>
