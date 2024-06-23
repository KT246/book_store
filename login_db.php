<?php

session_start();

include_once 'con_db.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    

    if (empty($username) || empty($password)) {
        $_SESSION['Err'] = "Vui lòng nhập đầy đủ !";
        header('location: login.php');
    } else {
        try {
            $stmt = $conn->prepare("SELECT * FROM tb_user WHERE username = ? AND password = ?");
            $stmt->execute([$username, $password]);
            $result = $stmt->fetch();

            if ($result['role'] == 'admin') {
                $_SESSION['loginAdmin'] = $result['username'];
                header("Location: Admin/index.php");
            } elseif ($result['role'] == 'user') {
                $_SESSION['login'] = $result['username'];

                //user online
                if (isset($_SESSION['login'])) {
                    $userName = $_SESSION['login'];
                    $sql = "UPDATE tb_user SET status = NOW() WHERE username = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$userName]);
                }

                header("Location: index.php");
            } else {
                $_SESSION['Err'] = "Sai tên tài khoản hoặc mật khẩu";
                header("Location: login.php");
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            header("Location: login.php");
        }
    }
}
