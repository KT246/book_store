<?php

@session_start();
include_once 'con_db.php';
// add product
if (isset($_GET['add']) && !empty($_GET['add'])) {

    // Find product
    $id = $_GET['add'];
    $numer = array();
    $newProduct = array();
    $sql = "SELECT * FROM tb_book WHERE id_book = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    $data = $stmt->fetch();
    $numer[$data['id_book']] = array('id_book' => $data['id_book'], 'qty' => '');
    $newProduct[$data['id_book']] = array(
        'id_book' => $data['id_book'],
        'name_book' => $data['name_book'],
        'qty' => '',
        'price' => $data['price'],
        'image' => $data['image'],
        'chon' => false
    );

    // Initialize session variables if they are not set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (!isset($_SESSION['mess'])) {
        $_SESSION['mess'] = array();
    }

    if (empty($_SESSION['cart'])) {
        $newProduct[$id]['qty'] = 1;
        $_SESSION['cart'][$id] = $newProduct[$id];
        $numer[$id]['qty'] = 1;
        $_SESSION['mess'][$id] = $numer[$id];
    } else {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty'] += 1;
        } else {
            $newProduct[$id]['qty'] = 1;
            $_SESSION['cart'][$id] = $newProduct[$id];
            $numer[$id]['qty'] = 1;
            $_SESSION['mess'][$id] = $numer[$id];
        }
    }

    echo '<script>window.location.href="cart.php"</script>';
}



//Dat hang ngay
if (isset($_GET['buy']) && !empty($_GET['buy'])
) {

    // Find product
    $id = $_GET['buy'];
    $numer = array();
    $newProduct = array();
    $sql = "SELECT * FROM tb_book WHERE id_book = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    $data = $stmt->fetch();
    $numer[$data['id_book']] = array('id_book' => $data['id_book'], 'qty' => '');
    $newProduct[$data['id_book']] = array(
        'id_book' => $data['id_book'],
        'name_book' => $data['name_book'],
        'qty' => '',
        'price' => $data['price'],
        'image' => $data['image'],
        'chon' => false
    );

    // Initialize session variables if they are not set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (!isset($_SESSION['mess'])) {
        $_SESSION['mess'] = array();
    }

    if (empty($_SESSION['cart'])) {
        $newProduct[$id]['qty'] = 1;
        $_SESSION['cart'][$id] = $newProduct[$id];
        $numer[$id]['qty'] = 1;
        $_SESSION['mess'][$id] = $numer[$id];
    } else {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty'] += 1;
        } else {
            $newProduct[$id]['qty'] = 1;
            $_SESSION['cart'][$id] = $newProduct[$id];
            $numer[$id]['qty'] = 1;
            $_SESSION['mess'][$id] = $numer[$id];
        }
    }

    echo '<script>window.location.href="pay.php"</script>';
}
