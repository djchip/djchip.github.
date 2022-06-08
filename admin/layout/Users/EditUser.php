<?php include '../../../common/authorization.php'; ?>
<?php
    include '../../../common/connectSQL.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $sql_up = "SELECT * FROM users where id = $id";
    $qr_up = mysqli_query($conn,$sql_up);
    $row_up = mysqli_fetch_assoc($qr_up);
    if(isset($_POST['upload'])){
        // $sql = "SELECT * FROM vendors ";
        // $qr = $mysqli_query($conn,$sql);
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $role = $_POST['role'];
        $user_name = $_POST['user_name'];
        $created_date = $row_up['created_date'];
        //var_dump($created_date);
        $password = $_POST['password'];
        $address = $_POST['address'];
        
        $sql = "UPDATE `users` SET `email`='$email',`password`='$password',`full_name`='$full_name',`phone`='$sdt',`address`='$address',`created_date`='$created_date',`user_name`='$user_name',`role`='$role' WHERE id  = $id";
        $qr = mysqli_query($conn,$sql);
        header("location: ListUsers.php");
        var_dump($qr);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./../../css/dashboard.css">
    <link rel="stylesheet" href="./../../css/Addfood.css">
</head>
<body>
    <?php  include '../common/header.php'?>
    <main>
    <?php  include '../common/left.php'?>
        <div class="right">
            <h1>Edit User</h1>
            <h2><a href="#">Dasboard</a>/Edit User</h2>
            <div class="content_basic">
                <p>Basic info</p>
                <hr/>
                <form method ="POST" action="">

                    <label>Full Name</label><br>
                    <input type ="text" name="full_name" class="col-6" value="<?php  echo $row_up['full_name']?>"><br><br>
                    <label>User Name </label><br>
                    <input type ="text" name="user_name" class="col-6" value="<?php  echo $row_up['user_name']?>"><br><br>
                    <label>Email</label><br>
                    <input type ="text" name="email" class="col-6" value="<?php  echo $row_up['email']?>"><br><br>
                    <label>Password</label><br>
                    <input type ="text" name="password" class="col-6" value="<?php  echo $row_up['password']?>"><br><br>
                    <label>SDT</label><br>
                    <input type ="text" name="sdt" class="col-6" value="<?php  echo $row_up['phone']?>"><br><br>
                    <label>Địa chỉ</label><br>
                    <input type ="text" name="address" class="col-6" value="<?php  echo $row_up['address']?>"><br><br>
                    <label>Vai trò</label><br>
                    <input type ="text" name="role" class="col-6" value="<?php  echo $row_up['role']?>"><br><br>
                    <br><input type="submit" name="upload" value="Lưu" class="end text-right blue" >
                </form>
                
            </div>
        </div>  
    </main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>