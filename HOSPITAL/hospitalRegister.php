<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php
session_start();
include("../DBConnection/dbConnection.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Donation : Hospital Register</title>

    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="../login/css/style.css" type="text/css" media="all" />

</head>

<body>
    <div class="signinform">
        <h1>Register Hospital</h1>
        <!-- container -->
        <div class="container">
            <!-- main content -->
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h2>Register</h2>
                    <form action="#" method="post">
                        <div class="input-group">
                            <span><i class="fas fa-user" aria-hidden="true"></i></span>
                            <input type="text" placeholder="Hospital Name" class="name" name="NAME" pattern="[A-Za-z]{1,32}" maxlength="32" required="">
                        </div>
                        <div class="input-group">
                            <!-- <span><i class="fas fa-user" aria-hidden="true"></i></span> -->
                            <textarea placeholder="Address" required="" name="ADDRESS" class="address"></textarea>
                        </div>
                        <div class="input-group">
                            <!-- <span><i class="fas fa-user" aria-hidden="true"></i></span> -->
                            <input type="text" placeholder="Phone" name="PHONE" required="" pattern="[0-9][0-9]{9}" maxlength="10">
                        </div>
                        <div class="input-group">
                            <!-- <span><i class="fas fa-user" aria-hidden="true"></i></span> -->
                            <input type="email" placeholder="Email" name="EMAIL" required="">
                        </div>
                        <div class="input-group">
                            <!-- <span><i class="fas fa-key" aria-hidden="true"></i></span> -->
                            <input type="Password" placeholder="Password" name="PASSWORD" required="">
                        </div>

                        <button class="btn btn-primary btn-block" type="submit" name="register">Register</button>
                    </form>
                    <p class="continue"><span> </span></p>

                    <p class="account">Already have an account? <a href="../index.php">Login</a></p>
                </div>
            </div>
            <!-- //main content -->
        </div>

        <?php
        if (isset($_REQUEST['register'])) {

            $Name = $_REQUEST['NAME'];
            $Phone = $_REQUEST['PHONE'];
            $Address = $_REQUEST['ADDRESS'];
            $Email = $_REQUEST['EMAIL'];
            $Password = $_REQUEST['PASSWORD'];

            $qryCheck = "SELECT COUNT(*) AS cnt FROM `hospital` WHERE `h_email` = '$Email' OR `h_phone` = '$Phone'";

            $qryOut = mysqli_query($conn, $qryCheck);

            $fetchData = mysqli_fetch_array($qryOut);

            if ($fetchData['cnt'] > 0) {
                echo "<script>alert('Already exist an Account with same Email / Phone Number');window.location = 'hospitalRegister.php';</script>";
            } else {

                $qryReg = "INSERT INTO hospital(h_name, h_address, h_phone, h_email) VALUES('$Name', '$Address', '$Phone', '$Email')";
                $qryLog = "INSERT INTO login(`reg_id`, `email`, `password`, `type`, `status`) VALUES((select max(h_id) from hospital), '$Email', '$Password', 'HOSPITAL', '0')";

                // echo $qryReg . "&& " . $qryLog;

                if ($conn->query($qryReg) == TRUE && $conn->query($qryLog) == TRUE) {
                    echo "<script>alert('Registration Success');window.location = '../index.php';</script>";
                } else {
                    echo "<script>alert('Registration Failed');window.location = 'hospitalRegister.php';</script>";
                }
            }
        }

        ?>

        <!-- //container -->
        <!-- footer -->
        <!-- footer -->
    </div>


    <!-- fontawesome v5-->
    <script src="js/fontawesome.js"></script>

</body>

</html>