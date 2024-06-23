<?php
    session_start();
    include_once 'con_db.php';

    if(isset($_GET['action'])){
        if($_GET['action'] == 'pay'){
            $id_user = $_SESSION['pay_id_user'];
            $total = $_SESSION['pay_total'];
            $qty = $_SESSION['pay_qty'];
            $date_create = date('Y-m-d');

            $id_bill  = rand(000000, 999999);
            // insert bill
            $sql_bill = "INSERT INTO tb_bill(id_bill, id_user, date_create, qty, total) VALUES(?,?,?,?,?)";
            try{
                $stmt = $conn->prepare($sql_bill);
                $stmt->execute([$id_bill,$id_user, $date_create, $qty, $total]);
                // insert bill detail   

                foreach($_SESSION['cart'] as $items){
                    $id_book = $items['id_book'];
                    $qty = $items['qty'];
                   // echo $id_bill;

                    $sql_bill_detail = "INSERT INTO tb_bill_detail(id_book, id_bill, qty) VALUES(?,?,?)";
                    $stmt = $conn->prepare($sql_bill_detail);
                    $stmt->execute([$id_book, $id_bill, $qty]);
                        
                    // updat so luong book
                    $sql_book = "SELECT * FROM tb_book WHERE id_book=?";
                    $stmt = $conn->prepare($sql_book);
                    $stmt->execute([$id_book]);
                    $row = $stmt->fetch();
                    echo $row['id_book'];
                    echo $row['qty'];
                    // Trừ số lượng sản phẩm trong kho
                    $new_qty = $row['qty'] - $qty;

                    echo $new_qty;
                    $sql = "UPDATE tb_book SET qty=? WHERE id_book=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$new_qty, $id_book]);
                
                }

                unset($_SESSION['cart']); 
                unset($_SESSION['mess']); 
                echo '<script>alert("Thanh toán thành công")</script>';
                header('Refresh:0.2 ; url=index.php');

            }catch(PDOException $e){
                echo '<aleartThanh toán không thành công'.$e->getMessage();
                header('Refresh: 0.2; url=index.php');
            }
        }
    }

?>
