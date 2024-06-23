<?php
session_start();
include_once '../../con_db.php';

///// Add san pham
if (isset($_POST['add'])) {
    $id_book = $_POST['id_book'];
    $name_book = $_POST['name_book'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $describes = $_POST['describes'];
    $type = $_POST['type'];

    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['img']['name'];
        $temp_name = $_FILES['img']['tmp_name'];
        $folder = '../../images/' . $file_name;

        //Di chuyển tệp đã tải lên vào thư mục chỉ định
        if (move_uploaded_file($temp_name, $folder)) {
            $image_path = $file_name;
        } else {
            echo "Failed to upload image.";
            exit();
        }
    }
    if (empty($id_book) || empty($name_book) || empty($qty) || empty($price) || empty($image_path) || empty($describes) || empty($type)) {
        $_SESSION['Err'] = "Vui laong nhập thông tin đầy đủ";
        header('Location: ../index.php?coi=add');
     } else {
        $sql = "INSERT INTO tb_book(id_book, name_book, qty, price, image, describes, type) VALUES(?,?,?,?,?,?,?)";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id_book, $name_book, $qty, $price, $image_path, $describes, $type]);
            echo "<script> alert('Thêm sản phẩm thành công.')</script>";
            header('Refresh: 0.2; url=../index.php?coi=product');
        } catch (PDOException $e) {
            $_SESSION['Err'] = "Thêm sản phẩm không thành công.";
            header('Location: ../index.php?coi=add');
            echo $e->getMessage();
        }
     }
}

/// Cap nhat san pham

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $id_book = $_POST['id_book'];
    $name_book = $_POST['name_book'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $describes = $_POST['describes'];
    $type = $_POST['type'];

    // Kiểm tra xem có tệp hình ảnh mới nào được tải lên không
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['img']['name'];
        $temp_name = $_FILES['img']['tmp_name'];
        $folder = '../../images/' . $file_name;
        
        //Di chuyển tệp đã tải lên vào thư mục chỉ định
        if (move_uploaded_file($temp_name, $folder)) {
            $image_path = $file_name;
        } else {
            echo "Failed to upload image.";
            exit();
        }
    }
    else {
        // Sử dụng đường dẫn hình ảnh hiện tại từ cơ sở dữ liệu
        $sql = "SELECT image FROM tb_book WHERE id_book = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        $image_path = $result['image'];
    }

    // echo $image_path;

    $sql = "UPDATE tb_book SET id_book= ? , name_book= ?, qty= ?, price= ?, image= ?, describes= ?, type =? WHERE id_book = ?";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_book, $name_book, $qty, $price, $image_path, $describes, $type, $id]);
        echo "<script> alert('Update sản phẩm thành công.')</script>";
        header('Refresh: 0.2; url=../index.php?coi=product');
    } catch (PDOException $e) {
        echo "<script> alert('Update khong sản phẩm thành công.')</script>";
        header('Refresh: 0.2; url=../index.php?coi=product');
        echo "Loi" . $e->getMessage();
    }
}


/// Delet san pham
if (isset($_GET['delete'])) {
    $id = $_GET['id'];

    $sql_bill_detail = "DELETE FROM tb_bill_detail WHERE id_book = ?";
    $sql_book = "DELETE FROM tb_book WHERE id_book = ?";
    try {

        // Xoa trong bang lien quan
        $stmt_bill_detail = $conn->prepare($sql_bill_detail);
        $stmt_bill_detail->execute([$id]);


        $stmt_book = $conn->prepare($sql_book);
        $stmt_book->execute([$id]);
        echo "<script> alert('Delete sản phẩm thành công.')</script>";
        header('Refresh:0.2; url=../index.php?coi=product');
    } catch (PDOException $e) {
        echo "Loi" . $e->getMessage();
    }
}
