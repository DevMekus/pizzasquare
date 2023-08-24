<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-lights navbarBg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><span><?php echo $site_name; ?></span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item navitem">
                                <a class="nav-link" aria-current="page" href="#">Best deals</a>
                            </li>
                            <li class="nav-item navitem">
                                <a class="nav-link" aria-current="page" href="track.php">Track order</a>
                            </li>
                            <li class="nav-item navitem">
                                <a class="nav-link" aria-current="page" href="menu.php">Menu</a>
                            </li>
                        </ul>
                    </div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 pullright">
                        <li class="nav-item">
                            <a href="auth/login.php" class="btn btn-outline-light btn-sm customBtn" title="Log into account">
                                <span style="color:black" class="material-symbols-outlined">account_circle</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"></a>
                        </li>

                        <li class="nav-item notification">
                            <button type="button" class="btn btn-outline-light btn-sm customBtn" title="Read notifications" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="color:black">
                                <span class="material-symbols-outlined">notifications_active</span> <span class="badge bg-light" style="color:black">0</span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-success btn-sm customBtn" title="Shopping cart" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <span class="material-symbols-outlined">shopping_cart</span> <span class="badge bg-light cartCount" style="color:black"></span> <span class="billAmount"></span>
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>