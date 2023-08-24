<?php
$title = "Orders";
include('header.php');
include('navbar.php');
?>

<section class="breacrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="breadcrumbNav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="orders.php">Orders</a></li>
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">View orders</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

</section>

<section class="carouselContainer topspacing">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="heroImage adminHero">
                    <div class="mycard">
                        <div class="card-body">
                            <h1>ORDERS</h1>
                            <p class="fw-light">Manage your pending and ready orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="carouselContainer topspacing">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">VIEW ORDERS</h5>
                        <?php
                        $id = $_GET['id'];
                        echo $getOrder = displayOrderDetails($cxn, $id);
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include('footer.php'); ?>