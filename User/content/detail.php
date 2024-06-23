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

    include_once 'con_db.php';

    $id_book = $_GET['id'];
    $sql = "SELECT * FROM tb_book WHERE id_book = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_book]);
    $data = $stmt->fetch();
    ?>

    <div class="w-full  ">
        <div class="mx-[10%] h-full  bg-gray-400 rounded">
            <div class="grid grid-cols-3 ">
                <div class="grid place-content-center">
                    <img src="images/<?php echo $data['image']; ?>" alt="" class="w-[270px] h-[380px]">
                    <div class="grid grid-cols-2 gap-2">
                        <a href="index.php?coi=set&add=<?php echo $data['id_book']; ?>" class="px-4 py-2.5 rounded bg-green-600 text-center mt-4 text-white">Thêm vào giỏ</a>
                        <a href="index.php?coi=set&buy=<?php echo $data['id_book']; ?>" class="px-4 py-2.5 rounded bg-green-600 text-center mt-4 text-white">Đặt hàng</a>
                    </div>
                </div>
                <div class="w-full col-span-2 ">
                    <div class="grid grid-rows-3 h-full mt-10">
                        <div>
                            <div class="flex">
                                <h3 class="text-green-400 font-bold text-xl ">|</h3>
                                <h3 class="text-lg font-semibold text-gray-50 py-1">Thông tin sản phẩm</h3>
                            </div>
                            <div class="grid grid-cols-3 ms-3 mt-3">
                                <p class="text-gray-200 text-md font-semibold">Mã hàng</p>
                                <p class="col-span-2 text-gray-100 font-semibold text-lg"><?php echo $data['id_book']; ?></p>
                                <p class="text-gray-200 text-md font-semibold">Tên hàng</p>
                                <p class="col-span-2 text-gray-100 font-semibold text-lg"><?php echo $data['name_book']; ?></p>
                                <p class="text-gray-200 text-md font-semibold">Số lượng</p>
                                <p class="col-span-2 text-gray-100 font-semibold text-lg"><?php echo $data['qty']; ?></p>
                                <p class="text-gray-200 text-md font-semibold">Loại</p>
                                <p class="col-span-2 text-gray-100 font-semibold text-lg"><?php echo $data['type']; ?></p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="flex pt-2">
                                    <h3 class="text-green-400 font-bold text-xl ">|</h3>
                                    <h3 class="text-lg font-semibold text-gray-50 pt-1">Mô tả</h3>
                                </div>
                                <p class="indent-8 pt-2 text-gray-900"><?php echo $data['describes']; ?></p>
                                <div class="flex mt-10">
                                    <p class="text-red-600 text-3xl font-semibold"><?php echo number_format($data['price'] * 0.7, 0, ',', ',') .' VNĐ'; ?></p>
                                    <p class="ms-5 text-gray-300 text-xl "><del><?php echo number_format($data['price'], 0, ',', ',') . ' VNĐ'; ?></del></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>