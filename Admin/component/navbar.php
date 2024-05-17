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
            <?php
                $link = array(
                    array("title" => "Dashbord", "path" => "index.php?coi=dashbord"), 
                    array("title" => "Product", "path" => "index.php?coi=product"),
                    array("title" => "User", "path" => "index.php?coi=user"),
                    array("title" => "history", "path" => "index.php?coi=history"),
                    array("title" => "Order", "path" => "index.php?coi=order")
                );

                foreach($link as $items){
                    echo '<li class="ps-10 hover:bg-gray-600 py-1 mt-1"><a href="'.$items['path'].'">'. $items['title'] .'</a></li>';
                }
            ?>
            <li class=" fixed bottom-[50px] left-[50px] text-center px-3 hover:bg-red-500 bg-red-500 rounded"><a href=""  >Logout</a></li>
        </ul>
    </nav>
</body>
</html>