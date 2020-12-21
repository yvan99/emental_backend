<!doctype html>
<html lang="en">

<head>
    <title>E-mental Care - Blogger</title>
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
                <div class="col-lg-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Write Your thoughts here</h4>
                     </div>
                  </div>
                  <div class="card-body">
                      <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                  <div class="input-group input-group-default mb-4">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-default">Blog Title</span>
                        </div>
                        <input type="text" name="titleBlog" required class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-default">
                     </div>
                     <p>Default file:</p>
                        <input type="file" id="myFile" name="titleImage">
                        <br><br>
                     <div name="" id="editor"></div> <br>
                     <div class="form-goup">
                     <button type="submit" class="btn btn-primary" name="saveBlog">Add Blog</button>
                     <button type="reset" class="btn btn-danger">Discard</button>
                     <button type="reset" class="btn btn-secondary">Save To Draft</button>
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