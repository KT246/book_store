<?php
session_start();

if (!isset($_SESSION['cart'])) {
    echo '  <p class="fixed left-[35%] top-[30%] text-xl">Giỏ bạn chưa có hàng. Vui lòng chọn hàng trước.</p>
                <a href="index.php" 
                class="bg-blue-400 text-center text-gray-100 px-2 rounded py-1 fixed left-[45%] top-[40%] ">Chọn hàng</a>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>



<?php

if (isset($_SESSION['cart'])) {
    $total = 0;
    $sum = 0;

?>

    <body class="bg-slate-200">
        <div class="bg-gray-100 mx-[10%]">
            <div class="h-auto ">
                <h1 class="text-3xl text-gray-900 ml-5 py-2 font-semibold">Giỏ hàng</h1>
                <div class="grid grid-cols-6 gap-2 text-center bg-green-400 py-1 my-1 font-semibold">
                    <p class="text-gray-900 ">Xóa</p>
                    <!-- <p class="text-gray-900 text-left">Chọn</p> -->
                    <p class="text-gray-900 ">Hình</p>
                    <p class="text-gray-900 ">Tên</p>
                    <p class="text-gray-900 ">Giá</p>
                    <p class="text-gray-900 ">số lượng</p>
                    <p class="text-gray-900 ">tổng cộng</p>
                </div>

                <!-- =======================card============================= -->
                <?php
                foreach ($_SESSION['cart'] as $item) {

                    $sum = $item['price'] * 0.7 * $item['qty'];

                    $sum_format = number_format($sum, 0, ',', ',');
                    
                    $total += $sum;

                    $price_format = number_format($item['price'] * 0.7, 0, ',', ',');
                ?>
                    <div class="grid grid-cols-6 gap-2 text-center items-center my-1">
                        <a href="cart.php?action=xoa&id=<?= $item['id_book'] ?>" class="hover:text-white text-red-500 hover:bg-red-500 rounded-full mx-[70px] p-1 font-semibold">X</a>
                        <!-- <p class="text-left"><input type="checkbox" name="select_prod"  class="w-5 h-5"></p> -->
                        <div class="grid place-content-center">
                            <img src="images/<?= $item['image']; ?>" alt="" class="w-[50px] h-[70px]">
                        </div>
                        <p><?= $item['name_book']; ?></p>
                        <p><?= $price_format . " VNĐ"; ?></p>
                        <div class="flex justify-center">
                            <a class="px-1 rounded border-solid border-2 hover:text-white hover:bg-green-500 border-gray-900" href="cart.php?action=tang&id=<?= $item['id_book'] ?>">+</a>
                            <p class="mx-5"><?= $item['qty']; ?></p>
                            <a class="px-1 rounded border-solid border-2 hover:text-white hover:bg-red-500 border-gray-900 " href="cart.php?action=giam&id=<?= $item['id_book'] ?>">-</a>
                        </div>
                        <p><?= $sum_format . " VNĐ"; ?></p>
                    </div>
                    <hr class="mb-1">

                <?php
                }
                $total_format = number_format($total,0, ',', ',');
                ?>


                
                <!-- ==============Pay==================== -->
                <div class="grid grid-cols-2">
                    <div class="flex items-end px-2 py-1">
                        <a href="index.php" class="bg-blue-400 text-center text-gray-100 px-2 rounded py-1">Chọn hàng tiếp</a>
                    </div>
                    <div class="grid place-content-end">
                        <div class="p-1 w-[200px]">
                            <div class="flex">
                                <p class="ms-9 ">Total: </p>
                                <p class="ms-4"><?= $total_format . " VNĐ"; ?> </p>
                            </div>
                            <a href="pay.php" class="block bg-blue-400 text-center mt-3 ms-10 me-3 text-gray-100 rounded py-1">Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php

    }

        ?>
    </body>

</html>

<!-- Xử lý tăng giảm số lượng book  -->
<?php


if (isset($_GET['action'])) {
    $id = ($_GET['id']);

    if ($_GET['action'] == 'tang') {
        $_SESSION['cart'][$id]['qty'] += 1;
    }

    if ($_GET['action'] == 'giam') {
        if ($_SESSION['cart'][$id]['qty'] > 1) {
            $_SESSION['cart'][$id]['qty'] -= 1;
        } else {
            $_SESSION['cart'][$id]['qty'];
        }
    }

    if ($_GET['action'] == 'xoa') {
        unset($_SESSION['cart'][$id]);
        unset($_SESSION['mess'][$id]); // xóa đi session số lượng trong giỏ hàng 

    }

    if (empty($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }
}
?>