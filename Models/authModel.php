<?php
include('../config/functions.php');
//User Login
if (isset($_GET['login'])) {
    $email = mysqli_real_escape_string($cxn, $_POST['email']);
    $phone = mysqli_real_escape_string($cxn, $_POST['phone']);
    //Check if User has registered before
    $result1 = mysqli_query($cxn, "SELECT * FROM customers WHERE email = '{$email}' AND phone = '{$phone}'");
    if ($row = mysqli_num_rows($result1) == '0') {
        //check admin
        $check = "SELECT * FROM controls WHERE email = '{$email}' AND pass =  '{$phone}'";
        $result = mysqli_query($cxn, $check);
        $row2 = mysqli_num_rows($result);
        if ($row2 > "0") {
            $userdata = mysqli_fetch_array($result);
            $_SESSION['admin'] = $userdata['id'];
            echo 'a';
        } else {
            echo '0';
        }
    } else {
        $userdata = mysqli_fetch_array($result1);
        $_SESSION['customer'] = $userdata['id'];
        echo '2';
    }
}

//Signup
if (isset($_GET['signup'])) {
    //Sanitize Data
    $name = mysqli_real_escape_string($cxn, $_POST['fullname']);
    $email = mysqli_real_escape_string($cxn, $_POST['email']);
    $address = mysqli_real_escape_string($cxn, $_POST['address']);
    $phone = mysqli_real_escape_string($cxn, $_POST['phone']);


    date_default_timezone_set('Africa/Lagos');
    $today = date('d-m-y h:m:s', time());

    //Check if User has registered before
    $result = mysqli_query($cxn, "SELECT * FROM customers WHERE phone = '{$phone}' OR email = '{$email}'");
    if ($row = mysqli_num_rows($result) == '0') {
        $saveUser = mysqli_query($cxn, "INSERT INTO customers(fullname,caddress,email,phone,regDate)VALUE('{$name}','{$address}','{$email}','{$phone}','{$today}')");
        if ($saveUser) {
            $result1 = mysqli_query($cxn, "SELECT * FROM customers WHERE email = '{$email}' AND phone = '{$phone}'");
            if ($row = mysqli_num_rows($result1) > '0') {
                $userdata = mysqli_fetch_array($result1);
                $_SESSION['customer'] = $userdata['id'];
                //Send Mail
                $title = "Welcome to the PIZZASQUARE.";
                $message = "We at PIZZASQUARE are very excited to have you with us.";
                $message .= "We hope that you enjoy every bite";
                $response = sendMail($name, $email, $title, $message);
                echo '2';
            }
        } else {
            echo "0";
        }
    } else {
        echo '3';
    }
}

//Forgot Password
if (isset($_POST['forgot_btn'])) {
    $email = mysqli_real_escape_string($cxn, $_POST['email']);
    $temp_pass =  substr(str_shuffle(MD5(microtime())), 0, 5);

    $getDetails = mysqli_query($cxn, "SELECT * FROM customers WHERE email = '$email'");
    if ($row = mysqli_num_rows($getDetails) > '0') {
        $data = mysqli_fetch_array($getDetails);
        $fullname = $data['fullname'];
        $email = $data['email'];

        //Change the Password
        $update = mysqli_query($cxn, "UPDATE customers SET pass = '{$temp_pass}' WHERE email = '{$email}'");
        if ($update) {
            $title = "Password Reset";
            $message = "You have requested to change your password. <br>";
            $message .= "Reset your password with the Temporal Password Code below. <br>";
            $message .= "Temporal Password: <span style='color:red'>" . $temp_pass . "</span>";
            $mail = sendMail($fullname, $email, $title, $message);

            if ($mail) {
                $feedback = "Password reset code sent to your email address";
                header('location: ../auth/passchange.php?feedback=' . $feedback . "&alert=s");
            } else {
                $feedback = "Error: Reset Code Failed to send. Try again or contact the admin";
                header('location: ../auth/reset.php?feedback=' . $feedback . "&alert=d");
            }
        } else {
            $feedback = "Error: Reset failed. Try again or contact the admin";
            header('location: ../auth/reset.php?feedback=' . $feedback . "&alert=d");
        }
    } else {
        //Email not valid
        $feedback = "No account is attached to this email";
        header('location: ../auth/reset.php?feedback=' . $feedback . "&alert=d");
    }
}

//Reset Password
if (isset($_POST['reset_pass'])) {
    $oldPassword = mysqli_real_escape_string($cxn, $_POST['oldPassword']);
    $newPassword = mysqli_real_escape_string($cxn, $_POST['newPassword']);

    //Check the user detail
    $getDetails = mysqli_query($cxn, "SELECT * FROM customers WHERE pass = '$oldPassword'");
    if ($row = mysqli_num_rows($getDetails) > '0') {
        //Update th password
        $dt = mysqli_fetch_array($getDetails);
        $id = $dt['id'];
        $update = mysqli_query($cxn, "UPDATE customers SET pass = '$newPassword' WHERE id='$id'");
        if ($update) {
            $feedback = "Password reset successfull";
            header('location: ../auth/passchange.php?feedback=' . $feedback . "&alert=s");
        } else {
            $feedback = "Password reset failed. Contact the admin";
            header('location: ../auth/passchange.php?feedback=' . $feedback . "&alert=d");
        }
    } else {
        $feedback = "Incorrect Password";
        header('location: ../auth/passchange.php?feedback=' . $feedback . "&alert=d");
    }
}

if (isset($_POST['changeAddress'])) {
    $customer = $_SESSION['customer'];
    $address = mysqli_real_escape_string($cxn, $_POST['address']);
    $update = mysqli_query($cxn, "UPDATE customers SET caddress = '$address' WHERE id = '$customer'");
    if ($update) {
        $feedback = "Address changed";
        header('location: ../checkout.php?feedback=' . $feedback . "&alert=s");
    } else {
        $feedback = "Address failed to change";
        header('location: ../checkout.php?feedback=' . $feedback . "&alert=d");
    }
}
