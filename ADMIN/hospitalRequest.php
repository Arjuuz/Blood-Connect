<?php
include('adminHeader.php');
?>
<!--/breadcrumb-bg-->
<div class="breadcrumb-bg w3l-inner-page-breadcrumb py-5">
    <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
        <h2 class="title pt-5">Hospital Request</h2>
        <ul class="breadcrumbs-custom-path mt-3 text-center">
            <li><a href="adminHome.php">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Hospital Request </li>
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
    $qry = "SELECT * FROM hospital h,`login` l WHERE h.`h_id`=l.`reg_id` AND l.`status`='0' AND l.`type` = 'HOSPITAL'";
    $result = mysqli_query($conn, $qry);
    if ($result->num_rows > 0) {
    ?>
        <table>
            <tr>
                <th>Hospital</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th colspan="2">Action</th>
            </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            echo "
                <tr>
                    <td>" . $row['h_name'] . "</td>
                    <td>" . $row['h_address'] . "</td>
                    <td>" . $row['h_phone'] . "</td>
                    <td>" . $row['h_email'] . "</td>
                    <td><a class='approve-btn' href='../PROCESS/AdminApproveHospital.php?id=" . $row['h_id'] . "'>Approve</a></td><td><a class='reject-btn' href='../PROCESS/AdminRejectHospital.php?id=" . $row['h_id'] . "'>Reject</a></td>
                </tr>";
        }
    } else {
        echo "<div class='no-data'><img class='no-data' src='../assets/images/no-data.png'><h5>No Hospital Request</h5></div> ";
    }

        ?>
        </table>
</div>
<?php
include('../Footer.php');
?>