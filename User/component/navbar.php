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
    <title>Document</title>
</head>
<body>

    <!-- -----------------------------Navbar------------------------------------- -->
    <nav class="bg-gray-500 py-[.5rem] "> 
        <!-- -----------------------------container-------------------------------------  -->
        <div class="flex  justify-between items-center mx-[10%] ">
        <!-- ----------------Logo ---------------->
            <div class="">
                <a href="./index.php?coi=home" class="font-bold text-3xl text-blue-400">BOOK</a>
            </div>
            <!-- -----------------------------Form search-------------------------------------  -->
            <div>
                <form action="#" method="POST" class="flex">
                    <input type="search" 
                        name="search" 
                        class=" block w-full p-2 ps-5 text-sm text-gray-900  rounded-lg bg-gray-50 " 
                        placeholder="Tìm kiếm sách liền..." 
                        required />
                    <button type="submit" 
                        name="submit_search" 
                        class="text-white ms-3 bg-blue-400 hover:bg-blue-800  font-medium rounded-lg text-sm px-4 py-2 "
                        >Search
                    </button>
                </form>
            </div>

            <!-- -----------------------------shopping cart-------------------------------------  -->

    <?php 
        
        if(isset($_SESSION['user'])){
            $username = $_SESSION['user'];
            

            
           echo '<div class=" flex ">
                <div class="relative py-1  ">
                    <a href="./cart.php" target="_blank" >
                        <div class="t-0 absolute left-4">
                            <p class="flex h-1 w-2 items-center justify-center rounded-full bg-red-500 p-2 text-xs text-white">3</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                            class="file: mt-0 h-7 w-7 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                    </a>
                </div>
                <div class="text-white mx-2">'.$username.'</div>
                <button class="text-white ms-3 bg-blue-400 hover:bg-blue-800  font-medium rounded-lg text-sm px-4 py-2 ">
                    <a href="./login.php" name="register_link" >logout</a>
                </button>
            </div>';
        }else{
            echo '<div class=" flex ">
                    <div class="relative py-1  ">
                        <a href="./cart.php" target="_blank" >
                            <div class="t-0 absolute left-4">
                                <p class="flex h-1 w-2 items-center justify-center rounded-full bg-red-500 p-2 text-xs text-white">3</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                class="file: mt-0 h-7 w-7 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                        </a>
                    </div>



                    <div class="ms-7">
                        <button class="text-white ms-3 bg-blue-400 hover:bg-blue-800  font-medium rounded-lg text-sm px-4 py-2 ">
                            <a  href="./login.php" name="login_link" >Login</a>
                        </button>
                        <button class="text-white ms-3 bg-blue-400 hover:bg-blue-800  font-medium rounded-lg text-sm px-4 py-2 ">
                            <a href="./register.php" name="register_link" >Register</a>
                        </button>
                    </div>
                </div>';
        }
    ?>



</div>
    </nav>
</body>
</html>
