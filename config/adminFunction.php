<?php
$feedback = "Please Login";
if (!(isset($_SESSION['admin']))) : header('location: ../auth/login.php?feedback=' . $feedback . '&alert=d');
endif;

function displayCustomers($cxn)
{
    //define total number of results you want per page  
    $results_per_page = 10;
    //find the total number of results stored in the database  
    $query = "SELECT * FROM customers";
    $result = mysqli_query($cxn, $query);
    $customerrow = mysqli_num_rows($result);
    $number_of_result = mysqli_num_rows($result);
    //determine the total number of pages available  
    $number_of_page = ceil($number_of_result / $results_per_page);

    //determine which page number visitor is currently on  
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page - 1) * $results_per_page;
    //retrieve the selected results from database   
    $query = "SELECT * FROM customers LIMIT " . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($cxn, $query);
    $customerContainer = '';
    //display the retrieved result on the webpage 

    if ($row = mysqli_num_rows($result) > "0") {
        $customerContainer .= '
            <table class="table table-striped " style="min-width: 100%">
                <thead>
                    <tr>                            
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">FULLNAME</th>                           
                        <th scope="col" class="text-center">ADDRESS</th>
                        <th scope="col" class="text-center">EMAIL</th>
                        <th scope="col" class="text-center">PHONE</th>
                        <th scope="col" class="text-center">...</th>
                        
                    </tr> 
                </thead>
                <tbody>                    
            
        ';
        while ($row = mysqli_fetch_array($result)) {
            $customerContainer .= '
               
                        <tr>
                            <th scope="row">' . $row['id'] . '</th>
                            <th scope="row">' . $row['fullname'] . '</th>
                            <td class="text-center">' . $row['caddress'] . '</td>
                            <td class="text-center price">' . $row['email'] . '</td>
                            <td class="text-center">' . $row['phone'] . '</td>
                            <td class="text-center"><button class="btn btn-sm btn-outline-danger deleteCustomer" id="' . $row['id'] . '"><span class="material-symbols-outlined">
                            delete
                            </span></button></td>
                        </tr>
            
            ';
        }
        $customerContainer .= '
                    </tbody>
            </table>
        ';
        //display the link of the pages in URL 
        $customerContainer .= '
            <nav aria-label="Page navigation example">
             <ul class="pagination">
        ';

        for ($page = 1; $page <= $number_of_page; $page++) {
            $customerContainer .= '                            
                    <li class="page-item"><a class="page-link" href= "customers.php?page=' . $page . '">' . $page . '</a></li>             
        ';
        }
        $customerContainer .= '
            </ul>
        </nav>
        ';
    }
    return $customerContainer;
}

function displayProducts($cxn)
{
    //define total number of results you want per page  
    $results_per_page = 10;
    //find the total number of results stored in the database  
    $query = "SELECT * FROM products";
    $result = mysqli_query($cxn, $query);

    $number_of_result = mysqli_num_rows($result);
    //determine the total number of pages available  
    $number_of_page = ceil($number_of_result / $results_per_page);

    //determine which page number visitor is currently on  
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page - 1) * $results_per_page;
    //retrieve the selected results from database   
    $query = "SELECT * FROM products LIMIT " . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($cxn, $query);
    $customerContainer = '';
    //display the retrieved result on the webpage 

    if ($row = mysqli_num_rows($result) > "0") {
        $customerContainer .= '
            <table class="table table-striped " style="min-width: 100%">
                <thead>
                    <tr>                            
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">PRODUCT</th>                           
                        <th scope="col" class="text-center">SIZE</th>                           
                        <th scope="col" class="text-center">CATEGORY</th>
                        <th scope="col" class="text-center">PRICE</th>                        
                        <th scope="col" class="text-center">...</th>
                        
                    </tr> 
                </thead>
                <tbody>                    
            
        ';
        while ($row = mysqli_fetch_array($result)) {
            $customerContainer .= '
               
                        <tr>
                            <th scope="row">' . $row['id'] . '</th>
                            <th scope="row">' . $row['productName'] . '</th>
                            <td class="text-center">' . $row['size'] . '</td>
                            <td class="text-center price">' . $row['category'] . '</td>
                            <td class="text-center">' . $row['price'] . '</td>
                            <td class="text-center">                             
                                <a href="editProduct.php?id=' . $row['id'] . '" class="btn btn-sm btn-outline-primary editProduct" id="' . $row['id'] . '">
                                    <span class="material-symbols-outlined">edit</span>  
                                </a>
                                <button class="btn btn-sm btn-outline-danger deleteProduct" id="' . $row['id'] . '">
                                    <span class="material-symbols-outlined">delete</span>  
                                </button>
                            </td>
                        </tr>
            
            ';
        }
        $customerContainer .= '
                    </tbody>
            </table>
        ';
        //display the link of the pages in URL 
        $customerContainer .= '
            <nav aria-label="Page navigation example">
             <ul class="pagination">
        ';

        for ($page = 1; $page <= $number_of_page; $page++) {
            $customerContainer .= '                            
                    <li class="page-item"><a class="page-link" href= "products.php?page=' . $page . '">' . $page . '</a></li>             
        ';
        }
        $customerContainer .= '
            </ul>
        </nav>
        ';
    }
    return $customerContainer;
}

function getTotalProduct($cxn)
{
    $totalProduct = 0;
    $query = "SELECT * FROM products";
    $result = mysqli_query($cxn, $query);
    return $totalProduct = mysqli_num_rows($result);
}

function getTotalCustomers($cxn)
{
    $totalCustomers = 0;
    $query = "SELECT * FROM customers";
    $result = mysqli_query($cxn, $query);
    return $totalCustomers = mysqli_num_rows($result);
}

function getReadyOrders($cxn)
{
    $totalReady = 0;
    $query = "SELECT * FROM orders WHERE ready = 'yes'";
    $result = mysqli_query($cxn, $query);
    return $totalReady = mysqli_num_rows($result);
}

function getTotatAdmin($cxn)
{
    $admin = 0;
    $query = "SELECT * FROM controls";
    $result = mysqli_query($cxn, $query);
    return $admin = mysqli_num_rows($result);
}

function getTotalZones($cxn)
{
    $total = 0;
    $query = "SELECT * FROM deliveryzone ";
    $result = mysqli_query($cxn, $query);
    return $total = mysqli_num_rows($result);
}

function getPendingOrders($cxn)
{
    $totalPending = 0;
    $query = "SELECT * FROM orders WHERE ready = 'no'";
    $result = mysqli_query($cxn, $query);
    return $totalPending = mysqli_num_rows($result);
}

//Get the Pending Orders
function displayPendingOrder($cxn)
{
    //define total number of results you want per page  
    $results_per_page = 10;
    //find the total number of results stored in the database  
    $query = "SELECT * FROM orders where ready = 'no'";
    $result = mysqli_query($cxn, $query);

    $number_of_result = mysqli_num_rows($result);
    //determine the total number of pages available  
    $number_of_page = ceil($number_of_result / $results_per_page);

    //determine which page number visitor is currently on  
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page - 1) * $results_per_page;
    //retrieve the selected results from database   
    $query = "SELECT * FROM orders where ready = 'no' order by id desc LIMIT " . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($cxn, $query);
    $pendingOrder = '';
    //display the retrieved result on the webpage 

    if ($row = mysqli_num_rows($result) > "0") {
        $pendingOrder .= '
            <table class="table table-striped " style="min-width: 100%">
                <thead>
                    <tr>                            
                        <th scope="col" class="text-center">REF</th>
                        <th scope="col" class="text-center">CUSTOMER</th>                           
                        <th scope="col" class="text-center">ADDRESS</th>                           
                        <th scope="col" class="text-center">PHONE</th>                                       
                        <th scope="col" class="text-center">PRICE</th>                        
                        <th scope="col" class="text-center">DELIVERY</th>                        
                        <th scope="col" class="text-center">ORDER DATE</th>                        
                        <th scope="col" class="text-center">...</th>
                        
                    </tr> 
                </thead>
                <tbody>                    
            
        ';
        while ($row = mysqli_fetch_array($result)) {
            $pendingOrder .= '
               
                        <tr>
                            <th scope="row">' . $row['payRef'] . '</th>
                            <th scope="row">' . $row['customer'] . '</th>
                            <td class="text-center">' . $row['daddress'] . '</td>
                            <td class="text-center price">' . $row['phone'] . '</td>                            
                            <td class="text-center">' . $row['amount'] . '</td>
                            <td class="text-center">' . $row['delivery'] . '</td>
                            <td class="text-center">' . $row['order_date'] . '</td>
                            <td class="text-center">                             
                            <a href="viewOrder.php?id=' . $row['id'] . '" class="btn btn-sm btn-outline-primary editProduct" title="Show this order"  id="' . $row['id'] . '">
                                <span class="material-symbols-outlined">visibility</span>  
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-success readyOrder" title="Ready this order" id="' . $row['id'] . '">
                                <span class="material-symbols-outlined">check_circle</span>  
                            </button>
                            <button class="btn btn-sm btn-outline-danger deleteOrder" title="Delete this order"  id="' . $row['id'] . '">
                                <span class="material-symbols-outlined">delete</span>  
                            </button>
                        </td>
                        </tr>
            
            ';
        }
        $pendingOrder .= '
                    </tbody>
            </table>
        ';
        if ($number_of_result >= 10) {
            //display the link of the pages in URL 
            $pendingOrder .= '
          <nav aria-label="Page navigation example">
           <ul class="pagination">
      ';

            for ($page = 1; $page <= $number_of_page; $page++) {
                $pendingOrder .= '                            
                  <li class="page-item"><a class="page-link" href= "orders.php?page=' . $page . '">' . $page . '</a></li>             
      ';
            }
            $pendingOrder .= '
          </ul>
      </nav>
      ';
        }
    }
    return $pendingOrder;
}


//Ready orders

//Get the ready Orders
function displayReadyOrder($cxn)
{
    //define total number of results you want per page  
    $results_per_page = 10;
    //find the total number of results stored in the database  
    $query = "SELECT * FROM orders where ready = 'yes'";
    $result = mysqli_query($cxn, $query);

    $number_of_result = mysqli_num_rows($result);
    //determine the total number of pages available  
    $number_of_page = ceil($number_of_result / $results_per_page);

    //determine which page number visitor is currently on  
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page - 1) * $results_per_page;
    //retrieve the selected results from database   
    $query = "SELECT * FROM orders where ready = 'yes' order by id desc LIMIT " . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($cxn, $query);
    $readyOrder = '';
    //display the retrieved result on the webpage 

    if ($row = mysqli_num_rows($result) > "0") {
        $readyOrder .= '
            <table class="table table-striped " style="min-width: 100%">
                <thead>
                    <tr>                            
                        <th scope="col" class="text-center">REF</th>
                        <th scope="col" class="text-center">CUSTOMER</th>                           
                        <th scope="col" class="text-center">ADDRESS</th>                           
                        <th scope="col" class="text-center">PHONE</th>                                    
                        <th scope="col" class="text-center">PRICE</th>                        
                        <th scope="col" class="text-center">DELIVERY</th>                        
                        <th scope="col" class="text-center">ORDER DATE</th>                        
                        <th scope="col" class="text-center">...</th>
                        
                    </tr> 
                </thead>
                <tbody>                    
            
        ';
        while ($row = mysqli_fetch_array($result)) {
            $readyOrder .= '
               
                        <tr>
                            <th scope="row">' . $row['payRef'] . '</th>
                            <th scope="row">' . $row['customer'] . '</th>
                            <td class="text-center">' . $row['daddress'] . '</td>
                            <td class="text-center price">' . $row['phone'] . '</td>                          
                            <td class="text-center">' . $row['amount'] . '</td>
                            <td class="text-center">' . $row['delivery'] . '</td>
                            <td class="text-center">' . $row['order_date'] . '</td>
                            <td class="text-center">                             
                                <a href="viewOrder.php?id=' . $row['id'] . '" class="btn btn-sm btn-outline-primary editProduct" title="Show this order"  id="' . $row['id'] . '">
                                    <span class="material-symbols-outlined">visibility</span>  
                                </a>
                                <button class="btn btn-sm btn-outline-success pendOrder" title="Pend this order"  id="' . $row['id'] . '">
                                    <span class="material-symbols-outlined">close</span>  
                                </button>
                                <button class="btn btn-sm btn-outline-danger deleteOrder" title="Delete this order"  id="' . $row['id'] . '">
                                    <span class="material-symbols-outlined">delete</span>  
                                </button>
                            </td>
                        </tr>
            
            ';
        }
        $readyOrder .= '
                    </tbody>
            </table>
        ';
        //display the link of the pages in URL 
        $readyOrder .= '
            <nav aria-label="Page navigation example">
             <ul class="pagination">
        ';

        if ($number_of_result >= 10) {
            //display the link of the pages in URL 
            $readyOrder .= '
          <nav aria-label="Page navigation example">
           <ul class="pagination">
      ';

            for ($page = 1; $page <= $number_of_page; $page++) {
                $readyOrder .= '                            
                  <li class="page-item"><a class="page-link" href= "orders.php?page=' . $page . '">' . $page . '</a></li>             
      ';
            }
            $readyOrder .= '
          </ul>
      </nav>
      ';
        }
    }
    return $readyOrder;
}

function displayOrderDetails($cxn, $id)
{
    $getOrder = mysqli_query($cxn, "SELECT * FROM orders WHERE id = '$id'");
    if ($row = mysqli_num_rows($getOrder) > '0') {
        $dt = mysqli_fetch_array($getOrder);
        $fullname = $dt['customer'];
        $invoiceID = $dt['payRef'];
        $totalBill = $dt['amount'];
        $invoiceDate = $dt['order_date'];
        $deliveryType = $dt['delivery'];
        $phone = $dt['phone'];

        $cart = json_decode($dt['items']);
        $message = '';

        $message = "A new order from " . $fullname . ", with Order reference number: " . $invoiceID . " and payment of " .  number_format($totalBill, 2) . " on " . $invoiceDate . " has just arrived.";
        $message .= "<br>";
        $message .= "<br>";
        $message .= "ORDER DETAILS:";
        $message .= '
        <div class="row">
        <div class="col-sm-12">
            <div class="table_cont">
                <table class="table table-striped " style="min-width: 100%">
                    <thead>
                        <tr>                            
                            <th scope="col" class="text-centers">#</th>
                            <th scope="col" class="text-centers">Description</th>                           
                            <th scope="col" class="text-centers">Price</th>
                            <th scope="col" class="text-centers">Quantity</th>                           
                            <th scope="col" class="text-centers">Size</th>                           
                            
                      </tr>                     
                    </thead>
                    <tbody>
        
        ';
        foreach ($cart as $item) {;

            $message .= '
                    <tr>
                        
                        <td class="text-centers">' . $invoiceID . '</td>
                        <td class="text-centers">' . $item->name . '</td>
                        <td class="text-centers price">' . $item->price . '</td>
                        <td class="text-centers">' . $item->qty . '</td>                        
                        <td class="text-centers">' . $item->size . '</td>                        
                   </tr>
            ';
        }

        $message .= '
            </tbody>
        </table>
        <br>
        <div class="summary-invoice">
        <div class="summary-inner">             
             <div class="item">
                 <h5>Amount paid: <span style="color:red">' . number_format($totalBill, 2) . '</span></h5>                 
               
             </div>                    
        </div>
       </div>
       <p>Delivery option : ' . $deliveryType . '</p>
       <p>For more enquiries, You can contact the customer by phone: ' . $phone . '</p>
        ';
    }

    return $message;
}


//Delivery Zones
function displayZones($cxn)
{
    //define total number of results you want per page  
    $results_per_page = 10;
    //find the total number of results stored in the database  
    $query = "SELECT * FROM deliveryzone";
    $result = mysqli_query($cxn, $query);

    $number_of_result = mysqli_num_rows($result);
    //determine the total number of pages available  
    $number_of_page = ceil($number_of_result / $results_per_page);

    //determine which page number visitor is currently on  
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page - 1) * $results_per_page;
    //retrieve the selected results from database   
    $query = "SELECT * FROM deliveryzone LIMIT " . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($cxn, $query);
    $readyOrder = '';
    //display the retrieved result on the webpage 

    if ($row = mysqli_num_rows($result) > "0") {
        $readyOrder .= '
            <table class="table table-striped " style="min-width: 100%">
                <thead>
                    <tr>                            
                        <th scope="col" class="text-centera">#</th>
                        <th scope="col" class="text-centera">ZONE</th>                           
                        <th scope="col" class="text-centera">FEE</th>                          
                                            
                        <th scope="col" class="text-centera">...</th>
                        
                    </tr> 
                </thead>
                <tbody>                    
            
        ';
        while ($row = mysqli_fetch_array($result)) {
            $readyOrder .= '
               
                        <tr>
                            <th scope="row">' . $row['id'] . '</th>
                            <th scope="row">' . $row['zones'] . '</th>
                            <td class="text-centers">"₦" ' . $row['amount'] . '</td>
                            
                            <td class="text-centera">                             
                                <a href="editZone.php?id=' . $row['id'] . '" class="btn btn-sm btn-outline-primary editZone" title="Show this order"  id="' . $row['id'] . '">
                                    <span class="material-symbols-outlined">edit</span>  
                                </a>                              
                                <button class="btn btn-sm btn-outline-danger deleteZone" title="Delete this order"  id="' . $row['id'] . '">
                                    <span class="material-symbols-outlined">delete</span>  
                                </button>
                            </td>
                        </tr>
            
            ';
        }
        $readyOrder .= '
                    </tbody>
            </table>
        ';
        //display the link of the pages in URL 
        $readyOrder .= '
            <nav aria-label="Page navigation example">
             <ul class="pagination">
        ';

        if ($number_of_result >= 10) {
            //display the link of the pages in URL 
            $readyOrder .= '
          <nav aria-label="Page navigation example">
           <ul class="pagination">
      ';

            for ($page = 1; $page <= $number_of_page; $page++) {
                $readyOrder .= '                            
                  <li class="page-item"><a class="page-link" href= "delivery.php?page=' . $page . '">' . $page . '</a></li>             
      ';
            }
            $readyOrder .= '
          </ul>
      </nav>
      ';
        }
    }
    return $readyOrder;
}


//Admins
function administrators($cxn)
{
    //define total number of results you want per page  
    $results_per_page = 10;
    //find the total number of results stored in the database  
    $query = "SELECT * FROM controls";
    $result = mysqli_query($cxn, $query);

    $number_of_result = mysqli_num_rows($result);
    //determine the total number of pages available  
    $number_of_page = ceil($number_of_result / $results_per_page);

    //determine which page number visitor is currently on  
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page - 1) * $results_per_page;
    //retrieve the selected results from database   
    $query = "SELECT * FROM controls LIMIT " . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($cxn, $query);
    $readyOrder = '';
    //display the retrieved result on the webpage 

    if ($row = mysqli_num_rows($result) > "0") {
        $readyOrder .= '
            <table class="table table-striped " style="min-width: 100%">
                <thead>
                    <tr>                            
                        <th scope="col" class="text-centera">#</th>
                        <th scope="col" class="text-centera">NAME</th>                           
                        <th scope="col" class="text-centera">EMAIL</th>                          
                        <th scope="col" class="text-centera">PASSWORD</th>                          
                                            
                        <th scope="col" class="text-centera">...</th>
                        
                    </tr> 
                </thead>
                <tbody>                    
            
        ';
        while ($row = mysqli_fetch_array($result)) {
            $readyOrder .= '
               
                        <tr>
                            <th scope="row">' . $row['id'] . '</th>
                            <th scope="row">' . $row['name'] . '</th>
                            <th scope="row">' . $row['email'] . '</th>
                            <th scope="row">' . $row['pass'] . '</th>
                           
                            
                            <td class="text-centera">                             
                                <a href="editAdmin.php?id=' . $row['id'] . '" class="btn btn-sm btn-outline-primary" title="Show this order"  id="' . $row['id'] . '">
                                    <span class="material-symbols-outlined">edit</span>  
                                </a>                              
                                <button class="btn btn-sm btn-outline-danger deleteAdmin" title="Delete this order"  id="' . $row['id'] . '">
                                    <span class="material-symbols-outlined">delete</span>  
                                </button>
                            </td>
                        </tr>
            
            ';
        }
        $readyOrder .= '
                    </tbody>
            </table>
        ';
        //display the link of the pages in URL 
        $readyOrder .= '
            <nav aria-label="Page navigation example">
             <ul class="pagination">
        ';

        if ($number_of_result >= 10) {
            //display the link of the pages in URL 
            $readyOrder .= '
          <nav aria-label="Page navigation example">
           <ul class="pagination">
      ';

            for ($page = 1; $page <= $number_of_page; $page++) {
                $readyOrder .= '                            
                  <li class="page-item"><a class="page-link" href= "delivery.php?page=' . $page . '">' . $page . '</a></li>             
      ';
            }
            $readyOrder .= '
          </ul>
      </nav>
      ';
        }
    }
    return $readyOrder;
}
