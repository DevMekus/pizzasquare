<?php
$title = "Reset";
include('header.php');
?>

<div class="wrapper">
    <div class="sessionFlex">
        <div class="cont">
            <div class="card">
                <div class="card-body logincard">
                    <div class="logo-login">
                        <a href="../index.php"><img src="../assets/images/brand/logo.png" width="200" /></a>
                        <h5 class="card-title title"> Reset password!</h5>

                    </div>
                    <div class="mb-3">
                        <div class="serverFeedback"></div>
                    </div>
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

                    <div class="sessionSwap">
                        <form action="../Models/authModel.php" METHOD="POST">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" name="forgot_btn" class="btn btn-outline-success customBtn" type="button">
                                    <span class="spinner"></span>
                                    RESET
                                </button>
                            </div>
                        </form>
                        <div class="#">
                            <p class="fw-light text-center">Not a member yet? <a href="signup.php" class="loadSignup">Sign up</a> here</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>