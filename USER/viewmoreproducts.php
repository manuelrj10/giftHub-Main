<?php
session_start();
include '../CONNECTION/DbConnection.php';
include 'userHeader.php';
$centerid = $_GET['centerid'];
$uid = $_SESSION['uid'];
?>



<!--/Blog-Posts-->
<section class="w3l-blog py-5" id="blog">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="title-content text-left">

            <h3 class="title-w3l">Products</h3>
        </div>
        <div class="row inner-sec-w3ls">
            <!--/services-grids-->
            <?php
            $res = mysqli_query($conn, "SELECT * FROM tb_product WHERE centerid='$centerid'");
            while ($rs = mysqli_fetch_array($res)) {
                $cid = $rs['centerid'];
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
                                <a style="margin-left:70px;" class="btn btn-style btn-primary mt-sm-5 mt-4" href="AddtoCartProcess.php?pid=<?php echo $rs['productcode']?>&cusid=<?php echo $uid?>&centerid=<?php echo $cid?>&item=<?php echo $rs['productname']?>"> Add to cart <span class="fa fa-angle-double-right ml-2" aria-hidden="true"></span></a>
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