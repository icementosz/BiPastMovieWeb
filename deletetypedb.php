<?php 
    include('connection.php');
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql = "DELETE FROM type WHERE id_type=$id";
        $query=mysqli_query($conn,$sql);
        if($query){
            header('location: adminpage3.php');
        }else{
            //die(mysqli_error($conn));
            echo "<script>";
                echo "alert('ไม่สามารถลบได้เนื่องจากมี Movie ที่ยังใช้ Type นี้อยู่');";
                echo "window.location = 'adminpage3.php';";
            echo "</script>";
        }
    }
?>