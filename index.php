<?php
    include_once("includes/config.php");

    $select_query = "SELECT * FROM `card_data` ORDER BY `id` DESC";
    $resultData = $my_db->select($select_query);
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
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custome.css">
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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Card</h4>
                                <p class="card-description">
                                    All Student Card
                                </p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="table_main_data">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Student Number</th>
                                                <th>Blood Group</th>
                                                <th>Insurance Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                $file_upload_url = "assets/upload/";
                                                if(isset($resultData) && !empty($resultData))
                                                {
                                                    foreach($resultData as $key => $value)
                                                    {
                                                        $no++;
                                                        $cover_image = "";
                                                        if(!empty($value['cover_image']))
                                                        {
                                                            $cover_image = $file_upload_url.$value['cover_image'];
                                                        }

                                                        $fullName =  "";
                                                        if(!empty($value['middle_name']))
                                                        {
                                                            $fullName = $value['first_name'].' '.$value['middle_name'].' '.$value['last_name'];
                                                        }else{
                                                            $fullName = $value['first_name'].' '.$value['last_name'];
                                                        }

                                                        $edit_url = "card_edit.php?id=".$value["id"];
                                                        $card_url = "cardData.php?id=".$value["id"];
                                            ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><img src="<?php echo $cover_image; ?>"></td>
                                                        <td><?php echo $fullName; ?></td>
                                                        <td><?php echo $value['emailID']; ?></td>
                                                        <td><?php echo $value['student_number']; ?></td>
                                                        <td><?php echo $value['blood_group']; ?></td>
                                                        <td><?php echo $value['insurance_number']; ?></td>
                                                        <td>
                                                            <a class="badge badge-success" href="<?php echo $edit_url; ?>">
                                                                <i class="mdi mdi-lead-pencil menu-icon"></i>
                                                            </a>

                                                            <a class="badge badge-primary" href="<?php echo $card_url; ?>">
                                                                <i class="mdi mdi-account-card-details  menu-icon"></i>
                                                            </a>

                                                            <a class="badge badge-danger" href="javascript:void(0);" onclick="deleteData('<?php echo $value['id']; ?>')">
                                                                <i class="mdi mdi-delete menu-icon"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                            <?php   }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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
                        Copyright &copy; <?php echo date("Y"); ?> <a href="index.php" target="_blank">Student Card</a>. All rights reserved.
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
    new_deleteData = null;
    $(function ()
    {
        $('#table_main_data').DataTable({
            "pageLength": 25,
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
            "ordering": false
        });

        function deleteData(id)
        {
            if (confirm("Delete This Student Card?"))
            {
                window.location.href = "deleteData.php?action=card-delete&id="+id;

            } else {
                window.location.reload();
            }
        }
        new_deleteData = deleteData;
    });

    function deleteData(id) {
        new_deleteData(id);
    }
</script>
</body>
</html>