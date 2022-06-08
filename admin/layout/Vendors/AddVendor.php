<?php
   session_start();
   if(isset($_SESSION['ID'])){
       include '../../../common/connectSQL.php';
   }else{
       include "../../../common/authorization.php";
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./../../css/dashboard.css">
    <link rel="stylesheet" href="./../../css/Addfood.css">
</head>
<body>
    <?php  include '../common/header.php'?>
    <main>
    <?php  include '../common/left.php'?>

    <?php
if(isset($_POST['upload'])){
        // $sql = "SELECT * FROM vendors ";
        // $qr = $mysqli_query($conn,$sql);
        $vendor_name = $_POST['vendor_name'];
        $address = $_POST['address'];
        $employee_name = $_POST['employee_name'];
        $sql = "INSERT INTO `vendors`( `name`, `address`, `employee_name`) VALUES ('$vendor_name','$address','$employee_name')";
        $qr = mysqli_query($conn,$sql);
        header("location: ListVendor.php");
    }
    ?>
        <div class="right">
            <h1>Add Vendor</h1>
            <h2><a href="#">Dasboard</a>/Add Vendor</h2>
            <div class="content_basic">
                <p>Basic info</p>
                <hr/>
                <form method ="POST">
                    <label>Tên nhà cung cấp</label><br>
                    <input type ="text" name="vendor_name" class="col-6"><br><br>
                    <label>Địa chỉ</label><br>
                    <input type ="text" name="address" class="col-6"><br><br>
                    <label>Nhân viên giao hàng</label><br>
                    <input type ="text" name="employee_name" class="col-6"><br><br>
                    <br><input type="submit" name="upload" value="Lưu" class="end text-right blue" >
                </form>
            </div>
        </div>  
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>