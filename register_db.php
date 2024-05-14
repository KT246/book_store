<?php
    session_start();

    include_once 'con_db.php';

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $con_password = $_POST['con_password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $role = "user";

        if(empty($username) || empty($password) || empty($phone) || empty($address)){
            $_SESSION['Err'] = "Vui lòng nhập đầy đủ tất cả !";
            header('location: register.php');
        }elseif(strlen($password) < 7){
            $_SESSION['Err'] = "Mật khẩu ít nhất 8 !";
            header('location: register.php');
        }elseif($con_password != $password){
            $_SESSION['Err'] = "Mật khẩu không giống nhau !";
            header('location: register.php');
        }else{
            try{
                $stmt = $conn->prepare("INSERT INTO tb_user(username, password, address, role, phone) VALUES(:username, :password, :address, :role, :phone)");
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $password);
                $stmt->bindParam(":address", $address);
                $stmt->bindParam(":role", $role);
                $stmt->bindParam(":phone", $phone);
                
                $stmt->execute();
                echo "<script>alert('Đăng ký thành công')</script>";
                header('Refresh: 2; url=login.php');
            }catch(PDOException $e){
                echo "Đăng ký không thành công". $e->getMessage();
            }
        }
    }

?>