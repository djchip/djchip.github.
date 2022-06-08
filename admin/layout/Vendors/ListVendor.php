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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./../../css/dashboard.css">
    <link rel="stylesheet" href="./../../css/Addfood.css">
</head>
<body>
    <?php include "./../common/header.php"?>
    <main>
        <?php include "./../common/left.php"?>
        <div class="right">
            <h1>Order Pages</h1>
            <h2><a href="#">Dasboard</a>/List Imprtation</h2>
            <div class="bang">
                <p><i class="fas fa-clipboard-list"></i>All Listings</p>
                <table border="1"  cellspacing="0.4px" >
                    <thead>
                    <tr>
                        <th width=200px>STT</th>
                        <th width=200px>Tên nhà cung cấp</th>
                        <th width=200px>Địa chỉ</th>
                        <th width=200px>Nhân viên giao hàng</th>
                        <th width=200px> Action </th>
        
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    $sql = "select * from vendors";
                    $query = mysqli_query($conn, $sql);
                    //var_dump($query);
                   $i = 0;
                   
                    while($row = $query->fetch_row()) {
                        //var_dump($row);
                        $i++;
                        echo "
                        <tr>
                            <td width=200px>".$i."</td>
                            <td width=200px>".$row[1]."</td>
                            <td width=200px>".$row[2]."</td>
                            <td width=200px>".$row[3]."</td>
                            <td width=200px><button class='blue'><a href='./EditVendor.php?id=".$row['0'] ."'>Sửa</a></button><button class='red'><a href='./DeleteVendor.php?id=".$row[0] ."'onclick='return XacNhanXoa()'>Xóa</a></button></td>
                            
                        </tr>";
                    }
?>
                </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer>
        <span>Copyright @ Your website 2021</span>
        <span>Privacy policy . Term conditions</span>
    </footer>
</body>
<script>
    function XacNhanXoa(){
       return confirm("Bạn có chắc chắc muốn xóa danh mục nay hay không ?");
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>