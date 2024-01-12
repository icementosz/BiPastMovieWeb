<?php
    include('connection.php');
    
    $idcategory=$_POST['idcategory'];
    $namecategory=$_POST['namecategory'];

    $sql="UPDATE category SET
    name_category='$namecategory'
    WHERE id_category=$idcategory";

    $result=mysqli_query($conn,$sql);
    echo "<script>";
        echo "alert('แก้ไขข้อมูลเรียบร้อย');";
        echo "window.location = 'adminpage2.php';";
    echo "</script>";
?>