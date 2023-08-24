<?php
$title = "Sign up";
include('header.php');
?>

<div class="wrapper">
    <div class="sessionFlex">
        <div class="cont image_content_signup quoteArea">
            <div class="quoteArea">
                <p class="text-center fw-light">“My love is pizza shaped. <br>Won’t you have a slice? It’s circular, so there’s enough to go around.” – Dora J. Arod</p>
            </div>
        </div>
        <div class="cont">
            <div class="card">
                <div class="card-body logincard">
                    <div class="logo-login">
                        <a href="../index.php"><img src="../assets/images/brand/logo.png" width="200" /></a>
                        <h5 class="card-title title"> Sign up!</h5>
                        <p class="fw-light">Join the Pizza Family!</p>

                    </div>
                    <div class="mb-3">
                        <div class="serverFeedback"></div>
                    </div>

                    <div class="sessionSwap">
                        <form class="registerForm" id="registerForm" method="post">
                            <div class="mb-3">
                                <label>Fullname</label>
                                <input type="text" class="form-control customBtn" id="fullname" name="fullname" placeholder="" required>
                            </div>
                            <div class="mb-3">
                                <label>Home address</label>
                                <input type="text" class="form-control customBtn" id="address" name="address" placeholder="" required>
                            </div>
                            <div class="mb-3">
                                <label>Phone number</label>
                                <input type="tel" class="form-control customBtn" id="phone" name="phone" placeholder="" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control customBtn" id="email" name="email" placeholder="" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success customBtn" type="button">
                                    <span class="spinner"></span>
                                    SIGN UP
                                </button>
                            </div>
                        </form>
                        <div class="#">
                            <p class="fw-light text-center">Already a member <a href="login.php" class="loadSignup">Sign in</a> here</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>