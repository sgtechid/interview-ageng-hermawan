<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.header')
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('components.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('components.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            {{ $slot }}
            @include('components.footer')
        </div>
    </main>



    @include('components.script')
</body>

</html>
