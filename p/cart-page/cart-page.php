<?php 
    session_start();
    include_once "../../php/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng - H Store</title>
    <link rel="shortcut icon" href="../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/primary.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
    <style>
        .bottom button{
            background-color: black !important;
            color: whitesmoke !important;
        }
        .cash button{
            background-color: black !important;
            color: whitesmoke !important;
        }
    </style>
</head>

<body>

    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li title="Bộ Sưu Tập"><a href="../collection/collection.php">Bộ sưu tập</a></li>
                <li title="Sản Phẩm"><a href="../product/product.php">Sản Phẩm</a></li>
                <li title="Trang Chủ"><a class="logo" href="../../index.php"><img src="../../img/Layer1.png" alt=""></a></li>
                <li title="Tin Tức"><a href="../news/news.php">Tin Tức</a></li>
                <li title="Giới Thiệu"><a href="../about/about.php">Giới Thiệu</a></li>
            </div>
        </ul>

    </div>

    <div id="main">
        <div class="main-cart" style="min-height: 300px">
            <h4>Giỏ Hàng Của Bạn</h4>
            <?php if(isset($_SESSION['cart'])){?>
                    <?php foreach($_SESSION['cart'] as $key => $value){ 
            ?>
            <div class="main-detail">
                <div class="detail-left">
                    <img src="../../img/<?=$value['img']?>" alt="cart">
                </div>
                <div class="detail-right">
                    <h5 class="title">
                        <?=$value['name']?>
                    </h5>
                    <div class="bottom">
                        <input type="number" class="price" value="<?=$value['price']?>" style="background: none;font-weight: bolder; border: none; width: 150px; margin: 10px 0" disabled>
                        <div class="multi-bottom">
                            <p>Số Lượng 
                                <input type="number" class="amount" onchange="iTotal()" value="1" min="1" max="10">
                            </p>
                        </div>
                    </div>
                    <input type="hidden" class="itotal" value="">
                    <a href="./remove.php?action=remove&this_id=<?=$value['id']?>">
                        <button>Xóa</button>
                    </a>
                </div>
            </div>
            <?php } ?>
            <div class="cash" >
                Tổng cộng: 
                <h5 id="itotal2" style="background: none;font-weight: bolder; border: none; width: 120px; font-size: 30px" >
                    <?=$total?>
                </h5>
                <button>Thanh Toán</button>
                <a href="./clearall.php?action=clearall">
                    <button>Xóa tất cả</button>
                </a>
            </div>
            <?php }else{ echo "<p style='font-size: 18px'>Trống</p>";} ?>
        </div>
    </div>

    <div id="footer">

        <div class="footer-content">
            <div class="logo">
                <img src="../../img/Layer1.png" alt="">
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

</body>
<script src="../../js/total.js"></script>
</html>