<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT.Singvlar Furniture</title>
    <link href="/tabler/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="/tabler/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="/tabler/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="/tabler/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="/tabler/css/demo.min.css?1684106062" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

</head>

<body>
    @include('sweetalert::alert')
    <script src="/tabler/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
        @include('public.layouts.header')

        <div class="page-wrapper">
            @yield('content')
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">

                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2023
                                    <a href="." class="link-secondary">Unitama</a>.

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="/tabler/js/tabler.min.js?1684106062" defer></script>
    <script src="/tabler/js/demo.min.js?1684106062" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    @yield('offcanvas')

    @yield('modal')

    @stack('js')
</body>

</html>
