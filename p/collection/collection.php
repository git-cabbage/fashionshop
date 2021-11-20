<?php
    session_start();
    include "../../php/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bộ Sưu Tập - H Store</title>
    <link rel="shortcut icon" href="../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/primary.css">        
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>

<body>

    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li><a href="./collection.php">Bộ sưu tập</a></li>
                <li><a href="../product/product.php">Sản Phẩm</a></li>
                <li><a class="logo" href="../../index.php"><img src="../../img/Layer1.png" alt=""></a></li>
                <li><a href="../news/news.php">Tin Tức</a></li>
                <li><a href="../about/about.php">Giới Thiệu</a></li>
            </div>
        </ul>
        <ul class="tool-box">
            <?php if(isset($_SESSION['user_mail'])){ ?>
            <a href="../profile-user/info.php">
                <button type="button">
                    <i class="fas fa-user-circle"></i>
                </button>
            </a>
            <a href="../log-page/#">
                <button type="submit" name="dangxuat">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </a>
            <?php }else{ ?>
            <a href="../log-page/log-page.php">
                <button type="button">
                    <i class="fas fa-user-circle"></i>
                </button>
            </a>
            <?php } ?>
            <a href="../cart-page/cart-page.php">
                <button>
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </a>
            
            <button type="button" onclick="openSearch()">
                <i class="fas fa-search"></i>
            </button>
            <div style="display: none;position: fixed;left: 0;top: 150px; width: 100%; padding: 10px 0;z-index: 10;" id="modal-search">
                
                <form action="../search/search_item.php" method="get" style="display: flex; justify-content: center; width: 100%; background-color: #a77349bd; margin: 0 auto; padding: 20px;">
                    <input name="name_search" type="text" style="width: 400px;font-size: 18px;padding: 10px 5px; margin: 0 10px; border-radius: 5px">
                    <input type="submit" name="search" value="Tìm kiếm" style="padding: 10px 5px; margin: 0 10px; border-radius: 5px">
                </form>

            </div>
                
        </ul>
        <div id="overlay" style="display:none; position: fixed; background-color: black;opacity: .7; width: 100%; height: 100%; top: 0;pointer-events: all;" onclick="closeSearch()"></div>
    </div>

    <div id="slideshow">
        <div class="slideshow-img">
            <img src="https://gotrangtri.vn/wp-content/uploads/2020/06/mau-shop-thoi-trang-dep6.jpg" class="slideshow"
            alt="">
            <img src="https://www.w3schools.com/howto/img_mountains_wide.jpg" class="slideshow" alt="">
            <img src="https://www.w3schools.com/howto/img_nature_wide.jpg"  class="slideshow" alt="">
        </div>
        <div class="bottom-slideshow">
            <span class="dot" onclick="currentSlide(0)"></span> 
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
        </div>
    </div>
    
    <div id="main">
        <div class="main-collection">
            <h4>Bộ Sưu Tập Nam Nổi Bật</h4>
            <?php 
                $sql = "SELECT * FROM tb_product WHERE `category_id` = '17' " ;
                $rs = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($rs)){
                   if($row['id'] == 1){
            ?>
            <div class="grid-item">
                <div class="item">
                    <p><?=$row['description'];?></p>
                </div>
                <div class="item">
                    <img src="../../img/<?=$row['img'] ?>" alt="item-collection">
                </div>
                <div class="item">
                    <img src="../../img/<?=$row['img']; ?>" alt="item-collection">
                </div>
                <div class="item">
                    <p><?=$row['description'];?></p>
                </div>
                <div class="item">
                    <p><?=$row['description'];?></p>
                </div>
                <div class="item">
                    <img src="../../img/<?=$row['img']; ?>" alt="item-collection">
                </div>
                <div class="item">
                    <img src="../../img/<?=$row['img']; ?>" alt="item-collection">
                </div>
                <div class="item">
                    <p><?=$row['description'];?></p>
                </div>
                <div class="item">
                    <p><?=$row['description'];?></p>
                </div>
                <div class="item">
                    <img src="../../img/<?=$row['img']; ?>" alt="item-collection">
                </div>
            </div>
            <?php }else if($row['id'] == 2){ ?>
            <h4>Bộ Sưu Tập Nữ Nổi Bật</h4>
            <div class="grid-item2">
                <div class="item2">
                    <img src="../../img/<?=$row['img'];?>" alt="item-collection">
                </div>
                <div class="item2">
                    <p><?=$row['description'];?></p>
                </div>
                <div class="item2">
                    <p><?=$row['description'];?></p>
                </div>
                <div class="item2">
                    <img src="../../img/<?=$row['img'];?>" alt="item-collection">
                </div>
                <div class="item2">
                    <img src="../../img/<?=$row['img'];?>" alt="item-collection">
                </div>
                <div class="item2">
                    <p><?=$row['description'];?></p>
                </div>
                <div class="item2">
                    <p><?=$row['description'];?></p>
                </div>
                <div class="item2">
                    <img src="../../img/<?=$row['img'];?>" alt="item-collection">
                </div>
                <div class="item2">
                    <img src="../../img/<?=$row['img'];?>" alt="item-collection">
                </div>
                <div class="item2">
                    <p><?=$row['description'];?></p>
                </div>
            </div>
            <?php }} ?>
        </div>       
        <!-- <div class="page-number">
            <div class="number-box">
                <a href="">1</a>
                <a href="">2</a>
                <a href="">3</a>
                <a href="">4</a>
                <a href=""><i class="fas fa-arrow-right"></i></a>
            </div>
        </div> -->
    </div>
        
    <div id="footer">

        <div class="footer-content">
            <div class="logo">
                <img src="../../img/Layer1.png" alt="">
                <p>H Store rất vinh hạnh khi được phục vụ quý khách. Niềm vui của quý khách tạo nên giá trị của chúng tôi, mang đến cơ hội phát triển của chúng tôi. Cám ơn bạn đã ghé thăm xin cảm ơn.</p>
            </div>
    
            <div class="follow">
                <h4>Theo dõi chúng tôi:</h4>
                <div class="content">
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fas fa-blog"></i></a>
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
    
<script src="../../js/showhide.js"></script>
<script src="../../js/slideshow.js"></script>
<script src="../../js/search.js"></script>
</body>

</html>