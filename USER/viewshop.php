<?php
session_start();
$uid = $_SESSION['uid'];
include '../CONNECTION/DbConnection.php';
include 'userHeader.php';
?>



<!--/Blog-Posts-->
<section class="w3l-blog py-5" id="blog">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="title-content text-left">

            <h3 class="title-w3l">Shops</h3>
        </div>
        <div class="row inner-sec-w3ls">
            <!--/services-grids-->
            <?php
            $res = mysqli_query($conn, "SELECT * from `shop`");
            while ($rs = mysqli_fetch_array($res)) {
                $centerid = $rs['s_id'];
            ?>
                <div id="mycard" class="col-lg-4 col-md-6 about-in blog-grid-info text-left mt-5">
                    <div class="card img" style="margin:5px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
                        <div class="card-body img">
                            <a href="blog-single.html" class="d-block">
                                <!-- <a href='removeproduct.php?id=<?php echo $rs['productcode'] ?>' style="float:right;">❌</a> -->
                                <img style="width: 400px;" src="../assets/image/<?php echo $rs['photo'] ?>" alt="" class="img-fluid radius-image">
                            </a>
                            <div class="blog-des mt-4">
                                <ul class="admin-post mb-2">
                                    <li>
                                        <!-- <span class="fa fa-user-o"></span> -->
                                        <h5 class="card-title mb-2"><a href="blog-single.html"><?php echo $rs['sname'] ?> </a>
                                            <!-- <a href="#admin"> <?php echo $rs['productname'] ?></a> -->
                                            <a href="#admin">📞 <?php echo $rs['sphone'] ?></a>
                                            <a href="#admin">✉️ <?php echo $rs['semail'] ?></a>
                                    </li>
                                    <li>
                                        <p>
                                            <!-- <span class="fa fa-clock-o"></span> Jan 28,2021</p> -->
                                    </li>
                                    <li>
                                        <a href="#comments">
                                            <!-- <span class="fa fa-comments-o"></span> 3</a> -->
                                    </li>
                                </ul>
                                <!-- <p class="card-title mb-2"><?php echo $rs['features'] ?> -->
                                </p>
                                <p class="mb-3"><?php echo $rs['saddress'] ?></p>
                                <h5 style="margin: 2px auto;text-align: center;"><a href="viewmoreproducts.php?centerid=<?php echo $centerid;?>">View </a></h5>
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