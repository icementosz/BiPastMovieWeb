<?php
    include('connection.php');
    
    $idtype=$_POST['idtype'];
    $type=$_POST['type'];

    $sql="UPDATE type SET
    name_type='$type'
    WHERE id_type=$idtype";

    $result=mysqli_query($conn,$sql);
    echo "<script>";
        echo "alert('แก้ไขข้อมูลเรียบร้อย');";
        echo "window.location = 'adminpage3.php';";
    echo "</script>";
?>