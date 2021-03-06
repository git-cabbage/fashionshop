<?php
    session_start();
    include "../../php/config.php";
    include "../../php/defined.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Danh Mục</title>
    <link rel="shortcut icon" href="<?= URL ?>img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= ADMIN ?>css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="main">
        <div id="header">
            <div class="header-content">
                <h2>Fashion Admin</h2>
                <div class="header-tool">
                    <button>
                        <i class="fas fa-envelope"></i>
                    </button>
                    <button>
                        <i class="fas fa-bell"></i>
                    </button>
                </div>
            </div>
        </div>
        <div id="nav-bar">
            <div class="bar-content" >
                <div class="avatar" >
                    <i class="fas fa-user-tie"></i>
                    <?php
                        $session = $_SESSION['a_mail'];

                        $sql = "SELECT * FROM tb_users WHERE email = '$session' ";
                        $rs = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($rs);
                    ?>  
                    <p>
                        <?=$row['fullname'];?>
                    </p>
                </div>
                <div class="list-edit">
                    <li>
                        <a href="<?= ADMIN ?>" >Thống Kê</a>
                    </li>
                    <li>
                        <a class="active" href="<?= ADMIN ?>cate/">Danh Sách Danh Mục</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>pro/">Danh Sách Sản Phẩm</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>ns/">Danh Sách Bài Viết</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>or/">Danh Sách Đơn Hàng</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>acc/">Danh Sách Tài Khoản</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>out/">Đăng Xuất</a>
                    </li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content">
                <div class="add" >
                    <form action="<?= ADMIN ?>c/add" method="post">
                        <input type="text" name="addname" autocomplete="off">
                        <button type="submit" name="addbtn" >Thêm</button>
                    </form>
                </div>
                <?php 
                    if(isset($_GET['error'])){  echo "<p class='error'>". $_GET['error'] . "</p>"; } 

                     if(isset($_GET['success'])){  echo "<p class='success'>". $_GET['success'] . "</p>"; }
                ?>
                <table >
                    <tr>
                        <th>ID</th>
                        <th>Tên Loại</th>
                        <th>Trạng Thái</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM tb_category ORDER BY id ASC ";

                        $rs = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_array($rs)){
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= (($row['name'] == "Bộ Sưu Tập" || $row['name'] == "Mới") ? "Nổi Bật" : "Đang Bán") ?></td>
                        <td>
                            <div class="edit">
                                <a class="up" href="<?= ADMIN ?>c/edit/<?=$row['id']?>">
                                    Sửa
                                </a>
                                <a class="down" href="<?= ADMIN ?>c/remove/<?=$row['id']?>">
                                    Xóa
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
<style>
    .active{
        pointer-events: all !important;
    }
    #container{
        height: 900px;
    }
    #container .content{
      
        width: 85%;
        margin: 20px auto;
        background-color: whitesmoke;
        border-radius: 15px;
        display: flex; 
        flex-direction: column;
    }
    a{
        text-decoration: none;
    }
    .up{
        border-radius: 5px;
        padding: 10px 10px;
        margin: 10px;
        background-color: lightgreen !important;
        color: black !important;
    }
    .down{
        border-radius: 5px;
        padding: 10px 10px;
        margin: 10px;
        background-color: lightcoral !important;
        color: black !important;
    }
    #container td:last-child{
        height: 50px;
        max-height: auto;
    }
    th,td  {
        white-space: nowrap;
    }
    #nav-bar .bar-content .avatar p{
        margin: 10px;
    }
    #container .content .add{
        text-align: center; margin: 10px 0;
    }
    .content .add form input[type="text"]{
        padding: 10px 5px; border-radius: 5px; border: 1px solid;text-align: center;width: 30%
    }
    .content .add form button{
        padding: 10px 5px ; background-color: black;border: 1px solid; border-radius: 5px;color: whitesmoke;font-size: 15px;cursor: pointer;
    }
    .content p.error{
        margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;
    }
    .content p.success{
        margin: 10px auto;color: green; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightgreen; width: 30%; text-align: center;
    }
    .content table{
        max-width: 50%; margin: 0 auto;
    }
</style>
</html>