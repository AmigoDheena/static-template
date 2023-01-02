<?php

// Active Menu
function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);  
    if($currect_page == $url){
        echo 'active'; //class name in css 
    } 
  }
//<li class="nav-item <?php active('index.php'); active(''); ? >"> //Use like this
// Active Menu

$company = "Company_name";
$phone = ['9876543210','1234567890'];
$email = "admin@email.com";
$address = "254 Street Avenue, Los Angeles, LA 2415 US";
$address_short =  "Los Angeles, LA 2415 US";

$services = array(
  array('ID','Product'),
);
?>