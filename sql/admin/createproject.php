<?php
session_start();
require('../../connect.php');


if(isset($_POST['name']) && isset($_POST['date']) && isset($_POST['type']) ){

    $username = $_SESSION['username'];
    $query_pj = "SELECT `dp` FROM `admin` WHERE `username` = '".$username."' "; // คำสั่ง sql
    $result_pj = mysqli_query($con,$query_pj); 

        while ($row = mysqli_fetch_assoc($result_pj)) {
            $dp = $row['dp'];
            break;
        }

    $name = mysqli_real_escape_string($con,$_POST['name']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $type = mysqli_real_escape_string($con,$_POST['type']);

    $sql_cp = " INSERT INTO `project`(`name`, `dp`, `date`, `tempate`, `type`) VALUES('$name', '$dp', '$date', '', '$type')";
    $res = mysqli_query($con, $sql_cp);

    if (false === $res) {
        die(mysqli_error($con));
    }

    $msg = "บันทึกโครงการ/กิจกรรมสำเร็จ [SUCCESS]";
    $_SESSION['msg_s'] = $msg;
    header('location: ../../admin.php');
}


else{
    echo 'ท่านเรียนใช้งานไม่ถูกต้อง [ERROR-ID]';
}

?>