<?php 
    include('connection.php');


    $moviename=$_POST['name'];
    $category=$_POST['category'];
    $type=$_POST['type'];
    $year=$_POST['year'];
    $time=$_POST['time'];
    $details=$_POST['detailz'];
    $img=$_POST['img'];
    $trailerlink=$_POST['trailerlink'];
    $fullmovielink=$_POST['fullmovielink'];

    $sql = "INSERT INTO data_movie
    (name,id_categorym,year,minute,img,vdo_ex,vdo_main,detail)
    VALUES
    ('$moviename','$category','$year','$time','$img','$trailerlink','$fullmovielink','$details')
    ";
    $result=mysqli_query($conn,$sql) or die("Error in sql : $sql".mysqli_error($sql));
    $lastid=mysqli_insert_id($conn);
    
    foreach($type as $rowtype){
        $query1="INSERT INTO nameandtype (id_movie,id_type) VALUE ('$lastid','$rowtype')";
        $query_run=mysqli_query($conn,$query1) or die("Error in sql : $sql".mysqli_error($sql));
    }
    echo "<script>";
        echo "alert('เพิ่มข้อมูลเรียบร้อย');";
        echo "window.location = 'adminpage4.php';";
    echo "</script>";
?>