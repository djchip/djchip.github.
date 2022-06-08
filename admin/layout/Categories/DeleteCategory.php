<?php include '../../../common/authorization.php'; ?>
<?php
    include '../../../common/connectSQL.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $sql = "DELETE FROM `categories` WHERE id = $id";
    mysqli_query($conn,$sql);
    header("location: ListCategory.php");
?>