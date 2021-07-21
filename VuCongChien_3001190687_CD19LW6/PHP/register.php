<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Đăng kí</title>
    <style>
        .box-content {
            margin: 0 auto;
            width: 800px;
            border: 1px solid #ccc;
            text-align: center;
            padding: 20px;
        }
        #user_register form {
            width:200px;
            margin: 40px auto;
        }
        #user_register form input {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <?php 
        include './connect_db_client.php';
        include './function.php';
        $error = false;
        if ( isset($_GET['action']) && $_GET['action'] == 'reg'){
            if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
                $fullname = $_POST['fullname'];
                $birthday = $_POST['birthday'];
                $check = validateDateTime($birthday);
                if ($check){
                    $birthday = strtotime($birthday);
                    $result = mysqli_query($con,"INSERT INTO `user_client` (`fullname`,`username`,`password`,`birthday`,`create_time`,`last_updated`) 
                                                VALUE ('".$_POST['fullname']."','".$_POST['username']."',MD5('".$_POST['password']."'),'".$birthday."','".time()."','".time()."');");
                    if(!$result) {
                        if (strpos(mysqli_error($con),"Duplicate entry") !== FALSE){
                            $error = "tài khoản đã tồn tại. Bạn vui long chọn tài khoản khác";
                        }
                }
                mysqli_close($con);
            } else {
                $error = "Ngày tháng nhập chưa chính xác";
            }
            if ($error !== false){
                ?>
                <div id="error_notify" class="box-content">
                    <h1>THông Báo</h1>
                    <h4><?= $error ?></h4>
                    <a href="./register.php">Quay lại</a>
                </div>
            <?php } else { ?>
                <div id="edit-notify" class="box-content">
                    <h1><?= ($error !== false) ? $error: "đăng kí tài khoản thành công" ?></h1>
                    <a href="./login.php">Mời bạn đăng nhập</a>
                </div>
                <?php } ?>
            <?php } else { ?>
                <div id="edit_notify" class="box-content">
                    <h1>Vui lòng nhập đầy đủ thông tin</h1>
                    <h4><?= $error ?></h4>
                    <a href="./register.php">Quay lại</a>
                </div>
                <?php
        }
    }else {
    ?>
    <div class="box-content" id="user_register">
        <h1>Đăng kí tài khoản</h1>
        <form action="./register.php?action=reg" method="Post" autocomplete="off">
            <label for="">Username</label>
            <input type="text" name="username" value=""><br/>
            <label for="">Password</label>
            <input type="password" name="password" value=""><br/>
            <label for="">Họ tên</label>
            <input type="text" name="fullname" id=""><br/>
            <label for="">Ngày sinh</label>
            <input type="text" name="birthday" id=""><br/>
            <br>
            <br>
            <input type="submit" value="đăng ký">
        </form>
    </div>
    <?php } ?>
</body>
</html>