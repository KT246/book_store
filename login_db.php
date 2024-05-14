<?php

    session_start();

    include_once 'con_db.php';

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(empty($username) || empty($password)){
            $_SESSION['Err'] = "Vui lòng nhập đầy đủ !";
            header('location: login.php');
        }else{
            try{
                $stmt = $conn->prepare("SELECT * FROM tb_user WHERE username = ? AND password = ?");
                $stmt->execute([$username, $password]);
                $result = $stmt->fetch();
    
                if($result['role'] == 'admin'){
                    $_SESSION['user'] = $result['username'];
                    header("Location: Admin/indexA.php");
                }elseif($result['role'] == 'user'){
                    $_SESSION['user'] = $result['username'];
                    header("Location: index.php");
                }else{
                    $_SESSION['user'] = $result['username'];
                    header("Location: index.php");
                }
            }catch(PDOException $e){
                echo "Error: ". $e->getMessage();
                header("Location: login.php");
            }
        }
    }

?>
