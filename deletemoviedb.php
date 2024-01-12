<?php 
    include('connection.php');
    
    $id = $_GET['id'];
    $sql = "DELETE FROM nameandtype WHERE id_movie=$id";
    $query=mysqli_query($conn,$sql);
    $sql1 = "DELETE FROM data_likes WHERE id_movie=$id";
    $query1=mysqli_query($conn,$sql1);
    $sql2 = "DELETE FROM data_playlist WHERE id_movie=$id";
    $query2=mysqli_query($conn,$sql2);
    $sql3 = "DELETE FROM data_movie WHERE id=$id";
    $query3=mysqli_query($conn,$sql3);
    echo "<script>";
        echo "alert('ลบข้อมูลเรียบร้อย');";
        echo "window.location = 'adminpage4.php';";
    echo "</script>";
?>

