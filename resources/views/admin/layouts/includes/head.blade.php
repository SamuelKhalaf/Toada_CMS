<head><base href=""/>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @php 
        $currentLang = app()->getLocale();
        $isRTL = $currentLang === 'ar';
    @endphp
    <meta property="og:locale" content="{{ $currentLang === 'ar' ? 'ar_SA' : 'en_US' }}" />
    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'Toada') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @if($isRTL)
        <meta name="direction" content="rtl" />
    @endif
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    @if($isRTL)
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @endif
    <!--end::Fonts-->
    <!--begin::FontAwesome Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--end::FontAwesome Icons-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    @if($isRTL)
        <!--begin::Arabic RTL Support-->
        <link href="{{ asset('assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Arabic RTL Support-->
    @else
        <!--begin::English Support-->
        <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <!--end::English Support-->
    @endif
    <!--end::Global Stylesheets Bundle-->
    
    @if($isRTL)
        <!--begin::Arabic RTL Styles-->
        <style>
            body, .menu-title, .page-heading, .breadcrumb-item, .form-control, .form-select, .btn {
                font-family: 'Noto Sans Arabic', 'Inter', sans-serif !important;
            }
            .menu-arrow {
                transform: rotate(180deg);
            }
            .table th, .table td {
                text-align: right !important;
                direction: rtl !important;
            }
            /* .dataTables_wrapper .table thead th {
                text-align: center !important;
                direction: rtl !important;
            } */
            .table th:last-child, .table td:last-child {
                text-align: center !important;
                /* direction: ltr !important; */
            }
            .card-title, .card-header, .page-heading {
                text-align: right !important;
                direction: rtl !important;
            }
            .form-label, label {
                text-align: right !important;
                direction: rtl !important;
            }
            .breadcrumb {
                direction: rtl !important;
            }
            .breadcrumb-item + .breadcrumb-item::before {
                float: left !important;
                margin-right: 0.5rem !important;
                margin-left: 0 !important;
            }
            .btn-group {
                direction: rtl !important;
            }
            .dataTables_filter, .dataTables_info {
                text-align: right !important;
                direction: rtl !important;
            }
            .dataTables_paginate {
                direction: ltr !important;
            }
            .modal-header, .modal-body, .modal-footer {
                text-align: right !important;
                direction: rtl !important;
            }
            .modal-header .btn-close {
                margin-left: 0 !important;
                margin-right: auto !important;
            }
            .app-sidebar .menu-item {
                text-align: right !important;
                direction: rtl !important;
            }
            .app-navbar .menu {
                text-align: right !important;
                direction: rtl !important;
            }
            .menu-sub .menu-item {
                text-align: right !important;
                direction: rtl !important;
            }
            .app-content, .card-body, .card-toolbar {
                direction: rtl !important;
            }
            .form-control[data-kt-user-table-filter="search"] {
                text-align: right !important;
                direction: rtl !important;
            }
            .badge {
                direction: ltr !important;
            }
            .dataTables_wrapper .dataTables_length {
                direction: rtl !important;
                text-align: right !important;
            }
            .dataTables_wrapper .dataTables_length select {
                margin-left: 0.5rem !important;
                margin-right: 0 !important;
            }
            .table th.sorting:after,
            .table th.sorting_asc:after,
            .table th.sorting_desc:after {
                right: auto !important;
                left: 8px !important;
            }
            .table td .btn-group {
                direction: ltr !important;
            }
            .fv-row {
                direction: rtl !important;
                text-align: right !important;
            }
            .input-group {
                direction: rtl !important;
            }
            .dropdown-menu {
                direction: rtl !important;
                text-align: right !important;
            }
            .alert {
                direction: rtl !important;
                text-align: right !important;
            }
            /* .app-sidebar-toggle {
                left: -15px !important;
                right: auto !important;
            } */
            body.app-rtl {
                direction: rtl !important;
            }
            .app-header .menu-item {
                direction: rtl !important;
            }
            .app-navbar .menu-sub .menu-item .menu-link {
                direction: rtl !important;
                text-align: right !important;
            }
            .page-title {
                direction: rtl !important;
                text-align: right !important;
            }
            .app-container {
                direction: rtl !important;
            }
        </style>
        <!--end::Arabic RTL Styles-->
    @endif

</head>

