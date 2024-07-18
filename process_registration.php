<?php
    session_start();
    include('config.php');
    extract($_POST);
    mysqli_query($conn,"insert into  tbl_registration values(NULL,'$name','$email','$phone','$age','gender')");
    $id=mysqli_insert_id($conn);
    mysqli_query($conn,"insert into  tbl_login values(NULL,'$id','$email','$password','2')");
    $_SESSION['user']=$id;
    header('location:index.php');
?>