<?php
$title = "Best Deals";
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
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">Best deals</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

</section>

<!-- <section class="carouselContainer topspacing">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="heroImage smallHero">
                    <div class="mycard">
                        <div class="card-body herocardInner">
                            <p class="fw-light">Good to the Last Slice</p>
                            <h1 class="brandName">THURSDAY <span class="square">SPECIALS</span></h1>
                            <p>Every Thursday, for the Pizzasquare family</p>
                            <a href="menu.php" class="btn btn-success btn-block customBtn per100">ORDER NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<section class="carouselContainer topspacing">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body bestdeals">
                        <img src="assets/images/brand/BESTDEAL1.jpg" class="img-fluid" alt="bestdeals" />
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body bestdeals">
                        <img src="assets/images/brand/BESTDEAL2.jpg" class="img-fluid" alt="bestdeals" />
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body bestdeals">
                        <img src="assets/images/brand/BESTDEAL3.jpg" class="img-fluid" alt="bestdeals" />
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12"><a href="menu.php" class="btn btn-danger btn-block  per100">ORDER NOW</a></div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>