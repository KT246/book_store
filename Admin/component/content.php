<?php

    if(isset($_GET['coi'])){
        $coi = $_GET['coi'];

        if($coi == 'dashbord'){
            include_once './content/dashbord.php';
        }
        elseif($coi == 'product'){
            include_once './content/product.php';
        }
        elseif($coi == 'user'){
            include_once './content/user.php';
        }
        elseif($coi == 'history'){
            include_once './content/history.php';
        }
        elseif($coi == 'order'){
            include_once './content/order.php';
        }
    }
?>