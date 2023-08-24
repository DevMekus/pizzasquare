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
                        <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">Orders</li>
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
                            <h1>ORDERS</h1>
                            <p class="fw-light">Manage your pending and ready orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="order topspacing">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-body">
                        <div class="flex space_between addProduct">
                            <h5>ORDER LIST</h5>
                        </div>
                        <div class="mb-3 feedback">
                            <div class="serverFeedback"></div>
                        </div>
                        <span class="spinner"></span>
                        <p class="fw-light">You have <?php echo $totalPOrder = getPendingOrders($cxn); ?> PENDING ORDER and <?php echo $totalROrder = getReadyOrders($cxn); ?> READY ORDER on record.</p>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">PENDING ORDERS <span class="badge text-bg-danger"><?php echo $totalPOrder = getPendingOrders($cxn); ?></span></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">READY ORDERS <span class="badge text-bg-danger"><?php echo $totalROrder = getReadyOrders($cxn); ?></span></button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="scrollTable">
                                    <?php
                                    echo $pending = displayPendingOrder($cxn);
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <div class="scrollTable">
                                    <?php
                                    echo $ready = displayReadyOrder($cxn);
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>





            </div>
        </div>
    </div>
</section>



<?php include('footer.php'); ?>