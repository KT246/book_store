<?php


    include_once 'con_db.php';
    // add product

    
    if(isset($_GET['add']) && !empty($_GET['add'])){
        $id = $_GET['add'];
        $newProduct = array();
        $sql = "SELECT * FROM tb_book WHERE id_book = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        $data = $stmt->fetch();
        $newProduct[$data['id_book']] = array(
                                                'id_book' => $data['id_book'], 
                                                'name_book' => $data['name_book'], 
                                                'qty' => '', 
                                                'price' => $data['price'] 
                                            );
                                            // echo "<pre>";
                                            // print_r($newProduct); // Use print_r() to print the array
                                            // echo "</pre>";

        if(!isset($_SESSION['cart']) && $_SESSION['cart'] == null){
            $newProduct[$id]['qty'] = 1;
            $_SESSION['cart'][$id] = $newProduct[$id];
        }else{
            if(isset($_SESSION['cart'][$id]) && $_SESSION['cart'][$id] != null){
                $_SESSION['cart'][$id]['qty'] += 1;
            }else{
                $newProduct[$id]['qty'] = 1;
                $_SESSION['cart'][$id] = $newProduct[$id];
            }
            
           echo '<script>window.location.href="cart.php"</script>';
        }
        
    }
    
    if(isset($_SESSION['cart'])){
		//giam san pham
		if(isset($_GET['giam'])){                                                     
			$id=$_GET['giam'];
			if($_SESSION['cart'][$id]['qty']>1){
				$_SESSION['cart'][$id]['qty']-=1;
			}else{
				$_SESSION['cart'][$id]['qty']=$_SESSION['cart'][$id]['qty'];
			}
			
            echo '<script>window.location.href="cart.php"</script>';
		}
		//tang san pham
		if(isset($_GET['tang'])){
			$id=$_GET['tang'];
			$_SESSION['cart'][$id]['qty']+=1;
            echo '<script>window.location.href="cart.php"</script>';
		}
		//xoa san pham
		// if(isset($_GET['xoa'])){
            // 	$id=$_GET['xoa'];
            // 	unset($_SESSION['cart'][$id]);
            // 	header('location:index.php?xem=giohang');
            // }
            
        }
            
            
            
            
    ?>