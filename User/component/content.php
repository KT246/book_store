<?php

    if(isset($_GET['coi'])){
        $menu = $_GET['coi'];
//------------ index content
        if($menu == 'home'){
            include 'content/allProduct.php';
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

//------------ page content

   
}
    
?>