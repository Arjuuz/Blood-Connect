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
    <title>Blood Donation : User Register</title>

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
        <h1>Register User</h1>
        <!-- container -->
        <div class="container">
            <!-- main content -->
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h2>Register</h2>
                    <form action="#" method="post">
                        <div class="input-group">
                            <span><i class="fas fa-user" aria-hidden="true"></i></span>
                            <input type="text" placeholder="Name" class="name" name="NAME" pattern="[A-Za-z]{1,32}" maxlength="32" required="">
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="Age" class="age" name="AGE" required="">
                        </div>
                        <div class="input-group">
                            <!-- <span><i class="fas fa-user" aria-hidden="true"></i></span> -->
                            <textarea placeholder="Address" required="" name="ADDRESS" class="address"></textarea>
                        </div>
                        <div class="input-group">
                            <!-- <span><i class="fas fa-user" aria-hidden="true"></i></span> -->
                            <input type="text" placeholder="Phone" required="" name="PHONE" pattern="[0-9][0-9]{9}" maxlength="10">
                        </div>
                        <div class="input-group">
                           <select name="BLOOD" id="blood">
                               <option selected disabled>Blood Group</option>
                               <option value="A+">A+</option>
                               <option value="A-">A-</option>
                               <option value="B+">B+</option>
                               <option value="B-">B-</option>
                               <option value="O+">O+</option>
                               <option value="O-">O-</option>
                               <option value="AB+">AB+</option>
                               <option value="AB-">AB-</option>
                           </select>
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

            
			<?php
			if (isset($_REQUEST['register'])) {

				$Name = $_REQUEST['NAME'];
				$Age = $_REQUEST['AGE'];
				$Phone = $_REQUEST['PHONE'];
				$Address = $_REQUEST['ADDRESS'];
				$Blood = $_REQUEST['BLOOD'];
				$Email = $_REQUEST['EMAIL'];
				$Password = $_REQUEST['PASSWORD'];

				$qryCheck = "SELECT COUNT(*) AS cnt FROM `user_reg` WHERE `u_email` = '$Email' OR `u_phone` = '$Phone'";

				$qryOut = mysqli_query($conn, $qryCheck);

				$fetchData = mysqli_fetch_array($qryOut);

				if ($fetchData['cnt'] > 0) {
					echo "<script>alert('Already exist an Account with same Email / Phone Number');window.location = 'userRegister.php';</script>";
				} else {

					$qryReg = "INSERT INTO user_reg(u_name, u_age, u_address, u_blood, u_phone, u_email) VALUES('$Name', '$Age', '$Address', '$Blood', '$Phone', '$Email')";
					$qryLog = "INSERT INTO login(`reg_id`, `email`, `password`, `type`, `status`) VALUES((select max(u_id) from user_reg), '$Email', '$Password', 'USER', '1')";

					// echo $qryReg . "&& " . $qryLog;

					if ($conn->query($qryReg) == TRUE && $conn->query($qryLog) == TRUE) {
						echo "<script>alert('Registration Success');window.location = '../index.php';</script>";
					} else {
						echo "<script>alert('Registration Failed');window.location = 'userRegister.php';</script>";
					}
				}
			}

			?>

            <!-- //main content -->
        </div>
        <!-- //container -->
        <!-- footer -->
        <!-- footer -->
    </div>
    

    <!-- fontawesome v5-->
    <script src="js/fontawesome.js"></script>

</body>

</html>