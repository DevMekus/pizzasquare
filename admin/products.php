<?php
$title = "Products";
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
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">Products</li>
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
                            <h1>PRODUCTS</h1>
                            <p class="fw-light">Manage your products efficiently</p>
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
                        <div class="flex space_between addProduct">
                            <h5>PRODUCTS LIST</h5>
                            <a href="newProduct.php" class="btn btn-default btn-success customBtn"><i class="fa fa-plus"></i> New product</a>
                        </div>
                        <div class="mb-3 feedback">
                            <div class="serverFeedback"></div>
                        </div>
                        <span class="spinner"></span>
                        <p class="fw-light">You have <?php echo $totalProduct = getTotalProduct($cxn); ?> products(s) on record.</p>
                        <div class="scrollTable">
                            <?php
                            echo $products = displayProducts($cxn);
                            ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



<?php include('footer.php'); ?>