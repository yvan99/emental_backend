<!doctype html>
<html lang="en">

<head>
    <title>E-mental Care - Blogger</title>
    <?php include 'includes/server.inc.php'?>
    <?php include 'includes/css.php'; ?>
    <?php  
    if(isset($_POST['saveBlog'])){
        $blogTitle=$_POST['titleBlog'];
        $blogVideo=$_POST['videoBlog'];
        $blogContent=$_POST['contentBlog'];

        $admin=new admin;
        $result=$admin->addTestmonies($blogTitle,$blogVideo,$blogContent);
    }
    
    
    ?>
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
                <div class="col-lg-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Add new testimony</h4>
                     </div>
                  </div>
                  <div class="card-body">
                      <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                  <div class="input-group input-group-default mb-4">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-default">Testimony title</span>
                        </div>
                        <input type="text" name="titleBlog" required class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-default">
                     </div>

                     <div class="input-group input-group-default mb-4">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-default">Video Url</span>
                        </div>
                        <input type="text" name="videoBlog" required class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-default">
                     </div>
                   
                     <textarea name="contentBlog" id="editor"></textarea> <br>
                     <div class="form-goup">
                     <input type="submit" class="btn btn-warning" name="saveBlog" value="Save Testimony"/>
                     <input type="reset" class="btn btn-danger" value="Discard"/>
                     <input type="reset" class="btn btn-secondary" value="Save To Draft"/>
                     </div> 
                     
                     
                     
                     </form>
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