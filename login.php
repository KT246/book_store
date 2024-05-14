    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script> 
    <title>Document</title>
</head>
<body>


<!-- ------------------------------------Login -------------------------------------- -->
    
    <div class="flex justify-center items-center h-[100vh] ">
            <div class="bg-gray-100 border-2 border-gray-200 rounded w-[400px] h-auto ">
                <div class="px-8 py-6">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        Đăng nhập
                    </h1>

                            <?php
                                session_start();
                                if(isset($_SESSION['Err'])){
                                    echo '<p class="text-red-600 bg-red-200 rounded p-1 mt-3" >'.$_SESSION['Err'].'</p>';
                                    unset($_SESSION['Err']);
                                }

                            ?>  
            <!---------------------------------- Form login ------------------------------------>

                    <form action="login_db.php" method="post">
                        <!----------------------------Username ---------------------------->
                        <div class="mt-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Tên tài khoản</label>
                            <input type="text" 
                                name="username" 
                                placeholder="Tên tài khoản"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>    

                        <!------------------------------- password ---------------------------->
                        <div class="mt-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Mật khẩu</label>
                            <input type="password" 
                                name="password" 
                                placeholder="••••••••"
                                id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                        </div> 
                        <!----------------------------Show password -------------------------------->
                        <p><input type="checkbox" onclick="show()" class="mt-4"> Xem mật khẩu</p>

                        <!----------------------------Login button-------------------------------->

                        <div class="mt-4">
                            <button type="submit" 
                                name="login"
                                class="bg-gray-500 text-white p-2.5 rounded hover:bg-gray-600 w-full text-md">
                                Đăng nhập
                            </button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400 mt-5">
                                Bạn chưa có tài khoản ? 
                                <a href="register.php" 
                                    class=" ms-2 font-medium text-primary-600 hover:underline ">
                                    Đăng ký
                                </a>
                            </p>                        
                        </div>    
                    </form>
                </div>
            </div>
    </div>


    <!-- ---------------------funcetion show password ----------------------------------->

    <script>
        const showpass = document.getElementById('password');
        function show(){
            if(showpass.type === 'password'){
                showpass.type = 'text';
            }else{
                showpass.type = 'password';
            }
            
        }
    </script>
    
</body>
</html>