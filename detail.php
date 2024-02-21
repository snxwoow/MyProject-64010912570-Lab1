<?php 
@session_start();
if(empty($_SESSION['aid'])){  
	echo"Access Denied !!!";
	exit;
}

echo $SESSION['aname'];
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>แสดงรายละเอียดข้อมูลสินค้า</title>
</head>

<body>

<h1>แสดงรายละเอียดข้อมูลสินค้า</h1>
<input type="button" value="Back" onClick="history.back();"><br><br>

<?php
include("connectdb.php");

$sql = "SELECT * FROM `products` WHERE `p_id`='{$_GET['id']}' ";
$rs = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($rs);
?>


<img src="images/<?=$data ['p_id'];?>.<?=$data ['p_img'];?>" width="475"><br>
<?=$data ['p_name'];?><br>
<?=$data ['p_price'];?> บาท <br>
<strong>รายละเอียดสินค้า</strong><br>
<?=$data ['p_detail'];?>


</body>
</html>