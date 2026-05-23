<?php
session_start();
include '../DbConnection/DbConnection.php';

$id=$_GET['id'];

$query="DELETE FROM tb_product WHERE productcode='$id'";
// echo $query;
$result=mysqli_query($conn,$query);
// echo $result;
//  echo $query;
if($result){
    echo "<script type=\"text/javascript\">
         alert(\"Status Updated\");
         window.location=(\"addproduct.php\");
    </script>";
}