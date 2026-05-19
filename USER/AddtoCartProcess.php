<?php
session_start();
include '../CONNECTION/DbConnection.php';


$pid = $_REQUEST['pid'];
$cusid = $_REQUEST['cusid'];
$centerid = $_REQUEST['centerid'];
$item = $_REQUEST['item'];
$mdate =  date("Y/M/d");

$query = "INSERT into `tb_cart` (`cusid`,`centerid`,`itemid`,`item`,`date`,`status`)VALUES ('$cusid','$centerid','$pid','$item','$mdate','incart')";
$result = mysqli_query($conn, $query);

$qry = "INSERT INTO bookings(`user_id`,`shop_id`,`cid`,`delivery_boy`,`item_id`,`itemname`,`date`,`status`)VALUES('$cusid','$centerid',(select max(cart_id) from tb_cart),'NO VAL','$item','$pid','$mdate','NOT DELIVERED')";
$result1 = mysqli_query($conn, $qry);

echo $qry;
if ($result === TRUE &&  $result1 === TRUE) {
	echo "<script type = \"text/javascript\">
					alert(\"Item Added To cart\");
					window.location = (\"viewShop.php\")
				</script>";
}
