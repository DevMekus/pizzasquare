<?php
include('../config/functions.php');

//Get the Product
if (isset($_GET['getProduct'])) {
    $productCategory = $_GET['getProduct'];
    $getProducts = mysqli_query($cxn, "SELECT * FROM products WHERE category = '$productCategory' ORDER BY productName, rank ASC");
    if ($row = mysqli_num_rows($getProducts) > '0') {
        $productArray = array();
        while ($data = mysqli_fetch_array($getProducts)) {
            $product = new stdClass();
            foreach ($data as $item => $item_value) {
                $product->$item = $item_value;
            }
            array_push($productArray, $product);
        }
        echo json_encode($productArray);
    } else {
        echo '1';
    }
}

//Get the Product
if (isset($_GET['uploadOrder'])) {
    $order = json_decode($_GET['uploadOrder']);
    $cart = json_decode($_GET['cart']);
    $cartStringed = json_encode($cart);


    foreach ($order as $orr) {
        $fullname = $orr->fullname;
        $address = $orr->address;
        $phone = $orr->phone;
        $email = $orr->email;
        $invoiceID = $orr->invoiceID;
        $totalBill = $orr->totalBill;
        $invoiceDate = $orr->invoiceDate;
        $deliveryType = $orr->deliveryType;
    }

    foreach ($cart as $ct) {
        $price = $ct->price;
        $name = $ct->name;
        $qty = $ct->qty;
        $size = $ct->size;
    }

    // $deliveryOption = "undecided";
    $ready = 'no';
    date_default_timezone_set('Africa/Lagos');
    $date = date('m-d-Y h:i:s a', time());

    $saveOrder = mysqli_query($cxn, "INSERT INTO orders(customer,daddress,phone,items,amount,delivery,payRef,ready,order_date,Orderdates)VALUES
    ('{$fullname}','{$address}','{$phone}','{$cartStringed}','{$totalBill}','{$deliveryType}','{$invoiceID}','{$ready}','{$invoiceDate}','{$date}')");
    if ($saveOrder) {
        //Send Message to Client
        $title = "ORDER RECEIVED";
        $message = "Your order has been received and is now being processed.<br>";
        $message .= "Your payment Reference code is: <span style='color:red'>" . $invoiceID . "</span><br>";
        $message .= "Visit our site and check the status of your order. <br>";
        $message .= "For additional information, please call 0805 5544 014 or send us  a <a href='https://wa.me/message/SSNSNBBECRONE1'>whatsapp message</a>. <br>";
        $response = sendMail($fullname, $email, $title, $message);

        //Send Message to PizzaSquare
        //Send Message to Client
        $title = "NEW ORDER RECEIVED";
        $companyEmail = "pizzasquare.ng@gmail.com";
        // $companyEmail = "emma.nnaemeka@yahoo.com";
        $companyName = "PizzaSquare";
        $message = "A new order from " . $fullname . ", with Order reference number: " . $invoiceID . " and payment of " .  number_format($totalBill, 2) . " on " . $invoiceDate . " has just arrived.";
        $message .= "<br>";
        $message .= "<br>";
        $message .= "<b>ORDER DETAILS:</b>";
        $message .= '
        <div class="row">
        <div class="col-sm-12">
            <div class="table_cont" style=" width: 100%;position:relative;  overflow: scroll">
                <table class="table table-striped " style="min-width: 100%">
                    <thead>
                        <tr>                            
                           
                            <th scope="col" class="text-center">Des</th>                           
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Qty</th>                           
                            <th scope="col" class="text-center">Size</th>                           
                            
                      </tr>                     
                    </thead>
                    <tbody>
        
        ';
        foreach ($cart as $item) {;

            $message .= '
                    <tr>  
                        <td class="text-center">' . $item->name . '</td>
                        <td class="text-center price">' . $item->price . '</td>
                        <td class="text-center">' . $item->qty . '</td>                        
                        <td class="text-center">' . $item->size . '</td>                        
                   </tr>
            ';
        }

        $message .= '
            </tbody>
        </table>
        </div>
        <br>
        <div class="summary-invoice">
        <div class="summary-inner">             
             <div class="item">
                 <h4>Amount paid: <span style="color:red">' . number_format($totalBill, 2) . '</span></h4>                 
                 <p>Delivery option : ' . $deliveryType . '</p>
                 <p>For more enquiries, You can contact the customer by phone: ' . $phone . ', or by his email: ' . $email . '</p>
             </div>                    
        </div>
       </div>
        ';
        $toPizzaquare = sendMail($companyName, $companyEmail, $title, $message);
        if ($toPizzaquare) {
            $_SESSION['payRef'] = $invoiceID;
            //Get the order and send back
            $getOrder = mysqli_query($cxn, "SELECT * FROM orders WHERE payRef = '$invoiceID'");
            if ($row = mysqli_num_rows($getOrder) > '0') {
                $orderArray = array();
                while ($data = mysqli_fetch_array($getOrder)) {
                    $order = new stdClass();
                    foreach ($data as $item => $item_value) {
                        $order->$item = $item_value;
                    }
                    array_push($orderArray, $order);
                }
                echo json_encode($orderArray);
            }
        } else {
            echo "0";
        }
    }
}

if (isset($_GET['track'])) {
    $ref = mysqli_real_escape_string($cxn, $_POST['tracking']);
    $getOrder = mysqli_query($cxn, "SELECT * FROM orders WHERE payRef = '$ref'");
    if ($row = mysqli_num_rows($getOrder) > '0') {
        $dt = mysqli_fetch_array($getOrder);
        if ($dt['ready'] == 'no') {
            echo "0";
        } else {
            echo "1";
        }
    } else {
        echo "3";
    }
}
