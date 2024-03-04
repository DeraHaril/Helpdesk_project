<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{url('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{url('vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('libs/css/style.css') }}">
    <link rel="stylesheet" href="{{url('vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{url('vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{url('vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet" href="{{url('vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{url('vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{url('vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{url('vendor/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{url('vendor/summernote/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{url('vendor/multi-select/css/multi-select.css') }}">


    <!-- chart chartist js -->
    <script src="{{url('vendor/charts/chartist-bundle/chartist.min.js') }}"></script>
    <!-- sparkline js -->
    <script src="{{url('vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    <!-- morris js -->
    <script src="{{url('vendor/charts/morris-bundle/raphael.min.js') }}"></script>
    <script src="{{url('vendor/charts/morris-bundle/morris.js') }}"></script>
    <!-- chart c3 js -->
    <script src="{{url('vendor/charts/c3charts/c3.min.js') }}"></script>
    <script src="{{url('vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
    <script src="{{url('vendor/charts/c3charts/C3chartjs.js') }}"></script>
    <script src="{{url('libs/js/dashboard-ecommerce.js') }}"></script>
    <!-- Optional JavaScript -->
    <script src="{{url('vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{url('vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{url('vendor/multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{url('libs/js/main-js.js') }}"></script>
    <title>HelpDesk</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#">HelpDesk</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{'images/avatar-1.jpg'}}" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">Dera</h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="/deconnexion"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">MENU</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('accueil')}}" ><i class="fas fa-home"></i>Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-ticket-alt"></i>Ticket <span class="badge badge-success">6</span></a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('création de ticket')}}">Créer ticket <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('ticket')}}">Liste des tickets</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="far fa-calendar-alt"></i>Rendez-vous</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('dashboard')}}" ><i class="fas fa-home"></i>Tableau de bord</a>
                            </li>
                         </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    @yield('contenu')

</body>
</html>
