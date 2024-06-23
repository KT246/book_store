<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
</head>

<body>



    <!----------------------------------- Register ----------------------------------------------->

    <div class="flex justify-center h-auto ">
        <div class="bg-gray-200 border-2 border-gray-200  rounded w-[400px]  mt-3">
            <div class="px-8 py-6">
                <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                    Đăng ký
                </h1>

                <?php

                if (isset($_SESSION['Err'])) {
                    echo '<p class="text-red-600 bg-red-200 rounded p-1 mt-3" >' . $_SESSION['Err'] . '</p>';
                    unset($_SESSION['Err']);
                }

                ?>

                <!--------------------------------- form register --------------------------->
                <form action="register_db.php" method="post">
                    <div class="mt-5">
                        <label class="mb-2 text-sm font-medium text-gray-900 ">Tên tài khoản</label>
                        <input type="text" name="username" placeholder="Tên tài khoản" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>

                    <!-------------------------- phone ------------------------>
                    <div class="mt-3">
                        <label class=" mb-2 text-sm font-medium text-gray-900 ">Số điện thoại</label>
                        <input type="text" name="phone" placeholder="Số điện thoại" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>

                    <!------------------------------- password ---------------------------->

                    <div class="mt-3">
                        <label class=" mb-2 text-sm font-medium text-gray-900 ">Mật khẩu</label>
                        <input type="password" name="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5 ">
                    </div>

                    <!------------------------------- confrim password ---------------------------->

                    <div class="mt-3">
                        <label class=" mb-2 text-sm font-medium text-gray-900 ">Nhập lại mật khẩu</label>
                        <input type="password" name="con_password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5 ">
                    </div>
                    <!-- ---------------------address  ------------------------------>
                    <div class="pt-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Địa chỉ</label>
                        <textarea rows="4" name="address" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Địa chỉ của bạn..."></textarea>
                    </div>
                    <!---------------------------- Register buttun -------------------------------->
                    <div class="mt-3">
                        <button type="submit" name="register" class="bg-gray-500 text-white p-2.5 rounded hover:bg-gray-600 w-full text-md">
                            Đăng ký
                        </button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400 my-5">
                            Bạn đã có tài khoản ?
                            <a href="login.php" class=" ms-2 font-medium text-primary-600 hover:underline ">
                                Đăng nhập
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>