<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>product</title>
</head>

<body>

    <div class="ml-[229px] py-3 px-6 bg-gray-200 h-full w-[84vw]">
        <h1 class="text-semibold text-xl leading-8 border-b-2 border-gray-900 py-4">Product</h1>
        <div class="grid">
            <table class="border-collapse border border-slate-500 text-center mt-8">
                <thead>
                    <tr>
                        <th class="border border-slate-400 py-2 text-md">Hình</th>
                        <th class="border border-slate-400 py-2 text-md">Tên sách</th>
                        <th class="border border-slate-400 py-2 text-md">Mã sách</th>
                        <th class="border border-slate-400 py-2 text-md">Số lượng</th>
                        <th class="border border-slate-400 py-2 text-md">Giá</th>
                        <th class="border border-slate-400 py-2 text-md">Mô tả</th>
                        <th class="border border-slate-400 py-2 text-md">Cập nhật</th>
                        <th class="border border-slate-400 py-2 text-md">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once '../con_db.php';
                    $sql = "SELECT * FROM tb_book ORDER BY price DESC";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $dataBook = $stmt->fetchAll();

                    foreach ($dataBook as $data) {
                    ?>
                        <tr>
                            <td class="border border-slate-300 py-2 text-lg grid place-content-center">
                                <img src="../images/<?= $data['image']; ?>" alt="" class="w-[100px] h-[140px] ">
                            </td>
                            <td class="border border-slate-400 text-md font-semibold"><?= $data['name_book']; ?></td>
                            <td class="border border-slate-400 text-md font-semibold"><?= $data['id_book']; ?></td>
                            <td class="border border-slate-400 text-md font-semibold"><?= $data['qty']; ?></td>
                            <td class="border border-slate-400 text-md font-semibold"><?= number_format($data['price']) . ' VNĐ.'; ?></td>
                            <td class="border border-slate-400 text-md font-semibold"><?= $data['describes']; ?></td>
                            <td class="border border-slate-400 text-md font-semibold"><a class="underline duration-300 hover:text-green-700 text-green-500" href="index.php?coi=update&id=<?= $data['id_book']; ?>">Update</a></td>
                            <td class="border border-slate-400 text-md font-semibold"><a class="underline duration-300 hover:text-red-700 text-red-500" href="content/config.php?delete&id=<?= $data['id_book']; ?>">Delete</a></td>

                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
        <a class="fixed bottom-[50px] right-[50px] bg-green-500 py-2 px-5 rounded text-gray-100 text-lg font-semibold hover:text-gray-300 hover:bg-green-600 duration-500" href="index.php?coi=add">Thêm sản phẩm</a>
    </div>


</body>

</html>