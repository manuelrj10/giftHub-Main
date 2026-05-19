<?php

session_start();
include '../CONNECTION/DbConnection.php';
include 'userHeader.php';
$uid = $_SESSION['uid'];

?>


<!-- contacts-5-grid -->
<div class="w3l-contact-10 py-5" id="contact">
    <div class="form-41-mian py-md-5 py-3">
        <div class="container">
            <div class="heading">
                <h6 class="title-subhny mb-2"></h6>
                <h3 class="title-w3l mb-2">Send Your Feedback</h3>
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

                    <div class="form-input">
                        <textarea name="address" id="w3lMessage" placeholder="Feedback" required=""></textarea>
                    </div>
                    <div class="text-center" style="margin-top:40px;">
                        <button type="submit" name="register" class="btn btn-style btn-effect">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- //contacts-5-grid -->
</div>


<?php
if (isset($_REQUEST['register'])) {


    $Chat = $_REQUEST['address'];
    $date = date("Y-m-d");

    $qryCheck = "SELECT COUNT(*) AS cnt FROM `feedback` WHERE `chat` = '$Chat' and `date` = '$date'";

    $qryOut = mysqli_query($conn, $qryCheck);

    $fetchData = mysqli_fetch_array($qryOut);

    if ($fetchData['cnt'] > 0) {
        echo "<script>alert('Already exist ');window.location = 'chat.php';</script>";
    } else {

        $qryReg = "INSERT INTO`feedback`(`user_id`,`chat`,`date`)VALUES('$uid','$Chat','$date')";


        echo $qryReg;

        if ($conn->query($qryReg) == TRUE) {
            echo "<script>alert(' Success');window.location = 'chat.php';</script>";
        } else {
            echo "<script>alert(' Failed');window.location = 'chat.php';</script>";
        }
    }
}

?>


<div class="contacts-5-grid-main mb-5">
    <div class="contacts-5-grid mb-lg-5">
        <div class="map-content-5">
            <section class="tab-content">
                <div class="container">
                    <div class="d-grid grid-col-2">
                        <div class="contact-type">


                            <?php
                            $res = mysqli_query($conn, "SELECT * FROM feedback WHERE user_id='$uid'");
                            while ($rs = mysqli_fetch_array($res)) {

                            ?>

                                <div class="address-grid">
                                    <h6>Feedback</h6>
                                    <p><?Php echo $rs['chat']; ?></p>
                                    <h6>Reply</h6>

                                    <p><?Php echo $rs['reply']; ?></p><span class="pos-icon">
                                        <span class="fa fa-map"></span>
                                    </span>
                                </div>


                            <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>