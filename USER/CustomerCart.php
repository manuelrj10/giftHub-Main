<?php
session_start();
include '../CONNECTION/DbConnection.php';
include 'userHeader.php';
$uid = $_SESSION['uid'];
?>



<!--/Blog-Posts-->
<section class="w3l-blog py-5" id="blog">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="title-content text-left">

            <h3 class="title-w3l">My Cart</h3>
        </div>
        <div class="row inner-sec-w3ls">
            <!--/services-grids-->
            <?php
            $res = mysqli_query($conn, "SELECT * FROM `tb_cart` C , `tb_product` P,`shop` S WHERE C.`cusid`='$uid' AND C.`centerid`=S.`s_id` AND C.`itemid`= P.`productcode` AND C.`status`='incart'");
            while ($rs = mysqli_fetch_array($res)) {

                $centerid = $rs['s_id'];
            ?>

                <div id="mycard" class="col-lg-4 col-md-6 about-in blog-grid-info text-left mt-5">
                    <div class="card img" style="margin:5px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
                        <div class="card-body img">
                            <a href="blog-single.html" class="d-block">
                                <!-- <a href='removeproduct.php?id=<?php echo $rs['productcode'] ?>' style="float:right;">❌</a> -->
                                <img style="width: 400px;" src="../assets/image/<?php echo $rs['image'] ?>" alt="" class="img-fluid radius-image">
                            </a>
                            <div class="blog-des mt-4">
                                <ul class="admin-post mb-2">
                                    <li>
                                        <h5 class="card-title mb-2"><a href="blog-single.html" style="margin-left: 10px;"><?php echo $rs['productname'] ?></a>
                                            <a href="#admin" style="margin-left: 10px;">💲<?php echo $rs['price'] ?></a>
                                            <a href="#admin" style="margin-left: 10px;"> Category :<?php echo $rs['category'] ?></a>
                                    </li>
                                    <li>
                                        <p>
                                    </li>
                                    <li>
                                        <a href="#comments">
                                    </li>
                                </ul>
                                <!-- <p class="card-title mb-2"><?php echo $rs['features'] ?> -->
                                </p>
                                <p class="mb-3" style="margin-left: 10px;"><?php echo $rs['features'] ?></p>
                                <div class="nxt_link" style="margin-left:10px;margin-right:10px;">
                                <a href='../Payment/First.php?carttid=<?php echo $rs['cart_id'] ?>' class=".text-center" style="color:green;font-weight:bold">Pay </a>
                                <a href="RemoveFromCart.php?cartid=<?php echo $rs['cart_id'] ?>" class=".text-center" style="color:red;float:right">Remove </a>
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    </div>
</section>


<?php
include '../COMMON/commonfooter.php';
?>