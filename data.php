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

/*
$ser = array(
	"Valve1" => array(
	   "sub",
	),
  );
$keys = array_keys($ser);
for($i = 0; $i <= 0; $i++) {
	foreach($ser[$keys[$i]] as $key => $value) {

	}
}
*/



$company = "Company_name";
$phone = ['9876543210','1234567890'];
$email = "admin@email.com";
$address = "254 Street Avenue, Los Angeles, LA 2415 US";
$address_short =  "Los Angeles, LA 2415 US";
$year = date('Y');
$footer_credit = '© Copyright '. $year ." " .  $company . ' | Developed by <a class="linear-text-two" href="https://clickplus.co.in" title="ClickPlus Solutions" rel="dofollow">ClickPlus Solutions</a>';

$services = array(
  array('ID','Product'),
);

$whatsapp = '
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=9876543210" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
<style>
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
</style>';
?>