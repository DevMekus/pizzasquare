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
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">Admin</li>
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
                            <h1>ADMIN</h1>
                            <p class="fw-light">Manage your admins efficiently</p>
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
                            <h5>ADMIN LIST</h5>
                            <a href="newAdmin.php" class="btn btn-default btn-success customBtn"><i class="fa fa-plus"></i> New admin</a>
                        </div>
                        <div class="mb-3 feedback">
                            <div class="serverFeedback"></div>
                        </div>
                        <span class="spinner"></span>
                        <p class="fw-light">You have <?php echo $admin = getTotatAdmin($cxn); ?> products(s) on record.</p>
                        <div class="scrollTable">
                            <?php
                            echo $admini = administrators($cxn);
                            ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



<?php include('footer.php'); ?>