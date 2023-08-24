<?php
// session_start();
// $host = 'localhost';        // Your MySQL hostname. Usualy named as 'localhost', so you're NOT necessary to change this even this script has already online on the internet.
// $db   = 'pizzasqu_db'; // Your database name.
// $user = 'pizzasqu_user';             // Your database username.
// $password = 'HUVN#y.eeP4!';                 // Your database password. If your database has no password, leave it empty.
// // Let's connect to host
// $cxn =  mysqli_connect($host, $user, $password, $db) or die('Connection to host is failed, perhaps the service is down!');
// // Select the database
// mysqli_select_db($cxn, $db) or die('Database name is not available!');

// $site_name = 'PIZZA SQUARE';
// $site = "http://www.pizzasquare.ng/";

// //Site Sessions
// $_SESSION['site_name'] = $site_name;
// $_SESSION['site'] = $site;




session_start();
$host = 'localhost';        // Your MySQL hostname. Usualy named as 'localhost', so you're NOT necessary to change this even this script has already online on the internet.
$db   = 'pizzasquare'; // Your database name.
$user = 'root';             // Your database username.
$password = '';                 // Your database password. If your database has no password, leave it empty.
// Let's connect to host
$cxn =  mysqli_connect($host, $user, $password, $db) or die('Connection to host is failed, perhaps the service is down!');
// Select the database
mysqli_select_db($cxn, $db) or die('Database name is not available!');

$site_name = 'PIZZA SQUARE';
$site = "http://localhost/pizzasquare/";

//Site Sessions
$_SESSION['site_name'] = $site_name;
$_SESSION['site'] = $site;
