<?php
session_start();

include_once 'con_db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Updat Profile</title>
</head>

<body>



    <!----------------------------------- Register ----------------------------------------------->

    <div class="flex justify-center h-auto ">
        <div class="bg-gray-200 border-2 border-gray-200  rounded w-[400px]  mt-3">
            <div class="px-8 py-6">
                <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                    Thông tin hiên tại
                </h1>

                <?php
                if (isset($_SESSION['login'])) {
                    $username = $_SESSION['login'];
                    $sql = "SELECT * FROM tb_user WHERE username=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$username]);
                    $res = $stmt->fetch();
                }
                ?>

                <!--------------------------------- form register --------------------------->
                <form action="profile.php?action=update" method="post">
                    <div class="mt-5">
                        <label class="mb-2 text-sm font-medium text-gray-900 ">Tên tài khoản</label>
                        <input type="text" name="username" placeholder="Tên tài khoản" value="<?php echo $res['username'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>

                    <!-------------------------- phone ------------------------>
                    <div class="mt-3">
                        <label class=" mb-2 text-sm font-medium text-gray-900 ">Số điện thoại</label>
                        <input type="text" name="phone" placeholder="Số điện thoại" value="<?php echo $res['phone'] ?>" class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <!-- ---------------------address  ------------------------------>
                    <div class="pt-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Địa chỉ</label>
                        <textarea rows="4" name="address" class=" block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"><?php echo $res['address']; ?></textarea>
                    </div>
                    <!---------------------------- Register buttun -------------------------------->
                    <div class="mt-3">
                        <button type="submit" name="register" class="bg-gray-500 text-white p-2.5 rounded hover:bg-gray-600 w-full text-md">
                            Cập nhật thông tin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        if(isset($_GET['action'])){
            if($_GET['action'] == 'update'){
                $username = $_POST['username'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $sql = "UPDATE tb_user SET phone=?, address=? WHERE username=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$phone, $address, $username]);
                echo "<script>alert('Cập nhật thông tin thành công')</script>";
                header("refresh: 0.2; url=index.php");
            }
        }

    ?>
</body>

</html>