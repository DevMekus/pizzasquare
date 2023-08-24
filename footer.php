<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 footer-logo"><img src="assets/images/brand/logo.png" alt="logo" /></div>
            <div class="col-sm-4">
                <div>
                    <h5 class="">Address</h5>
                    <p class="">Suite 14, Jennifer Plaza,Onyuike Street, Thinkers Corner, Enugu.</p>
                </div>
                <div>
                    <h5 class="">Phone:</h5>
                    <p class="">0805 5544 014</p>
                </div>
                <div>
                    <h5 class="">Email:</h5>
                    <p class="">info@pizzasquare.ng</p>
                </div>
            </div>
            <div class="col-sm-5">
                <h5 class="">Subscribe with us</h5>
                <div class="formBtn">
                    <form>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control " id="email" name="email" placeholder="You@email.com">
                            </div>
                        </div>
                        <button class="btn btn-success">Subscribe</button>
                    </form>
                </div>
                <br>
                <div class="socialMedia">
                    <h5 class="">Social Media</h5>
                    <div class="mediaIcons">
                        <a href="https://web.facebook.com/pizzasquare.ng/"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.twitter.com/pizzasquareng"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/pizzasquareng"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="whatsapp-code">
        <?php include('whatsapp.php'); ?>
    </div>
</footer>
<!--Cart start-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Shopping Cart</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="displayCart">
        </div>
        <div class="cart_footer">
            <div class="cart_summary">
                <p class="sub_header ">Subtotal : <span class="subtotal_amount"></span></p>
            </div>
            <div class="clearCartMsg"></div>
            <div class="cart_actions">
                <a href="cart.php" class="btn btn-success view_cart size200 customBtn">
                    View cart
                </a>
                <button class="btn btn-danger size200 customBtn resetCart">Reset cart</button>
            </div>
        </div>
    </div>
</div>

<!--Cart End-->

<div id="overlay" class="sessionOverlay">
    <div class="close_overlay"><span class="material-symbols-outlined">close</span></div>
    <div class="overlay_inner">
    </div>
</div>

<!-- Modal change of address -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="Models/authModel.php" METHOD="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">New address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="changeAddress" class="btn btn-success btn-sm">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.rawgit.com/rikmms/progress-bar-4-axios/0a3acf92/dist/index.js"></script>

<script src='server/server.js'></script>
<script src='server/product.js'></script>
<script src='Views/appView.js'></script>
<script type="module" src='Controllers/appCtrl.js'></script>
<script src='server/paystack.js'></script>

</body>

</html>