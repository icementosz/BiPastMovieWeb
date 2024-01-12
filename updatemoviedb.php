<?php 
    include('connection.php');

    session_start();
    $id = $_SESSION['movieid'];
    $moviename=$_POST['name'];
    $category=$_POST['category'];
    $type=$_POST['type'];
    $year=$_POST['year'];
    $time=$_POST['time'];
    $detail=$_POST['detailz'];
    $img=$_POST['img'];
    $trailerlink=$_POST['trailerlink'];
    $fullmovielink=$_POST['fullmovielink'];

    // Delete ข้อมูลในตาราง nameandtype ที่มี id ตรงกัน
    $sql = "DELETE FROM nameandtype WHERE id_movie=$id";
    $query=mysqli_query($conn,$sql);
    
    //อัพเดทตาราง data_movie ปกติ
    $sqlmovie="UPDATE data_movie SET


    name='$moviename',
    id_categorym='$category',
    year='$year',
    minute='$time',
    img='$img',
    vdo_ex='$trailerlink',
    vdo_main='$fullmovielink',
    detail='$detail'

    WHERE id=$id
    ";

    //เพิ่ม type ต่างๆลงไปในตาราง nameandtype 
    foreach($type as $rowtype){
        $querytype="INSERT INTO nameandtype (id_movie,id_type) VALUE ('$id','$rowtype')";
        $query_run=mysqli_query($conn,$querytype);
    }

    $querymovie=mysqli_query($conn,$sqlmovie);
    echo "<script>";
        echo "alert('แก้ไขข้อมูลเรียบร้อย');";
        echo "window.location = 'adminpage4.php';";
    echo "</script>";

?>