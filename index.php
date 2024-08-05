<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php
session_start();
include("DBConnection/dbConnection.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Donation : Login</title>

    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="login/css/style.css" type="text/css" media="all" />

</head>

<body>
    <div class="signinform">
        <h1>Login Form</h1>
        <!-- container -->
        <div class="container">
            <!-- main content -->
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h2>Login</h2>
                    <form action="#" method="post">
                        <div class="input-group">
                            <span><i class="fas fa-user" aria-hidden="true"></i></span>
                            <input type="email" placeholder="Username or Email" name="Email" required="">
                        </div>
                        <div class="input-group">
                            <span><i class="fas fa-key" aria-hidden="true"></i></span>
                            <input type="Password" placeholder="Password" name="Password" required="">
                        </div>

                        <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
                    </form>
                    <p class="continue"><span> </span></p>

                    <p class="account">Don't have an account? <a href="RegisterPage.html">Sign up</a></p>
                </div>
            </div>
            <!-- //main content -->
        </div>
        <!-- //container -->
        <!-- footer -->
        <div class="footer">
            <p>&copy; 2021 Blood Donation. All Rights Reserved | Design by <a href="#">LCC</a></p>
        </div>
        <!-- footer -->
    </div>


    <?php
    if (isset($_REQUEST['login'])) {
        $email = $_REQUEST['Email'];
        $password = $_REQUEST['Password'];
        $qry = "SELECT * FROM login WHERE `email` = '$email' AND `password` = '$password'";
        $result = mysqli_query($conn, $qry);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $uid = $data['reg_id'];
            $type = $data['type'];
            $_SESSION['uid'] = $uid;
            $_SESSION['type'] = $type;

            if ($type == 'ADMIN') {
                echo "<script>alert('Login Success'); window.location='ADMIN/adminHome.php'</script>";
            } else  if ($type == 'DONOR') {
                echo "<script>alert('Login Success'); window.location='DONOR/donorHome.php'</script>";
            }else if ($type == 'USER') {
                echo "<script>alert('Login Success'); window.location='USER/userHome.php'</script>";
            } else if ($type == 'HOSPITAL') {
                echo "<script>alert('Login Success'); window.location='HOSPITAL/hospitalHome.php'</script>";
            }else {
                echo "<script>alert('Login Failed')</script>";
            }
        } else {
            echo "<script>alert('Invalid Email / Password'); window.location='index.php'</script>";
        }
    }
    ?>



    <!-- fontawesome v5-->
    <script src="js/fontawesome.js"></script>

</body>

</html>