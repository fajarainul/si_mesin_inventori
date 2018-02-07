<?php

    session_start();

    if(isset($_SESSION['username'])){

        if($_SESSION['level']=="admin"){
            header("Location: admin/index.php");
        }else if($_SESSION['level']=="teknisi"){
            header("Location: teknisi/index.php");
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SI Data Inventori Mesin</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-datepicker.min.css">


</head>

<body>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->

<div id="login-page">
    <div class="container">
        <form class="form-login" action="proses_user.php?aksi=login" method="post">
            <h2 class="form-login-heading">sign in</h2>
            <div class="login-wrap">
                <?php
                if(isset($_SESSION['success'])){
                    if(!$_SESSION['success']){

                        echo "<div class=\"alert alert-danger\">".$_SESSION['message']."</div>";

                    }else{
                        echo "<div class=\"alert alert-success\">".$_SESSION['message']."</div>";
                    }

                    unset($_SESSION['success']);
                    unset($_SESSION['message']);
                }
                ?>

                <input type="text" class="form-control" placeholder="Username" autofocus name="username" required="required">
                <br>
                <input type="password" class="form-control" placeholder="Password" name="password" required="required">

                <br>
                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                <hr>

            </div>

        </form>

    </div>
</div>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
<script>
    $.backstretch("assets/img/login.jpg", {speed: 500});
</script>


</body>
</html>