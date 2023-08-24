<footer>
    <p class="text-center fw-light"><?php echo $site_name; ?>, <?php echo date("Y", time()); ?></p>
</footer>
<!--Notification start-->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <!-- <h4 class="offcanvas-title" id="offcanvasExampleLabel" style="color:#00A859">PIZZA<span style="color:#D51D28">SQUARE</span></h4> -->
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="navLinkCont">
            <div class="brandLogo">
                <a href="index.php" class="logo">
                    <span>
                        <img src="../assets/images/brand/logo.png" height="70" alt="logo" class="auth-logo">
                    </span>
                </a>
            </div>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class="viconLink">
                    <span class="material-symbols-outlined">dashboard</span></p>
                    <a href="index.php">OVERVIEW</a>
                </div>
                <div class="viconLink">
                    <span class="material-symbols-outlined">group</span></p>
                    <a href="customers.php">Customers</a>
                </div>
                <div class="viconLink">
                    <span class="material-symbols-outlined">inventory</span></p>
                    <a href="products.php">Products</a>
                </div>
                <div class="viconLink">
                    <span class="material-symbols-outlined">list_alt</span></p>
                    <a href="orders.php">Orders</a>
                </div>
                <div class="viconLink">
                    <span class="material-symbols-outlined">local_shipping</span></p>
                    <a href="delivery.php">Delivery Fees</a>
                </div>
                <div class="viconLink">
                    <span class="material-symbols-outlined">
                        admin_panel_settings
                    </span>
                    <a href="administration.php">Administrator</a>
                </div>
                <div class="viconLink">
                    <span class="material-symbols-outlined">
                        power_settings_new
                    </span>
                    <a href="../Models/adminModel.php?logout">Logout</a>
                </div>
            </ul>

        </div>

    </div>
</div>

<!--Notification Ends-->

<div id="overlay" class="sessionOverlay">
    <div class="close_overlay"><span class="material-symbols-outlined">close</span></div>
    <div class="overlay_inner">
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.rawgit.com/rikmms/progress-bar-4-axios/0a3acf92/dist/index.js"></script>



<script src='../server/server.js'></script>
<script src='../Views/adminView.js'></script>
<script src='../Controllers/adminCtrl.js'></script>


</body>

</html>