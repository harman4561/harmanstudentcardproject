<?php
    include_once("includes/config.php");
    include_once("insertCard.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Card</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->

    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/parsley.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->

</head>

<body>
<div class="container-scroller">

    <?php
        include_once("header.php");
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <?php
            include_once("left_side.php");
        ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Card</h4>
                                <p class="card-description">
                                    Add Student Card
                                </p>

                                <?php
                                    if(!empty($global_message)){
                                        echo $global_message;
                                    }
                                ?>

                                <form class="forms-sample" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                                      name="form_add_card" id="form_add_card" enctype="multipart/form-data" data-parsley-validate novalidate>

                                    <div class="form-group">
                                        <label for="exampleInputName1">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name"
                                               parsley-trigger="change" data-parsley-required="true" >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Middle Name</label>
                                        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"
                                               parsley-trigger="change" data-parsley-required="true" >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Email</label>
                                        <input type="email" class="form-control" id="emailID" name="emailID" placeholder="Email Address"
                                               parsley-trigger="change" data-parsley-type="email" data-parsley-required="true" >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Student Number</label>
                                        <input type="text" class="form-control" id="student_number" name="student_number"
                                               parsley-trigger="change" data-parsley-required="true">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Blood Group</label>
                                        <input type="text" class="form-control" id="blood_group" name="blood_group"
                                               parsley-trigger="change" data-parsley-required="true">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Insurance Number</label>
                                        <input type="text" class="form-control" id="insurance_number" name="insurance_number"
                                               parsley-trigger="change" data-parsley-required="true">
                                    </div>

                                    <div class="form-group">
                                        <label>File upload</label>
                                        <input type="file" name="cover_image" id="cover_image" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                            </span>
                                        </div>
                                        <small>Upload Only jpg/jpeg file</small>
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                                    <button type="button" class="btn btn-danger" id="btn_cancel">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->

            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                        Copyright &copy;  <?php echo date("Y"); ?> <a href="index.php" target="_blank">Student Card</a>. All rights reserved.
                    </span>
                    <!--<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><i class="mdi mdi-heart text-danger"></i></span>-->
                </div>
            </footer>
            <!-- partial -->

        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<?php
    include_once("footer.php");
?>
<script type="text/javascript">
    $(function ()
    {
        $('#form_add_card').parsley();

        $('#btn_cancel').click(function()
        {
           window.location.href = "card_add.php";
        });

        <?php
            if($insertID != 0)
            { ?>
        setTimeout(function()
        {
            window.location.href = "cardData.php?id="+'<?php echo $insertID; ?>';
        },3500);
        <?php } ?>
    });
</script>
</body>
</html>