<!DOCTYPE html>
<html lang="en">
<!--begin Head-->

<head>
    <base href="">
    <title>{{ $title }}</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="Website Villa Bukit Lereng Malono" />
    <meta name="keywords"
        content="Website Villa Bukit Lereng Malono" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Website Villa Bukit Lereng Malono" />
    <meta property="og:url" content="https://sipensi.my.id/" />
    <meta property="og:site_name" content="Website Villa Bukit Lereng Malono" />
    <link rel="canonical" href="https://sipensi.my.id/" />
    <link rel="shortcut icon" href="{{ asset('assets2/media/logos/favicon.ico') }}" />
    <!--begin Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end Fonts-->
    <!--begin Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('assets2/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets2/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end Vendor Stylesheets-->
    <!--begin Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets2/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets2/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end Global Stylesheets Bundle-->

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <style>
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-style: none;
        }

        #myTable_wrapper .row {
            margin-bottom: 10px;
        }

        .dataTables_length {
            display: flex;
        }

        .dataTables_length label {
            display: flex;
            gap: 10px;
        }

        .dataTables_length label select {
            width: 60px;
        }

        .dataTables_filter label {
            display: flex;
        }

        .ck.ck-editor {
            color: #000;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0px;
            margin-left: 20px;
        }
    </style>
</head>
<!--end Head-->
<!--begin Body-->

<body data-kt-name="metronic" id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin Theme mode setup on page load-->
    <script>
        if (document.documentElement) {
            const defaultThemeMode = "system";
            const name = document.body.getAttribute("data-kt-name");
            let themeMode = localStorage.getItem("kt_" + (name !== null ? name + "_" : "") + "theme_mode_value");
            if (themeMode === null) {
                if (defaultThemeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
        @include('sweetalert::alert')

    @yield('modal')
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin Header-->
            @include('layoutAdmin.header')
            <!--end Header-->
            <!--begin Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                @include('layoutAdmin.sidebar')
                <!--begin Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                                <!--begin Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin Title-->
                                    <h1
                                        class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        {{ $title }}</h1>
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin Item-->
                                        <li class="breadcrumb-item text-muted">SIPENSI</li>
                                        <!--end Item-->
                                    </ul>
                                </div>
                                <div class="ms-auto">
                                    @yield('modal-button')
                                </div>
                            </div>
                            <!--end Toolbar container-->
                        </div>
                        <!--end Toolbar-->
                        <!--begin Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                @yield('content')
                            </div>
                            <!--end Content container-->
                        </div>
                        <!--end Content-->
                    </div>
                    @include('layoutAdmin.footer')
                </div>
            </div>
        </div>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ asset('assets2/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets2/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets2/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="{{ asset('assets2/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script src="{{ asset('assets2/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets2/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets2/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets2/js/custom/utilities/modals/new-target.js') }}"></script>
    <script src="{{ asset('assets2/js/custom/utilities/modals/users-search.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                },
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>


</body>

</html>
