<?php
$title = "Menu";
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
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">Menu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

</section>
<section class="carouselContainer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="carouselCenter">
                    <div class="carouselCenterInner">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/images/brand/slider/1.jpg" class="d-block w-100 img-fluid" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/brand/slider/2.jpg" class="d-block w-100 img-fluid" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/brand/slider/3.jpg" class="d-block w-100 img-fluid" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/brand/slider/4.jpg" class="d-block w-100 img-fluid" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/brand/slider/5.jpg" class="d-block w-100 img-fluid" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="trackorder topspacing">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <p class="">Good to the Last Slice</p>
                        <h4>PIZZA SQUARE , <span class="green">MENU </span></h4>
                        <p class="">This is the pizzasquare's menu. To see prices, coupons and exactly what items are available to you, visit your local store.</p>
                        <div class="mb-3">
                            <div class="serverFeedback"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
<section class="pizza topspacing">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="productFlex">
                            <div class="imagePreview">
                                <img src="assets/images/brand/piz1.jpg" class="img-fluid" alt="...">
                            </div>
                            <div class="itemDescription">
                                <p class="">Good to the Last Slice</p>
                                <h4>PIZZA</h4>
                                <p class="">Order our Italian Pizza Cuisine. A cheesy bite of goodness awaits you.</p>
                                <button class="btn btn-danger orderBtn" id="PIZZA">ORDER NOW <span class="spinner"></span></button>
                                <div class="displayPizza dropDownProduct"></div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
<section class="pizza topspacing">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="productFlex">
                            <div class="imagePreview">
                                <img src="assets/images/brand/sharwa1.jpg" class="img-fluid" alt="...">
                            </div>
                            <div class="itemDescription">
                                <p class="">Good to the Last Slice</p>
                                <h4>SHARWAMA</h4>
                                <p class="">Pizza Square Shawarma is the magic that every life needs. Tastes as great as it looks..</p>
                                <button class="btn btn-danger orderBtn" id="SHARWAMA">ORDER NOW <span class="spinner" id="SHARWAMA"></span></button>
                                <div class="displayShawarma dropDownProduct"></div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
<section class="pizza topspacing">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="productFlex">
                            <div class="imagePreview">
                                <img src="assets/images/brand/drinks1.jpg" class="img-fluid" alt="...">
                            </div>
                            <div class="itemDescription">
                                <p class="">Refreshing and cool</p>
                                <h4>DRINKS</h4>
                                <p class="">Pizza or Shawarma is best Enjoyed with a bottle of chilled beverage or water.</p>
                                <button class="btn btn-danger orderBtn" id="DRINKS">ORDER NOW <span class="spinner"></span></button>
                                <div class="displayDrinks dropDownProduct"></div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>




<?php include('footer.php'); ?>