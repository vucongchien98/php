<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa tài khoản</title>
    <style>
        .box-content {
            margin: 0 auto;
            width: 800px;
            border: 1px solid darkgrey;
            text-align: center;
            padding: 20px;
        }
        </style>
</head>
<body>
    <?php
        $error = false;
        if (isset($_GET['mssv']) && !empty($_GET['mssv'])) {
            include './connect_db.php';
            $result = mysqli_query($con, "DELETE FROM `content` WHERE `mssv` = ".$_GET['mssv']);
            if (!$result){
                $error = "Không thể xóa";
            }
            mysqli_close($con);
            if ($error !== false) {
                ?>
                <div id="error-notify" class="box-content">
                    <h1>Thông Báo</h1>
                    <h4><?=  $error ?></h4>
                    <a href="./list_content.php">Danh sách bài viết</a>
                </div>
                <?php } else { ?>
                    <div id="success-notify" class="box-content">
                        <h1>Xóa thành công</h1>
                        <a href="./list_content.php">Danh sách bài viết</a>
                    </div>  
                <?php } ?>
            <?php } ?>
</body>
</html>