<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script> 
    <title>Document</title>
</head>
<body>
    
    <nav class="h-[100vh] w-[230px] bg-gray-400 block items-center fixed">
        <h1 class="text-4xl font-semibold text-center leading-8 py-10">Logo</h1>
        <ul class="text-lg leading-8">
            <li class="flex items-center ps-10 hover:bg-gray-600 py-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                </svg>
                <a href="index.php?coi=dashbord">Dashbord</a>
            </li>
            <li class="ps-10 hover:bg-gray-600 py-1 mt-2"><a href="index.php?coi=product">Product</a></li>
            <li class="ps-10 hover:bg-gray-600 py-1 mt-2"><a href="index.php?coi=user">User</a></li>
            <li class="ps-10 hover:bg-gray-600 py-1 mt-2"><a href="index.php?coi=history">History</a></li>
            <li class="ps-10 hover:bg-gray-600 py-1 mt-2"><a href="index.php?coi=order">Order</a></li>
            <li class=" mx-10 text-center py-1 mt-[40vh] hover:bg-red-500 bg-red-500 rounded"><a href=""  >Logout</a></li>
        </ul>
    </nav>
</body>
</html>