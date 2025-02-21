<?php 
    # Active Menu
    function active($currect_page){
        $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
        $url = end($url_array);  
        if($currect_page == $url){
            echo 'active'; //class name in css 
        } 
    }

    //<li class="nav-item <?php active('index.php'); active(''); ? >"> //Use like this

    # Menu
    $menu = array(
        array('Home','/'),
        array('About','about.php'),
        array('Services','services.php'),
        array('Contact','contact.php'),
    );

?>