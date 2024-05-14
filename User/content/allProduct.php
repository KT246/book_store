

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

 
    <div class=" w-full my-3">
        <div class="bg-gray-500 mx-[10%] grid grid-cols-4 gap-3 p-2 h-auto " >

            <?php 
                include_once 'con_db.php';

                $sql = "SELECT * FROM tb_book";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $userData = $stmt->fetchAll();

                foreach($userData as $data){
                
                    echo '<div class="p-2 bg-white rounded">
                    <div>
                        <img src="'. $data['image'] .'" alt="" 
                        class="w-[350px] h-[350px]">
                    </div>
                    <div>
                        <h3 class="leading-8 text-2xl my-3">'.$data['name_book'].'</h3>
                        <p  class="text-red-500 text-xl font-semibold">'. $data['price'] * 0.7.' đ' .'</p>
                        <p  class="text-gray-400 text-lg font-semibold my-2"><del>'. $data['price'].' đ'.'</del></p>
                        <p  class="bg-green-700 py-2 px-3 w-full rounded my-1 text-center text-white hover:bg-green-900 duration-500">
                            <a href="index.php?coi=detail&id='.$data['id_book'].'" >Xem chi tiet</a>
                        </p>
                    </div>
                </div>';
            
                }
            ?>
        
        </div>
    </div>

</body>
</html>