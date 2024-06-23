<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>

<body>

    <div class="ml-[229px] py-3 px-6 bg-gray-200 h-full w-[84vw]">
        <h1 class="text-semibold text-xl leading-8 border-b-2 border-gray-900 py-4">User</h1>
        <div class="mt-8 grid">
            <table class="border-collapse border border-slate-500 text-center">
                <tr>
                    <th class="py-2 border border-slate-500">Id</th>
                    <th class="py-2 border border-slate-500"></th>
                    <th class="py-2 border border-slate-500">số điện thoại</th>
                    <th class="py-2 border border-slate-500">Địa chỉ</th>
                    <th class="py-2 border border-slate-500">Order</th>
                    <th class="py-2 border border-slate-500">Tổng cộng</th>
                </tr>

                <?php
                include_once '../con_db.php';
                $role = "user";
                $sql = "SELECT u.id_user, u.username, u.phone, u.address, COUNT(b.id_bill) AS orders, SUM(b.total) AS total 
                        FROM tb_user u LEFT JOIN tb_bill b ON u.id_user = b.id_user 
                        WHERE role=? 
                        GROUP BY u.id_user";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$role]);
                $data = $stmt->fetchAll();

                foreach ($data as $users) {

                ?>
                    <tr>
                        <td class="p-2 border border-slate-500"><?= $users['id_user'] ?></td>
                        <td class="p-2 border border-slate-500"><?= $users['username']; ?></td>
                        <td class="p-2 border border-slate-500"><?= $users['phone']; ?></td>
                        <td class="p-2 border border-slate-500"><?= $users['address']; ?></td>
                        <td class="p-2 border border-slate-500"><?= $users['orders']; ?></td>
                        <td class="p-2 border border-slate-500">
                            <?php
                            if (isset($users['total']) && $users['total'] !== null) {
                                $total_format = number_format($users['total'], 0, ',', ',') . ' VNĐ.';
                            } else {
                                $total_format = 'N/A';
                            }
                            echo $total_format;
                            ?>
                        </td>


                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

</body>

</html>