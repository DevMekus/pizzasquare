<?php
$title = "Delicious";
include('config/connection.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title><?php echo $site_name;  ?> - <?php echo $title;  ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="theme-color" content="rgb(213,29,40)" />
    <meta name="msapplication-navbutton-color" content="rgb(213,29,40)">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Latest compiled and minified CSS -->
    <link rel="shortcut icon" href="assets/images/brand/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/brand/logos/logo_only.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Lato:wght@100;300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/rikmms/progress-bar-4-axios/0a3acf92/dist/nprogress.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://use.fontawesome.com/4138dd15b3.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/style.css' />
    <style>
        .page-centered {
            width: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        img {
            width: 500px;
        }

        .page-centered h1 {
            font-size: 80px;
        }

        p {
            font-size: 30px;
        }
    </style>

</head>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-centered">
                    <img src="assets/images/brand/logo.png" />
                    <h1>Congratulations!</h1>
                    <p>We are moving to New Haven</p>
                    <p>Transaction will commence shortly.</p>
                </div>
            </div>
        </div>
    </div>

</main>
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