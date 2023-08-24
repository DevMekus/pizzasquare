<?php
$title = "Track order";
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
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">Track order</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

</section>
<section class="carouselContainer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="heroImage smallHero">
                    <div class="mycard">
                        <div class="card-body herocardInner">
                            <p class="fw-light">Good to the Last Slice</p>
                            <h1 class="brandName">PIZZA <span class="square">SQUARE</span></h1>
                            <P>𝗦𝘂𝗽𝗲𝗿 𝗕𝗲𝗲𝗳,𝗖𝗵𝗶𝗰𝗸𝗲𝗻 𝗫𝘁𝗿𝗮,𝗠𝗲𝗴𝗮 𝗦𝗮𝘂𝘀𝗮𝗴𝗲,Special and 𝗦𝗵𝗮𝘄𝗮𝗿𝗺𝗮 </P>
                            <a href="menu.php" class="btn btn-success btn-block customBtn per100">ORDER NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="trackorder topspacing">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <p class="fw-light">Fast Delivery</p>
                        <h5>WHERE IS MY ORDER , <span class="green">RIGHT NOW?</span></h5>
                        <p class="fw-light">The delivery experts at pizzasquare have specifically engineered pizzasquare's Tracker® to keep you up to date on the status of your order from the moment it's prepared to the second it leaves our store for delivery.</p>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="trackForm">
                                    <form class="track" id="track" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tracking code</label>
                                            <input type="text" class="form-control fw-light customBtn" id="tracking" name="tracking" placeholder="piz-00000" required>
                                        </div>
                                        <button type="submit" class="mybtn btn-black size200  per100">
                                            <span class="spinner"></span>
                                            TRACK ORDER
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="trackResponse w3503">
                                    <div class="serverFeedback"></div>
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