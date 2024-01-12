<?php 
    include('connection.php');
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql = "DELETE FROM category WHERE id_category=$id";
        $query=mysqli_query($conn,$sql);
        if($query){
            header('location: adminpage2.php');
        }else{
            //die(mysqli_error($conn));
            echo "<script>";
                echo "alert('ไม่สามารถลบได้เนื่องจากมี Movie ที่ยังใช้ Category นี้อยู่');";
                echo "window.location = 'adminpage2.php';";
            echo "</script>";
        }
    }
?>