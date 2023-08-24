<?php
$title = "Products";
include('header.php');
include('navbar.php');
$id = $_GET['id'];
$product = mysqli_query($cxn, "SELECT * FROM products WHERE id='$id'");
if ($row = mysqli_num_rows($product) > "0") {
    $dt = mysqli_fetch_array($product);
}
?>

<section class="breacrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="breadcrumbNav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="products.php">Products</a></li>
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">Edit Product</li>
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
                            <h1>EDIT PRODUCTS</h1>
                            <p class="fw-light">Edit existing products efficiently</p>
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
                            <h5>EDIT PRODUCTS</h5>
                        </div>
                        <div class="mb-3 feedback">
                            <div class="serverFeedback"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="editProduct" id="editProduct" method="post">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Product name</label>
                                                <input type="text" class="form-control customBtn" id="productName" name="productName" value="<?php echo $dt['productName']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Product category</label>
                                                <select class="form-select fw-light customBtn" id="category" name="category" aria-label="Default select example">
                                                    <?php
                                                    $getCategory = mysqli_query($cxn, "SELECT * FROM category");
                                                    if ($result = mysqli_num_rows($getCategory) > 0) {
                                                        while ($category = mysqli_fetch_array($getCategory)) { ?>
                                                            <option class="fw-light" value=" <?php echo $category['category'] ?>"><?php echo $category['category'] ?></option>
                                                    <?php }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Product size</label>
                                                <select class="form-select fw-light customBtn" id="size" name="size" aria-label="Default select example">
                                                    <option value="small" class="fw-light">SMALL</option>
                                                    <option value="large" class="fw-light">LARGE</option>
                                                    <option value="xl" class="fw-light">XL</option>
                                                    <option value="" selected class="fw-light">NONE</option>

                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Product price</label>
                                                <input type="number" class="form-control customBtn" id="price" name="price" value="<?php echo $dt['price']; ?>" required>
                                            </div>

                                            <input type="hidden" class="form-control customBtn" id="code" name="code" value="<?php echo $dt['code']; ?>" required>

                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-success customBtn" type="button">
                                                    <span class="spinner"></span>
                                                    EDIT PRODUCT
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