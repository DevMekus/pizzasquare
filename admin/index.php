<?php
$title = "Welcome to pizzasquare";
include('header.php');
include('navbar.php');
?>
<section class="carouselContainer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="heroImage adminHero">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="summary space_section20">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="card-title headingtitle">SUMMARY</h3>
                <p class="fw-light hint">Find out how your business is fairing by examining the summary data.
                </p>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body primaryBg activeBg">
                                <div class="flex space_between">
                                    <h4 class="card-title">Customers</h4>
                                    <h4 class="card-title"><?php echo $totalProduct = getTotalCustomers($cxn); ?></h4>
                                </div>
                                <p class="fw-light hint">Customers registered to the pizza family</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body primaryBg attension">
                                <div class="flex space_between">
                                    <h4 class="card-title">Pending orders</h4>
                                    <h4 class="card-title"><?php echo $totalPOrder = getPendingOrders($cxn); ?></h4>
                                </div>
                                <p class="fw-light hint">New orders waiting to serve customers</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body primaryBg">
                                <div class="flex space_between">
                                    <h4 class="card-title">Ready Orders</h4>
                                    <h4 class="card-title"><?php echo $totalROrder = getReadyOrders($cxn); ?></h4>
                                </div>
                                <p class="fw-light hint">Orders we have already served our customers</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body primaryBg">
                                <div class="flex space_between">
                                    <h4 class="card-title">Products</h4>
                                    <h4 class="card-title"><?php echo $totalProduct = getTotalProduct($cxn); ?></h4>
                                </div>
                                <p class="fw-light hint">Number of products offered in pizzasquare</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php include('footer.php'); ?>