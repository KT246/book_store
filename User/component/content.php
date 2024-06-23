<?php

    if(isset($_GET['coi'])){
        $menu = $_GET['coi'];
//------------ index content
        if($menu == 'home'){
            include './User/content/allProduct.php';
        }
        elseif($menu == 'allp'){
            include './User/content/allProduct.php';
        }
        elseif($menu == 'mathp'){
            include './User/content/mathProduct.php';
        }
        elseif($menu == 'programp'){
            include './User/content/programProduct.php';
        }
        elseif($menu == 'cartoonp'){
            include './User/content/cartoonProduct.php';
        }
        elseif($menu == 'detail'){
            include './User/content/detail.php';
        }
        elseif($menu == 'search'){
            include './User/content/search.php';
        }
        elseif($menu == 'set'){
            include './set.php';
        }

//------------ page content

   
}else{
    include './User/content/allProduct.php';
}
    
?>