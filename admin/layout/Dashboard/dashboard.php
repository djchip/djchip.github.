<?php include '../../../common/authorization.php'; ?>
<?php
    include '../../../common/connectSQL.php';
    if (!function_exists('currency_format')) {
		function currency_format($number, $suffix = 'đ') {
			if (!empty($number)) {
				return number_format($number, 0, ',', '.') . "{$suffix}";
			}
		}
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
        <div class="right ">
            <br>
        <h2>Thống kê hoạt động Website</h2>
        <br>
                <div class="top row">

                
                <div class="product col">
                    <h3>PRODUCT</h3>
                    <?php
                        $sql = "select sum(quantity) 'total' from importation_products";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_row($result);
                    ?>
                    <p>Tổng số sản phẩm tồn kho : <?=$row[0] ?> </p>
                </div>
                <div class="order col">
                    <h3>ORDER</h3>
                    <div class="alert alert-primary">
                        <?php
                            $sql = "select count(*) from orders where DATEDIFF(CURDATE(), created_date)=0 and status=2";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_row($result);
                        ?>
                        <h6>Số hàng đã bán trong ngày : <?=$row[0]?></h6>
                        <?php
                            $sql = "select sum(total_price) from orders where DAY(CURDATE())=DAY(created_date) AND status=2";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_row($result);
                            $doanhThu= $row[0];
                        ?>
                        <div>Doanh thu ngày: <?=currency_format($doanhThu)?></div>
                    </div>
                    <div class="alert alert-primary">
                    <?php
                        $sql = "select count(*) from orders where MONTH(CURDATE())=MONTH(created_date) and status=2";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_row($result);
                    ?>
                    <h6>Số hàng đã bán trong tháng : <?=$row[0]?></h6>
                    <?php
                            $sql = "select sum(total_price) from orders where MONTH(CURDATE())=MONTH(created_date) AND status=2";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_row($result);
                            $doanhThu= $row[0];
                        ?>
                        <div>Doanh thu tháng: <?=currency_format($doanhThu)?></div>
                    </div>
                    <div class="alert alert-primary">
                    <?php
                        $sql = "select count(*) from orders where YEAR(CURDATE())=YEAR(created_date) and status=2";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_row($result);
                    ?>
                    <h6>Số hàng đã bán trong tháng : <?=$row[0]?></h6>
                    <?php
                            $sql = "select sum(total_price) from orders where YEAR(CURDATE())=YEAR(created_date) AND status=2";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_row($result);
                            $doanhThu= $row[0];
                        ?>
                        <div>Doanh thu năm: <?=currency_format($doanhThu)?></div>
                    </div>
                </div>
                <div class="importation col">
                <h3>IMPORTATION</h3>
                     <?php
                        $sql = "select sum(ip.quantity) 
                            from importations i join importation_products ip on i.id=ip.importation_id
                            where DAY(CURDATE())=DAY(i.import_date);";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_row($result);
                    ?>
                    <h6>Số hàng nhập trong ngày : <?=$row[0]?></h6>
                    <?php
                        $sql = "select sum(ip.quantity) 
                            from importations i join importation_products ip on i.id=ip.importation_id
                            where MONTH(CURDATE())=MONTH(i.import_date);";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_row($result);
                    ?>
                    <h6>Số hàng nhập trong tháng : <?=$row[0]?></h6>
                    <?php
                        $sql = "select sum(ip.quantity) 
                            from importations i join importation_products ip on i.id=ip.importation_id
                            where YEAR(CURDATE())=YEAR(i.import_date);";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_row($result);
                    ?>
                    <h6>Số hàng nhập trong năm : <?=$row[0]?></h6>
                </div>
                </div>
                <div class="bottom row">
                    <div class="user col">
                    <h3>USER</h3>
                    <?php
                        $sql = "SELECT count(*) from users where role LIKE 'user' and DAY(CURDATE())=DAY(created_date)";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_row($result);
                    ?>
                    <h6>Số lượng khách hàng trong ngày : <?=$row[0]?></h6>
                    <?php
                        $sql = "SELECT count(*) from users where role LIKE 'user' and MONTH(CURDATE())=MONTH(created_date)";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_row($result);
                    ?>
                    <h6>Số lượng khách hàng trong tháng : <?=$row[0]?></h6>
                    <?php
                        $sql = "SELECT count(*) from users where role LIKE 'user' and YEAR(CURDATE())=YEAR(created_date)";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_row($result);
                    ?>
                    <h6>Số lượng khách hàng trong năm : <?=$row[0]?></h6>
                    </div>
                    <div class="comment col">
                    <h3>COMMENT</h3>
                    <?php
                        $sqlComment = "SELECT count(*) from comments where DAY(CURDATE())=DAY(created_date)";
                        $sqlSubComment = "SELECT count(*) from sub_comments where DAY(CURDATE())=DAY(created_date)";
                        $resultComment = mysqli_query($conn, $sqlComment);
                        $resultSubComment = mysqli_query($conn, $sqlSubComment);
                        $rowComment = mysqli_fetch_row($resultComment);
                        $rowSubComment = mysqli_fetch_row($resultSubComment);
                        $tongComment = $rowComment[0] + $rowSubComment[0];
                    ?>
                    <h6>Số lượng tương tác trong ngày : <?=$tongComment?></h6>

                    <?php
                        $sqlComment = "SELECT count(*) from comments where MONTH(CURDATE())=MONTH(created_date)";
                        $sqlSubComment = "SELECT count(*) from sub_comments where MONTH(CURDATE())=MONTH(created_date)";
                        $resultComment = mysqli_query($conn, $sqlComment);
                        $resultSubComment = mysqli_query($conn, $sqlSubComment);
                        $rowComment = mysqli_fetch_row($resultComment);
                        $rowSubComment = mysqli_fetch_row($resultSubComment);
                        $tongComment = $rowComment[0] + $rowSubComment[0];
                    ?>
                    <h6>Số lượng tương tác trong tháng : <?=$tongComment?></h6>

                    <?php
                        $sqlComment = "SELECT count(*) from comments where YEAR(CURDATE())=YEAR(created_date)";
                        $sqlSubComment = "SELECT count(*) from sub_comments where YEAR(CURDATE())=YEAR(created_date)";
                        $resultComment = mysqli_query($conn, $sqlComment);
                        $resultSubComment = mysqli_query($conn, $sqlSubComment);
                        $rowComment = mysqli_fetch_row($resultComment);
                        $rowSubComment = mysqli_fetch_row($resultSubComment);
                        $tongComment = $rowComment[0] + $rowSubComment[0];
                    ?>
                    <h6>Số lượng ktương tác trong năm : <?=$tongComment?></h6>
                    </div>
                </div>
            
        
        </div>
    </main>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>