<?php

include_once '../con_db.php';

$id_book = $_GET['id'];

$sql = "SELECT * FROM tb_book WHERE id_book = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_book]);

$data = $stmt->fetch();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <div class="grid ml-[229px] ">
        <table align="center" class="bg-gray-300 mt-20">
            <tr>
                <td colspan="2" align="center">Update</td>
            </tr>
            <?php
            if (isset($_SESSION['Err'])) {
            ?>
                <tr>
                    <td colspan="2" align="center" class="text-red-500 bg-red-100">
                        <?= $_SESSION['Err'];
                        unset($_SESSION['Err']); ?>
                    </td>
                </tr>

            <?php } ?>
            <form action="content/config.php?id=<?php echo $data['id_book'] ?>" method="post" enctype="multipart/form-data">
                <tr>
                    <td class="text-lg px-1 mt-3">Tên sách</td>
                    <td><input type="text" name="name_book" class="rounded p-1 mt-1" value="<?php echo $data['name_book'] ?>"></td>
                </tr>
                <tr>
                    <td class="text-lg px-1 mt-3">mã sách</td>
                    <td><input type="text" name="id_book" readonly class="rounded p-1 mt-1" value="<?php echo $data['id_book'] ?> "></td>
                </tr>
                <tr>
                    <td class="text-lg px-1 mt-3">Loại</td>
                    <td><input type="text" name="type" class="rounded p-1 mt-1" value="<?php echo $data['type'] ?>"></td>
                </tr>
                <tr>
                    <td class="text-lg px-1 mt-3">Số lượng</td>
                    <td><input type="text" name="qty" class="rounded p-1 mt-1" value="<?php echo $data['qty'] ?>"></td>
                </tr>
                <tr>
                    <td class="text-lg px-1 mt-3">Giá</td>
                    <td><input type="text" name="price" class="rounded p-1 mt-1" value="<?php echo $data['price'] ?>"></td>
                </tr>
                <tr>
                    <td class="text-lg px-1 mt-3">hình ảnh</td>
                    <td><input type="file" name="img" class="rounded p-1 mt-1" /></td>
                </tr>
                <tr>
                    <td class="text-lg px-1 mt-3">Mô tả</td>
                    <td><textarea name="describes" class="p-1 mt-1 w-full"><?php echo $data['describes'] ?></textarea></td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" value="Cập nhật" name="update" 
                        class="bg-green-500 px-3 text-lg text-white rounded-sm w-full mt-1 py-1"></td>
                </tr>
            </form>
        </table>
    </div>


</body>

</html>