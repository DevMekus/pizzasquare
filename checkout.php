<?php
session_start();
$title = "Checkout";
include('header.php');
include('navbar.php');
$_SESSION['cart'] = 'y';

$feedback = "Log in to continue";
if (!(isset($_SESSION['customer']))) : header("Location: auth/login.php?feedback = " . $feedback . "&alert=d");
endif;

$invoiceID = 'piz-' . substr(str_shuffle(MD5(microtime())), 0, 5);
$mydate = getdate(date("U"));
$invoiceDate = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

if (isset($_SESSION['customer'])) {
    $customer = $_SESSION['customer'];
    $getCustomer = mysqli_query($cxn, "SELECT * FROM customers WHERE id = '$customer'");
    if ($row = mysqli_num_rows($getCustomer) > '0') {
        $dt = mysqli_fetch_array($getCustomer);
    }
} else {
    $feedback = "Log in to continue";
    header("Location: auth/login.php?feedback = " . $feedback . "&alert=d");
}

?>
<section class="breacrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="breadcrumbNav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

</section>
<div class="feedBackCheckout">
    <div class="feedBack"><!-- Feedback-->
        <?php
        if (isset($_GET['feedback']) && $_GET['alert'] == "d") {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p class="fw-light"><?php echo $_GET['feedback']; ?>.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php } else if (isset($_GET['feedback']) && $_GET['alert'] == "s") {

        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="fw-light"><?php echo $_GET['feedback']; ?>.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php  } ?>
    </div><!-- Feedback ends-->
</div>

<section class="invoice space_section20">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="flex-container">
                    <div class="left-flex flexitem">
                        <p class="fw-light">INVOICE TO</p>
                        <h5 class="fw-bold"> <?php echo  $dt['fullname']; ?></h5>
                        <div class="flex invoiceFlex">
                            <!-- <span class="fa fa-bus"></span> -->
                            <p class="fw-light"><?php echo  $dt['caddress']; ?> <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="fw-light">Change address</a></p>
                        </div>
                        <div class="flex invoiceFlex">
                            <!-- <span class="fa fa-phone"></span> -->
                            <p class="fw-light"><?php echo  $dt['phone']; ?></p>
                        </div>
                        <div class="flex invoiceFlex">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label fw-light price">SELECT DELIVERY</label>
                                <select class="form-select fw-light customBtn" id="delivery" name="delivery" aria-label="Default select example">
                                    <option value="pickup" selected class="fw-light">I will Pickup</option>
                                    <?php
                                    $getArea = mysqli_query($cxn, "SELECT * FROM deliveryzone");
                                    if ($result = mysqli_num_rows($getArea) > 0) {
                                        while ($zone = mysqli_fetch_array($getArea)) { ?>
                                            <option class="fw-light" value=" <?php echo $zone['amount'] ?>"><?php echo $zone['zones'] ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="right-flex flexitem">
                        <h5 class="fw-bold invTitle">INVOICE</h5>
                        <div class="flex invoiceDateID">
                            <p class="fw-light">INVOICE ID:</p>
                            <p class="fw-light"><?php echo $invoiceID; ?></p>
                        </div>
                        <div class="flex invoiceDateID">
                            <p class="fw-light">INVOICE DATE:</p>
                            <p class="fw-light"><?php echo $invoiceDate; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form id="paymentForm" class="payForm">
            <input type="hidden" name="invoiceID" id="invoiceID" value="<?php echo $invoiceID; ?>" />
            <input type="hidden" name="invoiceDate" id="invoiceDate" value="<?php echo $invoiceDate; ?>" />
            <input type="hidden" name="fullname" id="fullname" value="<?php echo $dt['fullname']; ?>" />
            <input type="hidden" name="address" id="address" value="<?php echo $dt['caddress']; ?>" />
            <input type="hidden" name="email" id="email" value="<?php echo $dt['email']; ?>" />
            <input type="hidden" name="phone" id="phone" value="<?php echo $dt['phone']; ?>" />
            <div class="InvoiceItems"></div>

        </form>
        <script src="https://js.paystack.co/v1/inline.js"></script>
    </div>

</section>

<?php include('footer.php'); ?>