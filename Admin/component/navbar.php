<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashbord</title>
</head>

<body class="bg-gray-200">



    <nav class="h-[100vh] w-[230px] bg-gray-50 block items-center fixed">
        <h1 class="font-bold block text-3xl my-5 ms-10 text-blue-400">BOOK</h1>
        <ul class="text-lg leading-8">
            <?php
            $link = array(
                array("title" => "Dashbord", "path" => "index.php?coi=dashbord"),
                array("title" => "Product", "path" => "index.php?coi=product"),
                array("title" => "User", "path" => "index.php?coi=user"),
                array("title" => "history", "path" => "index.php?coi=history"),
                array("title" => "Order", "path" => "index.php?coi=order")
            );

            foreach ($link as $items) {
                echo '<li class="ps-10 hover:bg-gray-300 py-1 mt-1"><a href="' . $items['path'] . '">' . $items['title'] . '</a></li>';
            }
            ?>
            <li class=" fixed bottom-[50px] left-[50px] text-center text-gray-200 px-3 hover:bg-red-500 bg-red-500 rounded"><a href="">Logout</a></li>
        </ul>
    </nav>
</body>

</html>