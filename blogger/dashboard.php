<!doctype html>
<html lang="en">

<head>
    <title>E-mental Care - Blogger</title>
    <?php include 'includes/server.inc.php'?>
    <?php include 'includes/css.php'; ?>
</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        <div class="iq-sidebar  sidebar-default ">
            <?php include 'includes/sidebar.php'; ?>
        </div>

        <div class="iq-top-navbar">

            <?php include 'includes/navbar.php' ?>


        </div>


        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <div class="d-flex align-items-center justify-content-between welcome-content">
                            <div class="navbar-breadcrumb">
                                <h4 class="mb-0">Welcome to E-mental Care</h4>
                            </div>
                            <div class="">
                                <a class="button btn btn-skyblue button-icon" href="#">Dashboard<i class="ml-2 ri-arrow-down-s-fill"></i></a>
                                <a class="button btn btn-primary ml-2 button-icon rounded-small" href="newblog"><i class="ri-add-line m-0"></i>New Blog</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-header border-none">
                                <div class="header-title">
                                    <h4 class="card-title">Total Blogs Written</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="layout-1-chart-01"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="top-block d-flex align-items-center justify-content-between mb-3">
                                            <h3 class="text-danger">17%</h3>
                                            <div class="bg-danger icon iq-icon-box-2 mr-2 rounded">
                                                <i class="lar la-hand-pointer"></i>
                                            </div>
                                        </div>
                                        <h4>Clients</h4>
                                        <div class="mt-1">
                                            <p class="mb-0">accounts 352,735</p>
                                        </div>
                                        <div class="iq-progress-bar mt-3">
                                            <span class="bg-danger" data-percent="55"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="top-block d-flex align-items-center justify-content-between mb-3">
                                            <h3 class="text-primary">67%</h3>
                                            <div class="bg-primary icon iq-icon-box-2 mr-2 rounded">
                                                <i class="lar la-folder-open"></i>
                                            </div>
                                        </div>
                                        <h4>blogs 8,7678</h4>
                                        
                                        <div class="iq-progress-bar mt-3">
                                            <span class="bg-primary" data-percent="67"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="top-block d-flex align-items-center justify-content-between mb-3">
                                            <h3 class="text-orange">42%</h3>
                                            <div class="bg-orange icon iq-icon-box-2 mr-2 rounded">
                                                <i class="las la-desktop"></i>
                                            </div>
                                        </div>
                                        <h4>medics/consel 8,376</h4>
                                        
                                        <div class="iq-progress-bar mt-3">
                                            <span class="bg-orange" data-percent="55"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="top-block d-flex align-items-center justify-content-between mb-3">
                                            <h3 class="text-skyblue">33%</h3>
                                            <div class="bg-skyblue icon iq-icon-box-2 mr-2 rounded">
                                                <i class="las la-exclamation-triangle"></i>
                                            </div>
                                        </div>
                                        <h4>forum</h4>
                                        <div class="mt-1">
                                            <p class="mb-0">messa 457,735</p>
                                        </div>
                                        <div class="iq-progress-bar mt-3">
                                            <span class="bg-skyblue" data-percent="33"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="top-block d-flex align-items-center justify-content-between mb-3">
                                            <h3 class="text-success">85%</h3>
                                            <div class="bg-success icon iq-icon-box-2 mr-2 rounded">
                                                <i class="las la-circle-notch"></i>
                                            </div>
                                        </div>
                                        <h4>Total CTR</h4>
                                        <div class="mt-1">
                                            <p class="mb-0">Unclicked 652,735</p>
                                        </div>
                                        <div class="iq-progress-bar mt-3">
                                            <span class="bg-success" data-percent="33"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="top-block d-flex align-items-center justify-content-between mb-3">
                                            <h3 class="text-info">92%</h3>
                                            <div class="bg-info icon iq-icon-box-2 mr-2 rounded">
                                                <i class="lar la-envelope"></i>
                                            </div>
                                        </div>
                                        <h4>Sent 272,2824</h4>
                                        <div class="mt-1">
                                            <p class="mb-0">Unsent 682,735</p>
                                        </div>
                                        <div class="iq-progress-bar mt-3">
                                            <span class="bg-info" data-percent="85"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
          
                </div>
                <!-- Page end  -->
            </div>
        </div>
    </div>
    <!-- Wrapper End-->
    <footer class="iq-footer">
        <?PHP include 'includes/footer.php'; ?>
    </footer>
    <?php include 'includes/js.php'; ?>
</body>

</html>