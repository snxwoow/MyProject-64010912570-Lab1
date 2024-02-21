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
<title>ฟอร์มเพิ่มประเภทสินค้า</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

 <h1>ฟอร์มเพิ่มประเภทสินค้า</h1> <br>
 
 <form action="" method="post" enctype="multipart/from-data">
        <input type="text" name="cname" autofocus require>
        <input class="btn btn-dark" type="submit" name="Submit" value="บันทึก">
    </form>

        <?php
        include("connectdb.php");
        if(isset($_POST['Submit'])){
            
            $sql2 = "INSERT INTO `category` (`c_id`, `c_name`) VALUES (NULL, '{$_POST['cname']}');";
            mysqli_query($conn, $sql2) or die ("เพิ่มข้อมูลประเภทสินค้าสำเร็จ");
            $idd = mysqli_insert_id($conn);
            
            
            echo"<script>";
            echo"alert('เพิ่มข้อมูลประเภทสินค้าสำเร็จ');";
            echo"</script>";
            
        }
        ?>
    <br>
    แสดงข้อมูลประเภทสินค้า
    <div>
        <ol>
            <?php
            $sql = "SELECT * FROM `category`";
            $rs = mysqli_query($conn,$sql);
            while ($data = mysqli_fetch_array($rs)){
            ?>
                <li  value="<?=$data['c_id'];?>"><?=$data['c_name'];?></li>  
            <?php } ?>
        </ol>
    </div>

</body>
</html>