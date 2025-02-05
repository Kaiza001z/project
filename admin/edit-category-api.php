<?php session_start();
include("../include/config.php");
error_reporting(0);

if($_SESSION['user_type']==1){
    header('location:logout.php');
}else{
    if(isset($_POST['update'])){
        $eid = $_POST['eid'];
        $catname = $_POST['cat_name'];
        $hasedpassword = hash('sha256',$loginpassword);
        //print_r($_POST);


        $sql ="UPDATE userdata SET catname=:cat_name WHERE id=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':eid',$eid,PDO::PARAM_STR);
        $query->bindParam(':cat_name',$catname,PDO::PARAM_STR);
        $query->execute();
        echo "<script>alert('User has been updated')</script>";
        echo "<script>window.location.href='manage_category.php'</script>";
        

    }
}


?>