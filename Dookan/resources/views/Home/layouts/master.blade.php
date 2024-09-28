<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- Roboto font --->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
@if (Request::route()->getName() === 'login'||Request::route()->getName() === 'register')
    @include('Home.layouts.header')
@else
    @include('Home.layouts.header')
    @include('Home.layouts.navbar')
@endif

{{--@if (Request::route()->getName() === 'profile')
    --}}{{--@include('Home.layouts.profile_sideBar')--}}{{--
@endif--}}
@if(View::hasSection('sidebar'))
    <div class="wrapper">
        @yield('sidebar')
        <div>
            @yield('content')
        </div>
    </div>
@else
    <div class="content">
        @yield('content')
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Font awesome -->
<script src="https://kit.fontawesome.com/c276b48e85.js" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Attach event listeners only once
        document.querySelectorAll('.increment-btn').forEach(button => {
            button.onclick = function() {
                let itemId = this.dataset.id;
                let itemPrice = parseFloat(this.dataset.price);
                let maxQuantity = parseInt(this.dataset.max);
                let quantityInput = document.getElementById('quantity-' + itemId);
                let currentQuantity = parseInt(quantityInput.value);

                if (currentQuantity < maxQuantity) {
                    currentQuantity += 1;
                    quantityInput.value = currentQuantity;
                    updateItemTotal(itemId, currentQuantity, itemPrice);
                    updateTotalPrice();
                }
            };
        });

        document.querySelectorAll('.decrement-btn').forEach(button => {
            button.onclick = function() {
                let itemId = this.dataset.id;
                let itemPrice = parseFloat(this.dataset.price);
                let quantityInput = document.getElementById('quantity-' + itemId);
                let currentQuantity = parseInt(quantityInput.value);

                if (currentQuantity > 1) {
                    currentQuantity -= 1;
                    quantityInput.value = currentQuantity;
                    updateItemTotal(itemId, currentQuantity, itemPrice);
                    updateTotalPrice();
                }
            };
        });

        function updateItemTotal(itemId, quantity, price) {
            let itemPriceElement = document.getElementById('item-price-' + itemId);
            let newItemPrice = quantity * price;
            itemPriceElement.innerText = '$' + newItemPrice.toFixed(2);
        }

        function updateTotalPrice() {
            let total = 0;
            document.querySelectorAll('.price').forEach(function(itemPriceElement) {
                let price = parseFloat(itemPriceElement.innerText.replace('$', ''));
                total += price;
            });

            document.getElementById('total-price').innerText = '$' + total.toFixed(2);
            document.getElementById('final-price').innerText = '$' + (total + 5).toFixed(2); // Add shipping
        }

        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function () {
            document.querySelector("#sidebar").classList.toggle("expand");
        });


    });
    document.addEventListener('scroll', function() {
        const sidebar = document.getElementById('sidebar');
        const scrollPosition = window.scrollY;

        if (scrollPosition > 50) {
            sidebar.style.marginTop = '50px';
        } else {
            sidebar.style.marginTop = '0px';
        }
    });
    /*const hamBurger = document.querySelector(".toggle-btn");
    console.log(hamBurger);
    hamBurger.addEventListener("click", function () {
        console.log('test sidebar');
        document.querySelector("#sidebar").classList.toggle("expand");
    });*/
/*
    document.addEventListener('DOMContentLoaded', function() {
        const hamBurger = document.querySelector(".toggle-btn");
        console.log(hamBurger);

        hamBurger.addEventListener("click", function () {
            document.querySelector("#sidebar").classList.toggle("expand");
            console.log(document.querySelector("#sidebar"))
        });
    });
*/
</script>
@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
        toastr.error('{{ $error }}');
        @endforeach
    </script>
@endif
</body>
</html>
