<?php
session_start();
include '../CONNECTION/DbConnection.php';
include 'shopHeader.php';
?>


<!-- contacts-5-grid -->
<div class="w3l-contact-10 py-5" id="contact">
    <div class="form-41-mian py-md-5 py-3">
        <div class="container">
            <div class="heading">
                <h6 class="title-subhny mb-2"></h6>
                <h3 class="title-w3l mb-2">Add Products</h3>
                <p class="mb-5"></p>
            </div>
            <div class="contacts-5-grid-main mb-5">
                <div class="contacts-5-grid mb-lg-5">
                    <div class="map-content-5">
                        <section class="tab-content">
                            <div class="container">
                                <div class="d-grid grid-col-2">
                                    <div class="contact-type">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="form-inner-cont pt-lg-5">
                <form method="post" class="signin-form" enctype="multipart/form-data">
                    <div class="form-grids">
                        <div class="form-input">
                            <input type="text" name="pname" id="w3lName" placeholder="Product name" required="" />
                        </div>
                        <div class="form-input">
                            <input type="number" name="price" id="w3lSubject" placeholder="Price " required />
                        </div>
                        <div class="form-input">
                            <input type="number" maxlength="10" pattern="[0-9]" name="Warranty" id="w3lSubject" placeholder="Warranty " required />
                        </div>
                        <div class="form-input">
                            <input type="file" name="file" id="w3lSubject" placeholder="file" required />
                        </div>
                        <select style="padding: 20px 20px; border:none;outline: none;" class="form-input" name="pcategory">
                            <option>Choose Category</option>
                            <?php
                            $res = mysqli_query($conn, "SELECT * from `category`");
                            while ($rs = mysqli_fetch_array($res)) {
                                echo "<option>" . $rs['1'] . "</option>";
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-input">
                        <textarea name="Features" id="w3lMessage" placeholder="Features" required=""></textarea>
                    </div>
                    <div class="text-center" style="margin-top:40px;">
                        <button type="submit" name="register" class="btn btn-style btn-effect">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- //contacts-5-grid -->
</div>



<?php

$uid = $_SESSION['uid'];
if (isset($_REQUEST['register'])) {

    $pname = $_REQUEST['pname'];
    $Features = $_REQUEST['Features'];
    $price = $_REQUEST['price'];
    $Warranty = $_REQUEST['Warranty'];;
    $pcategory = $_REQUEST['pcategory'];

    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "image/" . $filename;

    if (move_uploaded_file($tempname, '../assets/image/' . $filename)) {
        $qryCheck = "SELECT COUNT(*) AS cnt FROM `tb_product` WHERE `productname` = '$pname' and `price` = '$price' and centerid='$uid'";

        $qryOut = mysqli_query($conn, $qryCheck);

        $fetchData = mysqli_fetch_array($qryOut);

        if ($fetchData['cnt'] > 0) {
            echo "<script>alert('Already exist ');
             window.location = 'addproduct.php';
            </script>";
        } else {

            $qryReg = "INSERT INTO tb_product(`centerid`,`productname`,`category`,`brand`,`price`,`warranty`,`features`,`image`)VALUES('$uid','$pname','$pcategory','0','$price','$Warranty','$Features','$filename')";

            echo $qryReg . "&& ";

            if ($conn->query($qryReg) == TRUE) {
                echo "<script>alert(' Success');window.location = 'addproduct.php';</script>";
            } else {
                echo "<script>alert(' Failed');window.location = 'addproduct.php';</script>";
            }
        }
    }
}
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
            $res = mysqli_query($conn, "SELECT * FROM tb_product WHERE centerid=$uid");
            while ($rs = mysqli_fetch_array($res)) {
            ?>
                <div id="mycard" class="col-lg-4 col-md-6 about-in blog-grid-info text-left mt-5">
                    <div class="card img" style="margin: 0px 10px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
                        <div class="card-body img">
                            <a href="blog-single.html" class="d-block">
                                <a href='removeproduct.php?id=<?php echo $rs['productcode'] ?>' style="float:right;">❌</a>
                                <img style="width: 400px;" src="../assets/image/<?php echo $rs['image'] ?>" alt="" class="img-fluid radius-image">
                            </a>
                            <div class="blog-des mt-4">
                                <ul class="admin-post mb-2">
                                    <li>
                                        <!-- <span class="fa fa-user-o"></span> -->
                                        <h5 class="card-title mb-2"><a href="blog-single.html"><?php echo $rs['productname'] ?></a>
                                            <!-- <a href="#admin"> <?php echo $rs['productname'] ?></a> -->
                                            💲<?php echo $rs['price'] ?>/- <p style="float: right;font-size: large;color:black;"> Warranty <?php echo $rs['warranty'] ?> Year</p>  
                                            <!-- 📞<a href="#admin"> <?php echo $rs['sphone'] ?></a> -->
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
                                <p class="card-title mb-2"><?php echo $rs['features'] ?>
                                </p>
                                <!-- <p class="mb-3"><?php echo $rs['saddress'] ?></p> -->

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