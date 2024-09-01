<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php'); 

if (strlen($_SESSION['vpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $lesson_name = $_FILES['lesson_name']['name']; // Get the name of the uploaded file

        // Move the uploaded file to a desired location
        $lesson_file_temp = $_FILES['lesson_name']['tmp_name'];
        $lesson_file_destination = 'uploads/' . $lesson_name;
        move_uploaded_file($lesson_file_temp, $lesson_file_destination);

        $query = mysqli_query($con, "INSERT INTO tblcategory (lesson_name) VALUES ('$lesson_name')");
        if ($query) {
            echo "<script>alert('Category added successfully');</script>";
            echo "<script>window.location.href='manage-category.php'</script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
    }
}
?>



<!doctype html>
<html class="no-js" lang="">

<head>

    <title>Learning Basic English for High School Students - Add Category</title>


    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>
    <?php include_once('includes/sidebar.php'); ?>
    <!-- Right Panel -->

    <?php include_once('includes/header.php'); ?>

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li><a href="add-category.php">Category</a></li>
                                <li class="active">Add Category</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="animated fadeIn">


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">


                    </div> <!-- .card -->

                </div><!--/.col-->




                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add</strong> Category
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="lesson_name" class="form-control-label">Lesson File</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="lesson_name" name="lesson_name" class="form-control-file" required="true">
                                    </div>
                                </div>
                                <p style="text-align: center;">
                                    <button type="submit" class="btn btn-primary btn-sm" name="submit">Add</button>
                                </p>
                            </form>

                        </div>
                    </div>
                </div>








                <div class="col-lg-6">


                </div>



            </div>


        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php include_once('includes/footer.php'); ?>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>