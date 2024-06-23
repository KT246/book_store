<?php

session_start();
include_once 'con_db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>

    <?php
    if (isset($_SESSION['cart'])) {
        $total = 0;
        $sum = 0;
        $qty = 0;
        $id_user = "";

    ?>

        <body class="bg-slate-200">
            <div class="bg-gray-100 mx-[25%]">
                <div class="h-auto ">
                    <h1 class="text-3xl text-gray-900 ml-5 py-2 font-semibold">Thanh toán</h1>
                    <div class="grid grid-cols-4 gap-2 text-center bg-green-400 py-1 my-1 font-semibold">
                        <!-- <p class="text-gray-900 ">Xóa</p> -->
                        <!-- <p class="text-gray-900 text-left">Chọn</p> -->
                        <p class="text-gray-900 ">Hình</p>
                        <p class="text-gray-900 ">Tên</p>
                        <p class="text-gray-900 ">Giá</p>
                        <p class="text-gray-900 ">số lượng</p>
                    </div>

                    <!-- =======================card============================= -->
                    <?php
                    foreach ($_SESSION['cart'] as $item) {
                        $qty += $item['qty'];
                        $sum = $item['price'] * 0.7 * $item['qty'];
                        $total += $sum;
                        $price_format = number_format($item['price'] * 0.7, 0, ',', ',');
                    ?>
                        <div class="grid grid-cols-4 gap-2 text-center items-center my-1">
                            <div class="grid place-content-center">
                                <img src="images/<?= $item['image']; ?>" alt="" class="w-[50px] h-[70px]">
                            </div>
                            <p><?= $item['name_book']; ?></p>
                            <p><?= $price_format . " VNĐ"; ?></p>
                            <div class="flex justify-center">
                                <p class="mx-5"><?= $item['qty']; ?></p>
                            </div>
                        </div>
                        <hr class="mb-1">

                    <?php
                    }

                    $total_format = number_format($total, 0, ',', ',');

                    ?>


                    <!-- ==============Pay==================== -->
                    <div class="grid grid-cols-4 pb-1">
                        <?php

                        if (isset($_SESSION['login'])) {
                            $username = $_SESSION['login'];
                            $sql = "SELECT * FROM tb_user WHERE username = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$username]);

                            $data = $stmt->fetch();
                            $id_user = $data['id_user'];
                        ?>
                            <div class="col-span-3 px-1">
                                <div class="w-full  border-[1px] border-solid border-gray-200 grid grid-rows-3 p-1">
                                    <p class="font-semibold">=> Tên khách hàng: <span class="font-normal "><?= $data['username'] ?></span></p>
                                    <p class="font-semibold">=> Số điện thoại: <span class="font-normal"><?= $data['phone'] ?></span></p>
                                    <p class="font-semibold">=> Địa chỉ: <span class="font-normal"><?= $data['address'] ?></span></p>
                                </div>
                            </div>
                        <?php
                        } else {
                            header('location: login.php');
                        }
                        ?>
                        <div class="grid place-content-end">
                            <div class="w-[195px]">
                                <div class="flex">
                                    <p class="ms-9 ">Total: </p>
                                    <p class="ms-4"><?= $total_format . " VNĐ"; ?> </p>
                                </div>
                                <a href="pay_db.php?action=pay" class="block bg-blue-400 text-center mt-3 ms-10 me-3 text-gray-100 rounded py-1">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php

            $_SESSION['pay_id_user'] = $id_user;
            $_SESSION['pay_total'] = $total;
            $_SESSION['pay_qty'] = $qty;
        }

            ?>
        </body>

</html>