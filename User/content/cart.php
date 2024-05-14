<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script> 
    <title>Document</title>
</head>
<body>
    
<div class="w-full">
    <div class="mx-[10%] h-full">
            <h2 class="title font-manrope font-bold text-2xl leading-10 my-8 text-center text-black">Shopping Cart</h2>
            
            <div class="lg:grid grid-cols-2 py-3">
                <div class="text-[18px] font-bold leading-8 text-gray-900">Sản phẩm</div>
                <p class="text-[18px] font-bold leading-8 text-gray-900 flex items-center justify-between">
                    <span class="w-full ms-16 text-center">Phí giao hàng</span>
                    <span class="w-full mx-9 text-center">Số lượng</span>
                    <span class="w-full ms-12 text-center">Tổng cộng</span>
                </p>
            </div>
            <!-- ---------------------------product --------------------------------------->
            <div class="grid grid-cols-1 lg:grid-cols-2 border-t border-gray-200 py-2">
                <div
                    class="flex items-center flex-col gap-3 ">
                    <div class="img-box">
                        <img src="https://pagedone.io/asset/uploads/1701162880.png" alt="perfume bottle image" class="xl:w-[140px]">
                    </div>
                    <div class="pro-data w-full max-w-sm ">
                        <h5 class="font-semibold text-xl leading-8 text-black">Dusk Dark Hue
                        </h5>
                        <p
                            class="font-normal text-lg leading-8 text-gray-500 my-2">
                            Perfumes</p>
                        <h6 class="font-medium text-lg leading-8 text-indigo-600 ">$120.00</h6>
                    </div>
                </div>


                <div class="flex items-center ">
                        <h6 class="font-manrope font-bold text-xl leading-9 text-black w-full text-center">
                            $15.00 
                        </h6>
                <!-- -------------Button add and subtract -->


                <div class="flex items-center ms-10">
                    <button class="py-2 px-4 bg-gray-500 text-white rounded-l-lg duration-500 hover:bg-red-500">-</button>
                        <p name="add__sub" id="add__sub" class="py-2 px-4 ">1</p>  
                    <button class="py-2 px-4 bg-gray-500 text-white rounded-r-lg duration-500 hover:bg-green-500">+</button>
                </div>

                <!-- -------------Button add and subtract -->
                     <h6
                        class="text-indigo-600 font-manrope font-bold text-xl ms-2 leading-9 w-full text-right">
                        $120.00
                    </h6>
                </div>
            </div>
            <div class="bg-gray-50 rounded-xl p-2 w-full mb-6">
                <div class="flex items-center justify-between w-full mb-2">
                    <p class="text-[16px] leading-8 text-gray-400">Tổng phụ</p>
                    <h6 class="font-semibold text-[16px] leading-8 text-gray-900">$360.00</h6>
                </div>
                <div class="flex items-center justify-between w-full pb-2 border-b border-gray-200">
                    <p class=" text-[16px] leading-8 text-gray-400">Phí giao hàng</p>
                    <h6 class="font-semibold text-[16px] leading-8 text-gray-900">$45.00</h6>
                </div>
                <div class="flex items-center justify-between w-full py-2">
                    <p class="font-manrope font-medium text-xl leading-9 text-gray-900">Total</p>
                    <h6 class=" font-medium text-xl leading-9 text-indigo-500">$405.00</h6>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <button
                    class=" me-10 rounded py-2 px-4 text-center  bg-gray-500 font-semibold text-lg text-white duration-500 hover:bg-red-500">
                    <a href="../index.php?coi=home">Quay lại</a>
                </button>
                <button
                    type="submit"
                    name="pay"
                    class=" ms-10 rounded py-2 px-4 text-center  bg-gray-500 font-semibold text-lg text-white duration-500 hover:bg-green-400">
                    Thanh toán
                </button>
            </div>
        </div>
    
</div>                                

</body>
</html>