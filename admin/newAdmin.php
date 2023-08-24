<?php
$title = "New admin";
include('header.php');
include('navbar.php');

?>

<section class="breacrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="breadcrumbNav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="administration.php">Administration</a></li>
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">New Admin</li>
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
                            <h1>NEW ADMIN</h1>
                            <p class="fw-light">Create a new efficiently</p>
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
                            <h5>NEW ADMINISTRATOR</h5>
                        </div>
                        <div class="mb-3 feedback">
                            <div class="serverFeedback"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="saveAdmin" id="saveAdmin" method="post">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Admin name</label>
                                                <input type="text" class="form-control customBtn" id="fullname" name="fullname" value="" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                                <input type="email" class="form-control customBtn" id="email" name="email" value="" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                                <input type="password" class="form-control customBtn" id="password" name="password" value="" required>
                                            </div>

                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-success customBtn" type="button">
                                                    <span class="spinner"></span>
                                                    SAVE ADMIN
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