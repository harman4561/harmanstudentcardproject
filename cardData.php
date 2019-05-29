<?php
    include_once("includes/config.php");

    $resultData = array();
    if(isset($_GET['id']) && !empty($_GET['id']))
    {
        $select_query = "SELECT * FROM `card_data` WHERE `id` = ".$_GET['id']." LIMIT 1 ";
        $resultData = $my_db->select($select_query);

        if(empty($resultData))
        {
            echo '<script type="text/javascript">window.location="index.php"</script>';
            exit;
        }else{
            $resultData = $resultData[0];
        }
    }else{
        echo '<script type="text/javascript">window.location="index.php"</script>';
        exit;
    }

    $file_upload_url = "assets/upload/";
    $cover_image = "";
    if(!empty($resultData['cover_image']))
    {
        $cover_image = $file_upload_url.$resultData['cover_image'];
    }

    $fullName =  "";
    if(!empty($resultData['middle_name']))
    {
        $fullName = $resultData['first_name'].' '.$resultData['middle_name'].' '.$resultData['last_name'];
    }else{
        $fullName = $resultData['first_name'].' '.$resultData['last_name'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Card</title>


    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');

        html, body {
            background: #f3f3f3;
            font-family: Roboto, Arial, Verdana, sans-serif;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
        }

        .card {
            width: 450px;
            height: 250px;
            background-color: #fff;
            background: linear-gradient(#f8f8f8, #fff);
            box-shadow: 0 8px 16px -8px rgba(0, 0, 0, 0.4);
            border-radius: 6px;
            overflow: hidden;
            position: relative;
            margin: 1.5rem;
        }

        .card h1 {
            text-align: center;
            margin: 5px 0;
        }

        .card .additional {
            position: absolute;
            width: 150px;
            height: 100%;
            background: linear-gradient(#1493de, #2d9bee);
            transition: width 0.4s;
            overflow: hidden;
            z-index: 2;
        }

        .card .additional .user-card {
            width: 150px;
            height: 100%;
            position: relative;
            float: left;
        }

        .card .additional .user-card::after {
            content: "";
            display: block;
            position: absolute;
            top: 10%;
            right: -2px;
            height: 80%;
            border-left: 2px solid rgba(0, 0, 0, 0.025);
        }

        .card .additional .user-card .level,
        .card .additional .user-card .points {
            top: 15%;
            color: #fff;
            text-transform: uppercase;
            font-size: 0.75em;
            font-weight: bold;
            background: rgba(0, 0, 0, 0.15);
            padding: 0.125rem 0.75rem;
            border-radius: 100px;
            white-space: nowrap;
        }

        .card .additional .user-card .points {
            top: 85%;
        }

        .card .additional .user-card svg {
            top: 50%;
        }

        .card .additional .more-info {
            width: 300px;
            float: left;
            position: absolute;
            left: 150px;
            height: 100%;
        }

        .card .additional .more-info h1 {
            color: #fff;
            margin-bottom: 0;
        }

        .card .additional .coords {
            margin: 0 1rem;
            color: #fff;
            font-size: 1rem;
        }

        .card .additional .coords span + span {
            float: right;
        }

        .card .additional .stats {
            font-size: 2rem;
            display: flex;
            position: absolute;
            bottom: 1rem;
            left: 1rem;
            right: 1rem;
            top: auto;
            color: #fff;
        }

        .card .additional .stats > div {
            flex: 1;
            text-align: center;
        }

        .card .additional .stats i {
            display: block;
        }

        .card .additional .stats div.title {
            font-size: 0.75rem;
            font-weight: bold;
            text-transform: uppercase;
            margin-right: 5px;
        }

        .card .additional .stats div.value {
            font-size: 1.5rem;
            font-weight: bold;
            line-height: 1.5rem;
        }

        .card .additional .stats div.value.infinity {
            font-size: 2.5rem;
        }

        .card .general {
            width: 300px;
            height: 100%;
            position: absolute;
            top: 0;
            right: 0;
            z-index: 1;
            box-sizing: border-box;
            padding: 1rem;
            padding-top: 0.2rem;
        }

        span.title {
            font-size: 0.75rem;
            font-weight: bold;
            text-transform: uppercase;
            margin-right: 5px;
        }

        .card .general .more {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            font-size: 0.9em;
        }

        .center_image
        {
            width: 110px; height: 100px;border-radius: 50%;
            background-position: center;background-repeat: no-repeat;background-size: cover
        }
    </style>
</head>

<body style="background: #f3f3f3;margin: 0 auto">
<div class="center">

    <div class="card">
        <div class="additional">
            <div class="user-card">
                <div class="level center">
                    Student Card
                </div>
                <div class="points center">
                    <?php echo $resultData['student_number']; ?>
                </div>
            </div>
            <div class="center center_image" style="background-image: url('<?php echo $cover_image; ?>');">
            </div>
        </div>
        <div class="general">
            <h1><?php echo $fullName; ?></h1>
            <p><span class="title">Student Number :</span><?php echo $resultData['student_number']; ?></p>
            <p><span class="title">Email :</span><?php echo $resultData['emailID']; ?></p>
            <p><span class="title">Bool Group :</span><?php echo $resultData['blood_group']; ?></p>
            <p><span class="title">Insurance number :</span><?php echo $resultData['insurance_number']; ?></p>
        </div>
    </div>

</div>
</body>
</html>
