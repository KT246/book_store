<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="ml-[229px] py-3 px-6 bg-gray-200 h-full w-[84vw] ">
        <table align="center" class="bg-gray-300 mt-20 ">
            <tr>
                <td colspan="2" align="center">New Product</td>
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
            <form action="content/config.php" method="post" enctype="multipart/form-data">
                <tr>
                    <td class="text-lg px-1 mt-3">Tên sách</td>
                    <td><input type="text" name="name_book" class="rounded p-1 mt-1"></td>
                </tr>
                <tr>
                    <td class="text-lg px-1 mt-3">mã sách</td>
                    <td><input type="text" name="id_book" class="rounded p-1 mt-1" placeholder="number 1,2,3,....."></td>
                </tr>
                <tr>
                    <td class="text-lg px-1 mt-3">Loại</td>
                    <td><input type="text" name="type" class="rounded p-1 mt-1"></td>
                </tr>
                <tr>
                    <td class="text-lg px-1 mt-3">Số lượng</td>
                    <td><input type="text" name="qty" class="rounded p-1 mt-1"></td>
                </tr>
                <tr>
                    <td class="text-lg px-1 mt-3">Giá</td>
                    <td><input type="text" name="price" class="rounded p-1 mt-1"></td>
                </tr>
                <tr>
                    <td class="text-lg px-1 mt-3">hình ảnh</td>
                    <td><input type="file" name="img" class="rounded p-1 mt-1" /></td>
                </tr>
                <tr>
                    <td class="text-lg px-1 mt-3">Mô tả</td>
                    <td><textarea name="describes" class="p-1 mt-1 w-full" placeholder="Mô tả ............................"></textarea></td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Them sản phẩm" name="add" 
                        class=" bg-green-500 text-lg text-white rounded-sm w-full mt-1 py-1"></td>
                </tr>
            </form>
        </table>

        </td>
</body>

</html>