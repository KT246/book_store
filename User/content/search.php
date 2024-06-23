<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class=" w-auto my-3">
        <div class="bg-gray-500 mx-[10%] grid grid-cols-4 gap-3 p-2 h-auto " >

            <?php 

                if(isset($_POST['submit_search'])){
                    $search = $_POST['search'];
                }

                $sql = "SELECT * FROM tb_book WHERE  name_book LIKE ? OR price LIKE ? OR describes LIKE ?";
                $stmt = $conn->prepare($sql);
                $excuteSearch = "%". $search ."%";
                $stmt->execute([$excuteSearch, $excuteSearch, $excuteSearch]);
                $userData = $stmt->fetchAll();

                if(!empty($userData)){

                
                    foreach($userData as $data){
                
                        echo '<div class="p-2 bg-white rounded">
                                <div>
                                    <img src="'.'images/'. $data['image'] .'" alt="" class="w-[350px] h-[350px]">
                                </div>
                                <div>
                                    <h3 class="leading-8 text-2xl my-3">'.$data['name_book']. '</h3>
                                    <p  class="text-red-500 text-xl font-semibold">' . number_format($data['price'] * 0.7, 0, ',', ',') . ' VNĐ' . '</p>
                                    <p  class="text-gray-400 text-lg font-semibold my-2"><del>' . number_format($data['price'], 0, ',', ',') . ' VNĐ' . '</del></p>
                                    <p  class="bg-green-700 py-2 px-3 w-full rounded my-1 text-center text-white hover:bg-green-900 duration-500">
                                        <a href="index.php?coi=detail&id='.$data['id_book'].'" >Xem chi tiet</a>
                                    </p>
                                </div>
                            </div>';
            
                    }    
                }else{
                    echo '<h1 class="text-center text-3xl font-bold text-gray-100 col-span-2">Không có sản phẩm nào</h1>';
                }
            ?>
        </div>
    </div>

</body>
</html>