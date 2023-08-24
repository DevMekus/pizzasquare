<?php
$title = "Edit Zone";
include('header.php');
include('navbar.php');
$id = $_GET['id'];
$admin = mysqli_query($cxn, "SELECT * FROM controls WHERE id='$id'");
if ($row = mysqli_num_rows($admin) > "0") {
    $dt = mysqli_fetch_array($admin);
}
?>

<section class="breacrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="breadcrumbNav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="administration.php">Administration</a></li>
                        <li class="breadcrumb-item breadcrumItem active" aria-current="page">Edit Admin</li>
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
                        <div class="card-body">
                            <h1>EDIT ADMINISTRATOR</h1>
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
                            <h5>EDIT ADMINISTRATOR</h5>
                        </div>
                        <div class="mb-3 feedback">
                            <div class="serverFeedback"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="editAdmin" id="editAdmin" method="post">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Admin name</label>
                                                <input type="text" class="form-control customBtn" id="fullname" name="fullname" value="<?php echo $dt['name']; ?>" required>
                                            </div>

                                            <div class=" mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                                <input type="email" class="form-control customBtn" id="email" name="email" value="<?php echo $dt['email']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                                <input type="password" class="form-control customBtn" id="password" name="password" value="<?php echo $dt['password']; ?>" required>
                                            </div>
                                            <input type="hidden" class="form-control customBtn" id="id" name="id" value="<?php echo $dt['id']; ?>" required>

                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-success customBtn" type="button">
                                                    <span class="spinner"></span>
                                                    EDIT ADMIN
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