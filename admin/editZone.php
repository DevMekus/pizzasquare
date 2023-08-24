<?php
$title = "Edit Zone";
include('header.php');
include('navbar.php');
$id = $_GET['id'];
$zone = mysqli_query($cxn, "SELECT * FROM deliveryzone WHERE id='$id'");
if ($row = mysqli_num_rows($zone) > "0") {
    $dt = mysqli_fetch_array($zone);
}
?>

<section class="breacrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="breadcrumbNav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="delivery.php">Zones</a></li>
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">Edit zone</li>
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
                            <h1>EDIT ZONE</h1>
                            <p class="fw-light">Edit existing zones efficiently</p>
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
                        <div class="#">
                            <h5>EDIT ZONE</h5>
                        </div>
                        <div class="mb-3 feedback">
                            <div class="serverFeedback"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="editZone" id="editZone" method="post">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Zone name</label>
                                                <input type="text" class="form-control customBtn" id="zone" name="zone" value="<?php echo $dt['zones']; ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Zone fee</label>
                                                <input type="number" class="form-control customBtn" id="price" name="price" value="<?php echo $dt['amount']; ?>" required>
                                            </div>

                                            <input type="hidden" class="form-control customBtn" id="id" name="id" value="<?php echo $dt['id']; ?>" required>

                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-success customBtn" type="button">
                                                    <span class="spinner"></span>
                                                    EDIT ZONE
                                                </button>
                                            </div>

                                        </form>
                                    </div>
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