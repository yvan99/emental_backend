<!doctype html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Login - E-mental Care</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="http://iqonic.design/themes/instadash/html/assets/images/favicon.ico" />
      
      <link rel="stylesheet" href="assets/assets/css/backend.min0ff5.css?v=1.0.2">
      <link rel="stylesheet" href="assets/assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="assets/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="assets/assets/vendor/remixicon/fonts/remixicon.css">
      <link rel="stylesheet" href="assets/assets/vendor/%40icon/dripicons/dripicons.css">
      
      <link rel='stylesheet' href='assets/assets/vendor/fullcalendar/core/main.css' />
      <link rel='stylesheet' href='assets/assets/vendor/fullcalendar/daygrid/main.css' />
      <link rel='stylesheet' href='assets/assets/vendor/fullcalendar/timegrid/main.css' />
      <link rel='stylesheet' href='assets/assets/vendor/fullcalendar/list/main.css' />
      <link rel="stylesheet" href="assets/assets/vendor/mapbox/mapbox-gl.css">
      <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php');
    $error = "";
    if (isset($_POST['submit'])) {

        $email    = escape($_POST['email']);
        $password = escape($_POST['password']);
        $patient     = new patient();
        $result = $patient->signin($email, $password);

        if(empty($email) || empty($password)){

            $error = "<div class='status-userNotCreated'>" . "<center>" . "<strong style='font-size:16px;color:white;font-style:italic;'>" . "Email et mot de passe requis" . "</strong>" . "</center>" . "</div>";

        }

        elseif ($result) {
           
            header("location:index");
            //will direct to index page  after login
        } else $error = "<div class='status-userNotCreated'>" . "<center>" . "<strong style='font-size:16px;color:white;font-style:italic;'>" . "l n'existe aucun compte valide avec l'email et le mot de passe saisis. " . "</strong>" . "</center>" . "</div>";
    }
    ?>
   </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    
      <div class="wrapper">
      <section class="login-content">
         <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
               <div class="col-12">
                  <div class="row align-items-center">
                     <div class="col-lg-5">
                        <h2 class="mb-2">Get Connected</h2>
                        <p>Enter your account info to continue</p>
                        <form method="POST" autocomplete="off">
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="floating-label form-group">
                                    <input class="floating-input form-control" type="email" placeholder="" name="email" required>
                                    <label>Email</label>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="floating-label form-group">
                                    <input class="floating-input form-control" type="password" placeholder="" name="password" required>
                                    <label>Password</label>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <a href="auth-recoverpw.html" class="text-primary float-right">Forgot Password?</a>
                              </div>
                           </div>
                           <input type="submit" class="btn btn-success" name="submit" value="Login Now">
                           <p class="mt-3">
                              Don't Have account  <a href="signup" class="text-primary"> Create One here</a>
                           </p>
                        </form>
                     </div>
                     <div class="col-lg-7 mb-lg-0 mb-4 mt-lg-0 mt-4">
                        <img src="assets/assets/images/login/01.png" class="img-fluid w-80" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>
    
    <!-- Backend Bundle JavaScript -->
    <script src="assets/assets/js/backend-bundle.min.js"></script>
    
    <!-- Flextree Javascript-->
    <script src="assets/assets/js/flex-tree.min.js"></script>
    <script src="assets/assets/js/tree.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="assets/assets/js/table-treeview.js"></script>
    
    <!-- Masonary Gallery Javascript -->
    <script src="assets/assets/js/masonry.pkgd.min.js"></script>
    <script src="assets/assets/js/imagesloaded.pkgd.min.js"></script>
    
    <!-- Mapbox Javascript -->
    <script src="assets/assets/js/mapbox-gl.js"></script>
    <script src="assets/assets/js/mapbox.js"></script>
    
    <!-- Fullcalender Javascript -->
    <script src='assets/assets/vendor/fullcalendar/core/main.js'></script>
    <script src='assets/assets/vendor/fullcalendar/daygrid/main.js'></script>
    <script src='assets/assets/vendor/fullcalendar/timegrid/main.js'></script>
    <script src='assets/assets/vendor/fullcalendar/list/main.js'></script>
    
    <!-- SweetAlert JavaScript -->
    <script src="assets/assets/js/sweetalert.js"></script>
    
    <!-- Vectoe Map JavaScript -->
    <script src="assets/assets/js/vector-map-custom.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="assets/assets/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="assets/assets/js/chart-custom.js"></script>
    
    <!-- slider JavaScript -->
    <script src="assets/assets/js/slider.js"></script>
    
    <!-- app JavaScript -->
    <script src="assets/assets/js/app.js"></script>
  </body>

<!-- Mirrored from iqonic.design/themes/instadash/html/backend/auth-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Dec 2020 09:28:32 GMT -->
</html>