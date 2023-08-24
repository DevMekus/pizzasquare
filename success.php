<?php
$title = "Order Successful";
include('header.php');
include('navbar.php');
?>
<section class="breacrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="breadcrumbNav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">Success</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

</section>

<section class="breacrumb topspacing">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card successCard">
                    <div class="card-body">
                        <div class="spinner"></div>
                        <div class="serverFeedback"></div>
                        <br>
                        <div class="success_image_container">
                            <img src="assets/images/brand/success.jpeg" alt="logo" width="300px" alt="pizzasquare_logo" class="image-fluid" />
                        </div>
                        <br>
                        <br>

                        <h4 class="fw-light">ORDER <span class="green">SUCCESSFUL </span></h4>
                        <p class="fw-light">Congratulations! Your order has been received and your payment will be processed soon. </p>
                        <p class="fw-light">Our office will contact you soon. <br> Or kindly <a href="Tel:08055544014">call</a> us or send a <a href="https://wa.me/message/SSNSNBBECRONE1">whatsapp message</a> to confirm your order fast.</p>
                        <p class="fw-light">Do have a wonderful Pizza Day!!</p>
                        <br>
                        <div class="order-details">
                            <h5 class="card-title fw-light">ORDER DETAILS</h5>
                            <div class="displayOrderDetail"></div>
                        </div>
                        <p class="fw-light">You can also verify the status of this order by using our <a href="track.php">Order Tracking</a> Form.</p>
                        <a href="menu.php" class="btn btn-success view_cart size200 customBtn clearCartS">
                            Continue shopping
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

<?php include('footer.php'); ?>