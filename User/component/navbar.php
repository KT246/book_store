<?php
session_start();
include_once "./con_db.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ban sach</title>

    <style>
        #setting {
            display: none;
        }

        #profile:hover #setting {
            display: block;
        }
    </style>
</head>

<body>

    <!-- -----------------------------Navbar------------------------------------- -->
    <nav class="bg-gray-500  ">
        <div class="grid grid-cols-3 mx-[10%]  py-3 ">
            <!-- ----------------Logo ---------------->
            <p><a href="./index.php?coi=home" class="font-bold block text-3xl text-blue-400">BOOK</a></p>
            <!-- -----------------------------Form search-------------------------------------  -->
            <div>
                <form action="index.php?coi=search" method="post" class="flex">
                    <input type="search" name="search" class=" block w-full  ps-5 text-sm text-gray-900  rounded-lg bg-gray-50 " placeholder="Tìm kiếm sách liền..." />
                    <input type="submit" name="submit_search" value="Tìm kiếm" class="text-white ms-3 bg-blue-400 hover:bg-blue-800  font-medium rounded-lg text-sm px-4 py-2 ">
                </form>
            </div>

            <!-- -----------------------------shopping cart-------------------------------------  -->

            <div class="grid place-content-end">
                <div class=" flex items-center">
                    <div class="relative py-1  mx-5">
                        <a href="./cart.php">

                            <?php if (isset($_SESSION['mess'])) {
                                $mess = 0;
                                foreach ($_SESSION['mess'] as $i) {
                                    $mess += $i['qty'];
                                }
                            ?>
                                <div class="t-0 absolute left-4">
                                    <p class="flex h-1 w-2 items-center justify-center rounded-full bg-red-500 p-2 text-xs text-white"><?= $mess; ?> </p>
                                </div>
                            <?php } else { ?>
                                <div class="t-0 absolute left-4">
                                    <p class="flex h-1 w-2 items-center justify-center rounded-full bg-red-500 p-2 text-xs text-white"><?= 0 ?> </p>
                                </div>
                            <?php } ?>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-100 ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </a>
                    </div>
                    <?php

                    if (isset($_SESSION['login'])) {
                        $username = $_SESSION['login'];


                    ?>
                        <div id="profile">
                            <a href="./login.php?action=logout" name="register_link" class="text-white ms-3 bg-blue-400 hover:bg-blue-800  font-medium rounded-[100%] text-sm px-2 py-2 "><?= $username; ?></a>
                            <div id="setting" class="fixed top-15  w-[80px] h-[90px]">
                                <a href="./profile.php" name="register_link" class="text-white fixed top-[8%]  bg-green-400 hover:bg-green-500  font-medium rounded-lg text-sm px-3 py-2">Cập nhật thông tin</a>
                                <a href="./login.php?action=logout" name="register_link" class="text-white fixed  top-[14%] bg-red-400 hover:bg-red-500  font-medium rounded-lg text-sm px-3 py-2">Logout</a>
                            </div>
                        </div>

                    <?php  } else { ?>

                        <a href="./login.php" name="login_link" class="text-white  bg-blue-400 hover:bg-blue-800  font-medium rounded-lg text-sm px-4 py-2 mx-5">Login</a>
                        <a href="./register.php" name="register_link" class="text-white  bg-blue-400 hover:bg-blue-800  font-medium rounded-lg text-sm px-4 py-2 ">Register</a>

                </div>
            </div>
        </div>
        </div>
    <?php
                    }
    ?>




    </div>
    </nav>
</body>

</html>