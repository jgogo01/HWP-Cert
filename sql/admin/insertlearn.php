<?php
require('../../connect.php');

if(isset($_POST['id'])){
    $sql = "SELECT * from `user` WHERE `id` = ".$_POST["id"];
    $rs = mysqli_query($con,$sql);

    if (false === $rs) {
        die(mysqli_error($con));
    }

    while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
        $arr[] = $row;
    }

    echo json_encode($arr);

    mysqli_free_result($rs);
    mysqli_close($con);
}
?>
