<?php 
    session_start();
    include_once "http://localhost/Exercise/php/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Cá Nhân - H Store</title>
    <link rel="shortcut icon" href="http://localhost/Exercise/img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Exercise/css/primary.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>

<body>

    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li title="Bộ Sưu Tập">
                    <a href="http://localhost/Exercise/p//collection/collection.html">Bộ sưu tập</a>
                </li>
                <li title="Sản Phẩm">
                    <a href="http://localhost/Exercise/p//product/product.php">Sản Phẩm</a>
                </li>
                <li title="Trang Chủ">
                    <a class="logo" href="http://localhost/Exercise/">
                        <img src="http://localhost/Exercise/img/Layer1.png" alt="">
                    </a>
                </li>
                <li title="Tin Tức">
                    <a href="http://localhost/Exercise/p/news/news.html">Tin Tức</a>
                </li>
                <li title="Giới Thiệu">
                    <a href="http://localhost/Exercise/p/about/about.html">Giới Thiệu</a>
                </li>
            </div>
        </ul>
        <ul class="tool-box">
            <?php if(isset($_SESSION['user_mail'])){ ?>
            <a href="http://localhost/Exercise/p/profile-user/info.html">
                <button type="button">
                    <i class="fas fa-user-circle"></i>
                </button>
            </a>
            <a href="http://localhost/Exercise/p//log-page/#">
                <button type="submit" name="dangxuat">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </a>
            <?php }else{ ?>
            <a href="http://localhost/Exercise/p//log-page/log-page.php">
                <button type="button">
                    <i class="fas fa-user-circle"></i>
                </button>
            </a>
            <?php } ?>
            <a href="http://localhost/Exercise/p//cart-page/cart-page.php">
                <button>
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </a>
            
        </ul>
        <div id="overlay" onclick="closeSearch()"></div>
    </div>

    <div id="main">
        <div class="info-content">
            <h4>Sản phẩm liên quan</h4>
            <?php if(isset($_GET['error'])){  echo "<p class='error';>". $_GET['error'] . "</p>"; } ?>
            <?php if(isset($_GET['success'])){  echo "<p class='success';>". $_GET['success'] . "</p>"; } ?>
           <div class="form-content" >
               <?php 
                    $name = $_GET['name_search'];

                    $sql = "SELECT *  FROM `tb_product` WHERE `name` LIKE '%$name%' Order By `id` DESC ";
                    $rs = mysqli_query($conn, $sql);
                    while( $row = mysqli_fetch_array($rs)){
                ?>  
                <div class="search__item" >
                    <a href="http://localhost/Exercise/p//product/detail-product/detail-product.php?this_id=<?=$row['id']?>">
                        <img src="http://localhost/Exercise/img/<?=$row['img']?>" alt="product">
                    </a>
                    <p><?=$row['name']?></p>
                    <p><?=$row['price']?></p>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div id="footer">

        <div class="footer-content">
            <div class="logo">
                <img src="http://localhost/Exercise/img/Layer1.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Deserunt optio in magnam, amet id modi error placeat iusto, dicta fugit iure possimus.
                    Asperiores, perspiciatis.
                    Officia debitis provident est quis esse reiciendis voluptatem omnis sed eaque culpa! Modi fugiat
                    maiores quis?</p>
            </div>

            <div class="follow">
                <h4>Theo dõi chúng tôi:</h4>
                <div class="content">
                    <a href="http://www.facebook.com"><i class="fab fa-facebook"></i></a>
                    <a href="http://www.youtube.com"><i class="fab fa-youtube"></i></a>
                    <a href="http://www.instagram.com"><i class="fab fa-instagram"></i></a>
                    <a href="http://www.twitter.com"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div class="contact">
                <h4> Thông tin liên lạc:</h4>
                <div class="content">
                    <p>hstore@store.mail.com</p>
                    <p>Nguyễn Tri Phương, P.12, Quận 10</p>
                    <p>0563.406.XXX</p>
                </div>
            </div>
        </div>
    </div>
      
    <script src="http://localhost/Exercise/js/search.js"></script>
</body>
<style>
    .overlay{
        display:none; position: fixed; background-color: black;opacity: .7; width: 100%; height: 100%; top: 0;pointer-events: all;
    }
    .error{
        margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; padding: 5px 10px; background-color: lightblue; width: 40%;
    }
    .success{
        margin: 10px auto;color: green; font-weight: 600; font-size: 16px; border: 1px solid; padding: 5px 10px; background-color: lightgreen; width: 40%;
    }
    .search__item{
        display: flex; justify-content: center; flex-direction: column;text-align: center; margin: 10px 0
    }
    .search__item img{
        width: 250px; height: 300px
    }
</style>
</html>