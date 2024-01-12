<?php 
    include('connection.php');
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sqlz= "DELETE FROM data_likes WHERE id_user=$id";
        $queryz=mysqli_query($conn,$sqlz);
        $sqlx= "DELETE FROM data_playlist WHERE id_user=$id";
        $queryx=mysqli_query($conn,$sqlx);
        $sql = "DELETE FROM user WHERE id=$id";
        $query=mysqli_query($conn,$sql);
        if($query){
            header('location: adminpage1.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>