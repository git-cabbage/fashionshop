<?php 
    session_start();
    include "../../php/config.php";
    include "../../php/defined.php";
    if(isset($_SESSION['a_mail'])){
        header("location: " . ADMIN);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Quyền Quản Trị</title>
    <link rel="stylesheet" href="<?= ADMIN ?>css/admin.css">
</head>
<body>
    <div id="form-admin">
        <form action="login.php?" method="post">
            <h2>Quản Trị</h2>
            <?php if(isset($_POST['login'])){

                $a_mail = $_POST['a_mail'];
                $a_psw = $_POST['a_psw'];

                $sql = "SELECT * FROM tb_users WHERE `email` = '" . $a_mail . "' AND `password` = '" . $a_psw . "' ";

                $rs = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($rs);
                $row2 = mysqli_fetch_array($rs);

               

                if($row > 0){
                     if($row2['role'] == "User"){
                        header("location: ". ADMIN . "error-role");
                        echo "fail";
                    }
                    if($row2['role'] == "Admin"){
                        echo "true";
                        $_SESSION['a_mail'] = $a_mail;
                        $_SESSION['a_fullname'] = $row2['fullname'];

                        header("location: " . ADMIN);
                    }
                }  else{
                    header("location: " . ADMIN . "error-account");
                }   
            }?>
            <?php 
                if(isset($_GET['error'])){  
                    echo "<p class='error'>". $_GET['error'] . "</p>"; 
                } 
            ?>
            <input class="username" name="a_mail" type="email" placeholder="Nhập email">
            <input class="psw" name="a_psw" type="password" placeholder="Nhập mật khẩu">
            <button type="submit" name="login">Xác Nhận</button>
        </form>
    </div>
</body>
<style>
    input[type="email"]{
        padding: 10px;
        margin: 5px;
        border: none;
        border-radius: 10px;
        width: 80%;
    }
    p.error{
        color: red; 
        font-weight: 600; 
        font-size: 16px; 
        border: 1px solid; 
        padding: 5px 10px; 
        background-color: lightblue; 
        width: 70%;
    }
</style>
</html>