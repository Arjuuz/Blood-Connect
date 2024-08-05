<?php
include('adminHeader.php');
?>
<!--/breadcrumb-bg-->
<div class="breadcrumb-bg w3l-inner-page-breadcrumb py-5">
    <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
        <h2 class="title pt-5">History</h2>
        <ul class="breadcrumbs-custom-path mt-3 text-center">
            <li><a href="adminHome.php">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> History </li>
        </ul>
    </div>
</div>
<!--//breadcrumb-bg-->
<!-- banner bottom shape -->
<div class="position-relative">
    <div class="shape overflow-hidden">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- banner bottom shape -->

<div class="view-content">

    <?php
    $uid = $_SESSION['uid'];
    $qry = "SELECT u.*, d.*, r.`last_donate` FROM `user_blood_request` r, `donor_reg` d, `user_reg` u WHERE r.`u_id` = u.`u_id` AND r.`d_id` = d.`d_id` AND r.`status` = 'DONATED'";
    $result = mysqli_query($conn, $qry);

    if ($result->num_rows > 0) {
    ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Requested To</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Blood</th>
                <th>Email</th>
                <th>Donated On</th>

            </tr>
        <?php
        // echo $pid;
        while ($row = mysqli_fetch_array($result)) {
            echo "
                <tr>
                    <td>" . $row['u_name'] . "</td>
                    <td>" . $row['u_age'] . "</td>
                    <td>" . $row['u_phone'] . "</td>
                    <td>" . $row['u_address'] . "</td>
                    <td>" . $row['d_name'] . "</td>
                    <td>" . $row['d_phone'] . "</td>
                    <td>" . $row['d_address'] . "</td>
                    <td>" . $row['d_blood'] . "</td>
                    <td>" . $row['d_email'] . "</td>
                    <td>" . $row['last_donate'] . "</td>
                </tr>";
        }
    } else {
        echo "<div class='no-data'><img class='no-data' src='../assets/images/no-data.png'><h5>No History</h5></div>";
    }

        ?>
        </table>

</div>



<?php

include('../Footer.php');

?>