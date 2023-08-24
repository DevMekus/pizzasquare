<?php
include('../config/functions.php');

//Delete Customer
if (isset($_GET['deleteCustomer'])) {
    $id = $_GET['deleteCustomer'];
    $delete = mysqli_query($cxn, "DELETE FROM customers WHERE id='$id'");
    if ($delete) {
        echo '1';
    } else {
        echo '2';
    }
}

//Delete Product
if (isset($_GET['deleteProduct'])) {
    $id = $_GET['deleteProduct'];
    $delete = mysqli_query($cxn, "DELETE FROM products WHERE id ='$id'");
    if ($delete) {
        echo '1';
    } else {
        echo '2';
    }
}

//New Product
if (isset($_GET['newProduct'])) {
    $productName = mysqli_real_escape_string($cxn, $_POST['productName']);
    $category = trim(mysqli_real_escape_string($cxn, $_POST['category']));
    $size = mysqli_real_escape_string($cxn, $_POST['size']);
    $price = mysqli_real_escape_string($cxn, $_POST['price']);
    $code = substr(str_shuffle(MD5(microtime())), 0, 5);
    $rank = '';
    if ($size == 'small') {
        $rank = '1';
    } else if ($size == 'small') {
        $rank = '2';
    } else {
        $rank = '3';
    }

    //Check if User has registered before
    $result = mysqli_query($cxn, "SELECT * FROM products WHERE code = '{$code}'");
    if ($row = mysqli_num_rows($result) == '0') {
        $saveProduct = mysqli_query($cxn, "INSERT INTO products(productName,size,category,code,price,rank)VALUE('{$productName}','{$size}','{$category}','{$code}','{$price}','$rank')");
        if ($saveProduct) {
            echo '1';
        } else {
            echo '2';
        }
    } else {
        echo '3';
    }
}


//Edit Product
if (isset($_GET['editProduct'])) {
    $productName = mysqli_real_escape_string($cxn, $_POST['productName']);
    $category = trim(mysqli_real_escape_string($cxn, $_POST['category']));
    $size = mysqli_real_escape_string($cxn, $_POST['size']);
    $price = mysqli_real_escape_string($cxn, $_POST['price']);
    $ingredients = mysqli_real_escape_string($cxn, $_POST['ingredients']);
    $code = mysqli_real_escape_string($cxn, $_POST['code']);

    $rank = '';
    if ($size == 'small') {
        $rank = '1';
    } else if ($size == 'small') {
        $rank = '2';
    } else {
        $rank = '3';
    }
    //Update
    $update =  mysqli_query($cxn, "UPDATE products SET productName='$productName',size='$size', category='$category'
    ,price='$price', rank='$rank' WHERE code='$code'");
    if ($update) {
        echo '1';
    } else {
        echo '2';
    }
}


//Edit order
if (isset($_GET['readyOrder'])) {
    $id = $_GET['readyOrder'];
    $update = mysqli_query($cxn, "UPDATE orders SET ready = 'yes' WHERE id = '$id'");
    if ($update) {
        //YOu can send a message to client here
        echo '1';
    } else {
        echo '2';
    }
}

//Pend order
if (isset($_GET['pendOrder'])) {
    $id = $_GET['pendOrder'];
    $update = mysqli_query($cxn, "UPDATE orders SET ready = 'no' WHERE id = '$id'");
    if ($update) {
        echo '1';
    } else {
        echo '2';
    }
}

//Edit Product
if (isset($_GET['deleteOrder'])) {
    $id = $_GET['deleteOrder'];
    $delete = mysqli_query($cxn, "DELETE FROM orders WHERE id = '$id'");
    if ($delete) {
        echo '1';
    } else {
        echo '2';
    }
}


//New Product
if (isset($_GET['saveZone'])) {
    $zone = mysqli_real_escape_string($cxn, $_POST['zone']);
    $price = mysqli_real_escape_string($cxn, $_POST['price']);

    //Check if User has registered before
    $result = mysqli_query($cxn, "SELECT * FROM deliveryzone WHERE zones = '{$zone}'");
    if ($row = mysqli_num_rows($result) == '0') {
        $saveZone = mysqli_query($cxn, "INSERT INTO deliveryzone(zones,amount)VALUE('{$zone}','{$price}')");
        if ($saveZone) {
            echo '1';
        } else {
            echo '2';
        }
    } else {
        echo '3';
    }
}

//Edit Zone
if (isset($_GET['editZone'])) {
    $id = mysqli_real_escape_string($cxn, $_POST['id']);
    $zone = mysqli_real_escape_string($cxn, $_POST['zone']);
    $price = mysqli_real_escape_string($cxn, $_POST['price']);

    $update = mysqli_query($cxn, "UPDATE deliveryzone SET zones = '$zone', amount ='$price' WHERE id = '$id'");
    if ($update) {
        echo '1';
    } else {
        echo '2';
    }
}

//Delete zone
if (isset($_GET['deleteZone'])) {
    $id = $_GET['deleteZone'];
    $delete = mysqli_query($cxn, "DELETE FROM deliveryzone WHERE id = '$id'");
    if ($delete) {
        echo '1';
    } else {
        echo '2';
    }
}

//New Product
if (isset($_GET['saveAdmin'])) {
    $name = mysqli_real_escape_string($cxn, $_POST['fullname']);
    $email = mysqli_real_escape_string($cxn, $_POST['email']);
    $password = mysqli_real_escape_string($cxn, $_POST['password']);

    //Check if User has registered before
    $result = mysqli_query($cxn, "SELECT * FROM controls WHERE email = '{$email}'");
    if ($row = mysqli_num_rows($result) == '0') {
        $saveAdmin = mysqli_query($cxn, "INSERT INTO controls(name,email,pass)VALUE('{$name}','{$email}','{$password}')");
        if ($saveAdmin) {
            echo '1';
        } else {
            echo '2';
        }
    } else {
        echo '3';
    }
}

//Edit Zone
if (isset($_GET['editAdmin'])) {
    $fullname = mysqli_real_escape_string($cxn, $_POST['fullname']);
    $email = mysqli_real_escape_string($cxn, $_POST['email']);
    $password = mysqli_real_escape_string($cxn, $_POST['password']);
    $id = mysqli_real_escape_string($cxn, $_POST['id']);
    $result = mysqli_query($cxn, "SELECT * FROM controls WHERE email = '{$email}'");
    if ($row = mysqli_num_rows($result) == '0') {
        $update = mysqli_query($cxn, "UPDATE controls SET name = '$fullname', email ='$email', pass='$password' WHERE id = '$id'");
        if ($update) {
            echo '1';
        } else {
            echo '2';
        }
    } else {
        echo '3';
    }
}

//Delete admin
if (isset($_GET['deleteAdmin'])) {
    $id = $_GET['deleteAdmin'];
    $delete = mysqli_query($cxn, "DELETE FROM controls WHERE id = '$id'");
    if ($delete) {
        echo '1';
    } else {
        echo '2';
    }
}

//Logout
if (isset($_GET['logout'])) {
    foreach ($_SESSION as $sir) {
        unset($_SESSION[$sir]);
    }
    session_destroy();
    $feedback = "Logout successful!";
    header('location: ../auth/login.php?feedback=' . $feedback . "&alert=s");
}
