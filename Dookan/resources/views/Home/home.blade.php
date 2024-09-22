<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>Dookan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>

<!--============================
    HEADER START
==============================-->
<header>
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo Section (Always Visible) -->
            <div class="col-12 col-md-2">
                <div class="logo">
                    <a class="company_logo" href="{{ route('home') }}">
                        <img src="{{ asset('images/logos/Dookan_logo.png') }}" alt="logo" class="img-fluid w-50">
                    </a>
                </div>
            </div>

            <!-- Search Bar and Icons Section (Hidden on Mobile) -->
            <div class="col-md-8 d-none d-md-flex">
                <!-- Search Bar -->
                <div class="search-bar w-100 d-flex">
                    <input type="text" class="form-control search-input" placeholder="Search for items and inspiration">
                    <button class="search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <!-- Icons Section (Hidden on Mobile) -->
            <div class="col-md-2 text-right d-none d-md-flex justify-content-end">
                <div class="header-icons">
                    <a href="#"><i class="fas fa-user"></i></a> <!-- User Icon -->
                    <a href="#"><i class="fas fa-heart"></i></a> <!-- Wishlist Icon -->
                    <a href="#"><i class="fas fa-shopping-bag"></i></a> <!-- Cart Icon -->
                </div>
            </div>
        </div>
    </div>
</header>
<!--============================
    HEADER END
==============================-->

<!--============================
    Navbar START
==============================-->
<!-- Navbar -->
<!-- Sticky Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <!-- Sidebar Toggle (only for mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Explore
                    </a>
                    <!-- Sidebar Dropdown Menu -->
                    <div class="sidebar-dropdown">
                        <a href="#"><i class="fas fa-tshirt"></i> Fashion</a>
                        <a href="#"><i class="fas fa-tv"></i> Electronics</a>
                        <a href="#"><i class="fas fa-couch"></i> Furniture</a>
                        <a href="#"><i class="fas fa-mobile-alt"></i> Smart Phones</a>
                        <a href="#"><i class="fas fa-home"></i> Home & Garden</a>
                        <a href="#"><i class="fas fa-camera"></i> Accessories</a>
                        <a href="#"><i class="fas fa-heartbeat"></i> Health & Beauty</a>
                        <a href="#"><i class="fas fa-gamepad"></i> Toy & Games</a>
                        <a href="#"><i class="fas fa-gem"></i> View All Categories</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Vendors</a>
                </li>

            </ul>
            <!-- Right Aligned Links -->

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--============================
    Navbar END
==============================-->
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-2 col-12">
            <!-- product card -->
            <div class="product-card">
                <div class="product-image">
                    <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAJQA4gMBIgACEQEDEQH/xAAcAAAABwEBAAAAAAAAAAAAAAAAAgMEBQYHAQj/xAA+EAABAwMCBAMFBgQEBwEAAAABAAIDBAUREiEGMUFREyJhFDJxgZEHFUJSobFyweHwIzNi0SU0U2OSovEk/8QAGQEAAwEBAQAAAAAAAAAAAAAAAAECAwQF/8QAIhEAAgICAgIDAQEAAAAAAAAAAAECEQMhEjETQQQyUWEi/9oADAMBAAIRAxEAPwBhw5bay0XZz5YSWaMZaFLVdDJPJLXTg5J8o7BWyOWlm90t1fuu1FF4sBZjYrLMptf4HHjWyJu5xw9l22GhK2fDrK3Tv5CluIba+WzupoAS4t2SVlp5qWyBkzSC1pytkzI5bIg63AnlgpIULfZDjmQlbC/xbYMDoU9ZGW07dTemEOmNOiuy29ulo0jJIVs4atsUEGC0fRRr42l0e3UKx0TdMbNO2VPEpSshuJrVFUs2YM5VJq6E2q4UksTD74Gw9VqMzA+TzjZMrnR0hfC6ZrQARgkKZR/CkybtQc+maXDmE+LNkjRvjETA05GOickjfCuxUItac88JYBJNPmS2figDh5Inm/MPojE5XCEAAE9TlAkop2QGSmI75vzLoK5hDPxQB056HC5v3yujdBIZwhFcM8kbPoggBItPU5RS1LO2RMj1RYqE9DuhwiOGkEkjZJXKtZRQOmkOlrRklUO8faFTtDm0gMh7nkk5pdktlzNxiBILtwgsZk4puD5HO8RoyScLqy8/8FYxsV0r47tBD47nROkwWuWm8Q3llmoYJZDgEgE/FZba24vdNj/rK/faKzVZYh/qauhoSbLHYrhHdqITjzRkZBynjHQVETooyMYwQFWeBG44ZbjY6TjCb8GVE76q4NmfqDJiBnslRSZZ6e3RUzQ1oA3zgJSviPszQxvJR1DdPHuVTC4HETgFLQ1sU0j4z+EqHG3ZSeiDAcJWB7TzVkpsBjEi6nhlfrGE4a0ANDTkZV2JIJPI0OOSNlHX4CamAaeQ2Rb1IYGF+fVREt4hkiwXD6oasOVDjhq9yU83slW/bk1zleI6lsjchwPwWTyyx1EhDHD0IVu4XnmbTtjlJIHUqOtFJ3sto55SzXbc01Y4OaCClI3bqgFkNkCRjdEyz836osA65sujHRAhAHNkPmhpHdBAA+KBwgRnrhEd5euQgA3zRdh1Terq2wR63EAKCPEtOJg0u5nok2kK0WT4Lm/dNIa2J7dQeN/VFmuULNtYBS5ICsfaPVGK0OjyQZfKFjslHI5xaAVqH2gVHtFK0jZjTnJ6lUCjnDpS14wVjklTM32Rf3bJ2KCnTOMoLLyCNBHBtEKhkzYg1zHZGE74ksP3pRNpw7AGDlTjXEJRr++Cu+y+JX+H7M+2Ww0x82x3KYcP2WqoaqtfIBokk1BXQOBGMDC61kYzgc0WHEpVDSTR3Wukew6HOGDjmhCxzKmoO4OrYq6CCLJIHNJmgiOrLRueyLFRWIqiRusZJ5qdpyfZw4rr7VFnIHPmlmQ6GCMIH0V6/uM8UjMfhVUorK+oOkHOrmStAqreXuce4wm0Fu9nYxzWjbmlYEJRcO+zDU0g91abZTtbE1ukbdE2dUFp0uYQPQJ9RyDTqUv+lJD8BrRy3XNWeXVMrjcqW20UlZXTCOKPrzJ7ADqVmd/43uNxc9tLK6ho+WAcPP8AE7p8lkuWR6NHUTUZ6unp/wDmJ4Yv45QEwl4lssfldcqfPZrtX7LGXyjT407wxn/UqH6QfruUl9+WKI4qK2WY8sQxvDfqBv8AVDjFe7BKT9UblQ3ikrN7fVxSkc2h2/0UzG/W0OwR6Fefae+cKSuGoiN4/HLG9v8A7H/dWCjaWMbPZbtXUodu19PVF7PmxxLT9FCyKD2X421po2QrmT+X9Vm9DxpfLSG/fVM26UgOHVNIwMmYO7mcnfLHwV6st5t99oWV1rqmVFO/q3m09iOYPoV0KSatGTi4umPxnqMfNEe4aTukKyYxRlwBI9FV7hxBLDqa1vpuonkUeybD8UVWmLwWczz3VOZG4SZyla2ukqpi+U/qixHbdcGTI5SMx4K50TAA87KHqbpI2rbIXnynJHdJ19Q6MnqmfhCQ5e7nujGpNgyS4ouYq6KPRz7BVKhZJJUvDQTgcke4VT4JhGCXNPLK7bK+OlqvEkBDXDf0W0tvYhYxvz7jvognx4hocnzBBPxCNleWsbkjZHhLJBnARHs1NIPJHpm6WkdF2GwcOAdpASjg0Y9UloOvOUoWnqgA+AEZFxsEMOHVIA2AkyBq2CPg43RTz2QAfAIXDGw7aQikuXQSgBN9LG78I+iRkhEcJIwP2SV7vEFopmySh8kkjtEMELNckzvytH9cDmVSLhbOLOKdRukAt9Afdt7ZwNQ/7jh73wG3xUzarZUI2yv8bXua732WloXxz01IfDY5jv8ACDseY6hzPMYGfkqPcb3HRyOjpS2qq2n/AD3jyR99Le/95U99oVvuXD1DTUvs7YYaglgkjeOQHugDkqNSU2tpa2N73ucGNDebiThKFuP8NJJRf9BI+qrpvEqZpJZCMguPL4J3S2iaolEbC5znHS0Z94qbbw3VQTljW6o+jx3x2z3Vn4Cskzrg+oq2+GIfKAe//wA/dXLSIS5PsZ0n2fRw21/tD9c0jQSc8vRVenqK/he7ObG4+G1w1x58r2reKikYIsaht1KzH7R7YyKop5wBl4LSQeawTu1I3aSVxLRRVEdbTRzxe69uofNRNRNV8JXB3EFl2bkGvpfwTM6nHRw7pHgaoElmbENzC7T9Mn9iE84qqY6WwVsjtw6PQG9STsAPqueDcMlI1mlKGzTKO70l1oIqumeHQzRh7T3BGVWr0yLxS7AwfVLcLWqS1cI2ymqPLNHSt1t7OO5H6qOfTS11Q9gcQMrplFyOGtEfIwEeXGPgkZQ9jMta76K4WmyxsDfF3PqpWa00ukjQMdlHg9mbRklWZJicNOB1SIkkDC1gy4d1fbjZ4KaV3hM8rxnHZQX3S7xS8M2yqUHEpx0Vr7tqKvMvhE4226I8thq/Bc8wP0+oWh8O0sUYe2Zg1E9VOzQUoiIAaM81Elb2NQ/DBTSAEjw3f+KC1CS3UZkccM5lBbUT4pF3J2QgcN8JB87GjdwRYqtjQdwtS6H2ckI7iAN1GOr2h22Fx9fnkUrQUyU1twOa7rA5qHNa84wgal7tkuSHxZLGZoHNI+0M1c1H+JIeZXQ13PKOQ+JImdndJuqmDumoaT1StPGPFBPPOxRyDiMaagJu9XeK+QeLpENL/wBmEYJwPzOdkk9g0dEhfLdVXJjfu69S0Uo3AcwOB29dwpO5VkFI10k7mu0tz5uQVTpuMLFxH41KyvDJmu0NkadLmnu0nY/qFg5WzpjHRSuJbLxNSGGov1XUVtNTZxLG8Fpz1JxkfQBV+ioKirrZJLaSHHfMsmlkTdsuLt1od7q+KLdRyUQZSVtJUYg9uBLXMDzpGpnfcbjb4KDksVVaOIvumrlY6E04qHtj2bKAdgc9jzC3g1Rz5INMYink0N8Krr58fjhja1h+GrchJVHtVLbamOmrp3xSFolGTHJCR+wP95yrBcaqGCInG+PecFTK64maR0gBxFuCdst6j1WjdmMXT0TtVBWUdbT26Qy3JoidNpFYWtYzO5ycdd9/iml9NPU2eCopaaeCPxMFj5dbTt0PJSPGltpCyzS2yi9jimhDnBhPnPY+uDg/FRba+lk4BkpZHxsq46p0gga3Aa0ych3wsZq9o6cSabix39n2zalmcbgqftlvPFPFjISNVrtBEk7vwyz/AIWeuOZ+Sp3CbLhJUy0VqLG1NQdDJJDszPN3rgLb+GrJS8PWmKgo8uDcukld70rzzcfUrOEP98mVklUeKH1THqZpOd0xp6MQvLgBzzyUvkEc0Rzcreznobk43G3wScj5HOBL8YSzmnPJJOBCYhCWMS7uOSkzTRgYwPol3FJOKAGs0Ax/h7H02UZXNrmxnw5XKYc5IykObgpcUHuyq+HWf2V1WLQzsgjgaeVjYTSP5uKVZnuUjGE5ZyWZQZrfUpdjEVgSzUAGY1KBi4xKhAHWtRw1cHwRwfRMQA091yXIiOnm3cZSi4TsQh9DTOOlpJY9b4w4gb7ZVJvHHvDtjrPYY6Uuf7zmQ0/77Kfnp9MznSSPY0/lOFRftEoLfLRi4vjLpoMszy1NcRse++6yi03TNmqVomrHxFQcZ32hgpxPT+y6qg0+nAfp93V0wHFpHqFJcd2SpuVPBdLWwyV9KCx0LTvLGeYHqOY+YVF+xiakjF58KUNuD3M0NHMRt/lkn6K8y3Gt8cGF7n6fei5H+qcpcHSCMXNWZ86vZITTVcojdGcOZL5Hx/EHcFRskdNcqiO32weL4jgJZmjOkdd+57dFqdVFbL81v37aYZ3x7B0rPM3588J5bLFaKCBrLbCyONu7RzP1V+ZNGfh4u2ULjiubTU9stznhrmNJYDzGwACpl5qH2qy0NseGPcHl8hcN3E7u/UrTuMLPRyVrLjOxjyyMtDnjIbvnZYpd6371u09RqxEzys25hKLtUVKlb/S18K17Ke409RG4RkPHvbBb/C4SRMeD5XN1fULz1wZQR3C5RU0oEkQ80g/0gLXbZY7rYzB9z1wmoXlvi0dWT/hA8yx38lUaZnO0WwcshGDtsJMnfyhDJ7KrJFgA4c0nJGFwFyM2U8i1FiaGssWU1ewhS2jX0TKcsYSCU7JoYP2CQkPql5pWBNdbHuwFQBN+66j+zu9UE7JoZxlOGHZNWnHPZOI+SwN6HLClmlNmlLMKYDhpSjSkAUcFAC4KO0pJqNnsgQsHLo3OyRHxS0GHPIz7qTdDSsaXOKKRvnjyQO5WTfaQ+ufHEGslNDG7dwb5S7lz69Vrlzf4cJd2BWYXmVlaWxuJJDiAGn5lRjjykaTnxiZPRVlTba8VdDM6KZhJY9p/Q+h6hegrZUCts9FXyaNc8DJWyDY7gHBWHXykj9olFMACzcjqVZ+CeJq2ksZttRC6op4iTH+Zg7D05qskHJaJx5KezRKi6636XNyB1KNS1mHAMcQOyrVPcqWtYHwP8zvwu2Kmba06gZGkHsQuV6OxUxh9qntQ4SD6d+lrpmslP+l39Rj5rGzC5jWxRscSTkuAwCV6I4nt4unB9zpQzU51OXR/xt8zf1AWKsDW0wld5sYIJHNdWFXE48rqRefst+7qCNoqWPdVykannGkLWIp4pQfCkD8LDbJd6WMsY9z4ZfVhwrFaeIpZaeV4du4kDHrsD9AtVFGUpuzU8nougnKpts4qmilZHLiRrRhzTz+vdWSrusLqBtVTkuBHIcx8VLLguTolGNJHRceY2HzlRNmurqqPU6It36o1ygnq3t8MFrQcndCerBw4z4seV1ayliyASMbYChBVGqfqOR6KSNJrja2V5OOiRcKSkB90EdSUyJNdDR0EsvIH4lGio2Qu1Su83x2SVTeo2jTC0PP6BRVRWyzZ1O27BUST5q4AcamoKr+IUEATDqN8cZe/GAmwqo27awpG8VWLdKWOGcHksp9uq/EPned1jN8T0PifHWdNt0aXFWREgFw3UxT0hlYHB2yyWCprDIw6nYDgtYs9W00MZLt8BGOXJ7H8348cKXF2Om0DvzIT04hZqcUv7WwfjCjr7WNNDIGOydPRaSSSOLHuaTEhWxA7PCOysjc9oDxuVnHj1AP4ycpxR1NQKiMnXgOGVz+V/h7L+BicW+Rp9UYqWjdO7JwMNb3K7RseyAB2nW7d3zUHR1EtyuADx/8Amp2g8+ZU/q0sJVSaPLUash79MWRPzyxus1pG+LLLMSC1jcBwPVytvHlW6Gx172+8IXNHqTt/NU6kpvu/hgM93UzU7HdaYPbM8/pFSqqVtzvjo2FzWxjU57ThXjguxw+xRuLM6su36jKS4Q4XmqaSSsmZhkhOT3cfwj4LSKG2R2+GnZG0AeFj5rUy9UUa62D7s11sH/LA6345MPU/Nds/E0dZNGH03hxafec7cjpthXPiG3G52etoY3hrqiFzG9PMeSyC6aqGlZCY2tlc5zpDycwgY0b+ufjss5Y43s0WSSVI1So4mtNJT+HNM5+oFuhrDv8AyWQ1kcYbNFDnQ04b8OY/QhWHhfhqtvUcMtTOY6Yb6yMud8ByS/HllprRU0c0AcKWWPw5C476x1+h/REOEXSFPnJWyt1jmxUr5ADqMYx8eX807tjzT0kTWe+fNv0UPdqpgMcLnAeVrjv6n/ZS9APE0yYyNAAwtX0ZpbJuikijDTI4887cyVbOFq2EymmqIyGyny6z+6qLI2RDXKQPgpCz1Lp7vTkDDMn9lmaGkGopqcENwB2ATWou2P8AKZ9VHvl9Ug92U6IFam4VD84dp/hUVOXOdlxJJ9U6kKQc3KYDQ5yhkpaQNDU3MhCAD6Sgk/Fd3QQAvJTV0sbozJs5MI+GZNe7jv6K1AbpaMZWXZrGTXRX4eGjjdxUpS2qogGlrzpUs3IAwjhzs7lAOTemNm0EpG7zy7rnsBOznah2UgzPdKtjTJ6I9lqpdO8LD8lx9qpI2OeY2tAGScdFIuZgc8KpX/iGOV01HQSsexnklkDubuw+HX4opApP9LDbYo4qdrogP8TzZHXPL9EvUSBrcKA4UubZ6P2aR48WI4YCd3N/opGqkydyueWmdEdop32gD2m3xU4P+dURgjuAckfQKNqYTcXtoIHjSwCSXT0b0HzKdcbV9NSshkmkAETjIR3wOX6pT7J4XVzKyuqd3Tz6ztyaBgD911YPoc2b7l+tNtFDbKGjxvFENf8AFjfPzT2rwQwDolR3BP0SUg3y4ErUzE3R6m8lB3/hq3XGaKWrpYnyDIL9O5+PfqrC3zkjkEjXjEYIPuuBUZPqy8b/ANIZUNLFTMEUQDWtGAG7YUTxzbTcuGqyJjNUkbfFYOpLdyB8RkKWa8tfz5pwSHtwuOL3Z1yWqPM9TF7deIYHMw0MwT3aCVbYpGUsbRq0/wClgyUbiyxw2HiaV7tQZUN10+GZAbnzD5H9MJahbC4DwpGEkbh2xXVdnLVCMNa2V5a9rmjoCrFYce3UzwcjJHwUPc6dsbGuIHiZ5jsnvDVQW1kcZHM7fRAy7kj0Sbw0dUlvndEkyqIA97Ug6YBH05SboCgBtPNnkkGvB5pWoiIGwTZsZQAtt3QSXhFBMRcQBjkjs5riCxNB1GjoIIGHbyRg9yCCaEyD40rJqSwTSQO0vc4Mz6FUNsLRTxsGwawEY25riCYCdQ99PD4sL3MdENTdJxuntNxDcSwsfI14Azlw3XEFMkVFla4ikkraiNlQ8uZUxu1twOgyMdle/sn8loIb6fsggtcfRnP7GgNcXPweSPLs4EdUEFZDFHANjOOiYz7wSeoyggpl0OPYxztlKQvJAC6gvP8AZ6HogeNYY5qSl8WNr8POMjlkY/v4LNKmFsD43x5GturHQfBBBdcPqcs/sSLJHVNFC+Xdw2z3S3D4/wCKw/xH9iggqILweSIggqJCojnHCCCAGs5JG6auOOS4gmI5rKCCCAP/2Q==" alt="Product Image" class="main-image img-fluid">
                    <img src="data:image/jpeg;base64,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" alt="Product Image Hover" class="hover-image img-fluid">
                    <div class="product-icons">
                        <a href="#" class="icon view"><i class="fas fa-eye"></i></a>
                        <a href="#" class="icon wishlist"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
                <div class="product-info">
                    <h5 class="product-category">Electronics</h5>
                    <h4 class="product-title">Man Casual Fashion Cap</h4>
                    <p class="product-price">$115</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>

        </div>
    </div>
</div>


<!--============================
    FOOTER PART START
==============================-->
<!--============================
    FOOTER PART END
==============================-->


<!--============================
    SCROLL BUTTON START
==============================-->
<!--============================
    SCROLL BUTTON  END
==============================-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Font awesome -->
<script src="https://kit.fontawesome.com/c276b48e85.js" crossorigin="anonymous"></script>
</html>
