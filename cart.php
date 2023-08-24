<?php
$title = "Cart";
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
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">Shopping cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

</section>
<section class="cart_section space_section20">
    <div class="container cartInner">
    </div>

</section>

<?php include('footer.php'); ?>