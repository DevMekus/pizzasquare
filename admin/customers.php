<?php
$title = "Customers";
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
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">Customers</li>
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
                        <div class="card-body herocardInner">
                            <h1>CUSTOMERS</h1>
                            <p class="fw-light">Manage your customers efficiently</p>
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
                        <h5>CUSTOMER LIST</h5>
                        <div class="mb-3 feedback">
                            <div class="serverFeedback"></div>
                        </div>
                        <span class="spinner"></span>
                        <p class="fw-light">You have <?php echo $totalProduct = getTotalCustomers($cxn); ?> customer(s) on record.</p>
                        <div class="scrollTable">
                            <?php
                            echo $customer = displayCustomers($cxn);
                            ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



<?php include('footer.php'); ?>