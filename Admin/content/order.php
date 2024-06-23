<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
</head>

<body>
   


        <div class="ml-[229px] py-3 px-6 bg-gray-200 h-full w-[84vw]">
            <h1 class="text-semibold text-xl leading-8 border-b-2 border-gray-900 py-4">Order</h1>
            <div class="mt-8 grid">
                <table class="border-collapse border border-slate-500 text-center">
                    <tr>
                        <th class="py-2 border border-slate-500">Id_bill</th>
                        <th class="py-2 border border-slate-500">Tên sách</th>
                        <th class="py-2 border border-slate-500">Tổng cộng</th>
                        <th class="py-2 border border-slate-500">Ngày đặt</th>
                        <th class="py-2 border border-slate-500">Tên người đặt</th>
                        <th class="py-2 border border-slate-500">Số điện thoại</th>
                        <th class="py-2 border border-slate-500">Địa chỉ</th>
                    </tr>

                    <?php
                    include_once '../con_db.php';

                    $sql = "SELECT u.username, u.phone, u.address, b.id_bill, b.date_create, b.total
                            FROM tb_user u RIGHT JOIN tb_bill b ON u.id_user = b.id_user 
                            WHERE u.role='user' 
                            GROUP BY b.id_bill
                            ORDER BY b.date_create DESC";

                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $data = $stmt->fetchAll();


                    foreach ($data as $users) {
                        $total_format = number_format($users['total'], 0, ',', ',');    
                    ?>
                        <tr>
                            <td class="p-2 border border-slate-500"><?= $users['id_bill'] ?></td>
                            <td class="p-2 border border-slate-500">
                                <?php
                                // Get the book names for each bill
                                $id_bill = $users['id_bill'];
                                $sql1 = "SELECT bk.name_book, bdt.qty 
                                        FROM tb_bill b 
                                        RIGHT JOIN tb_bill_detail bdt ON b.id_bill = bdt.id_bill 
                                        RIGHT JOIN tb_book bk ON bdt.id_book = bk.id_book 
                                        WHERE b.id_bill = ?";
                                $stmt1 = $conn->prepare($sql1);
                                $stmt1->execute([$id_bill]);
                                $books = $stmt1->fetchAll();

                                // Print book names
                                $bookString = array();
                                foreach ($books as $book) {
                                    $bookString[] = $book['name_book'] . '('.$book['qty'].')';
                                }
                                echo implode(', ', $bookString);

                                ?>
                            </td>
                            <td class="p-2 border border-slate-500"><?= $total_format.' VNĐ.'; ?></td>
                            <td class="p-2 border border-slate-500"><?= $users['date_create']; ?></td>
                            <td class="p-2 border border-slate-500"><?= $users['username']; ?></td>
                            <td class="p-2 border border-slate-500"><?= $users['phone']; ?></td>
                            <td class="p-2 border border-slate-500"><?= $users['address']; ?></td>


                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
   
</body>

</html>