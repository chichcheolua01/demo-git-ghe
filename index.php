<?php
// $connection = new PDO("mysql:host=localhost;dbname=Assignment;charset=utf8","root","");//khởi tạo kết nối thông qua thư viện PDO
// $query = "select * from products";//câu lệnh truy vấn đến cơ sở dữ liệu
// $statement = $connection->prepare($query);//chuẩn bị câu lệnh vừa tạo ở trên
// $statement->execute();//thực thi câu lệnh sql
// $products = $statement->fetchAll();//lấy dữ liệu và đổ vào biến
// // echo"<pre>";
// // var_dump($users);
include "./model/connect.php";
$query = "select * from products";
$products = getAll($query);
session_start();
$username = $_SESSION['userName'];
$query2 = "SELECT * FROM users WHERE userName like '$username'";
$login_user = getOne($query2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[]">
    <div class="container mx-auto">
        <header class="py-[60px] flex justify-between items-center">
            <div class="">
                <img class="h-[60px] w-auto" src="image/nike-logo.png" alt="">
            </div>
            <div class="flex justify-between items-center space-x-[100px]">
                <ul class="md:flex justify-between space-x-[52px] hidden items-center">
                    <a href="index.php">
                        <li class="text-sm hover:-translate-y-1 duration-500">Home</li>
                    </a>
                    <a href="">
                        <li class="text-sm hover:-translate-y-1 duration-500">Store</li>
                    </a>
                    <a href="">
                        <li class="text-sm hover:-translate-y-1 duration-500">About</li>
                    </a>
                    <a href="">
                        <li class="text-sm hover:-translate-y-1 duration-500">Blog</li>
                    </a>
                    <a href="">
                        <li class="text-sm hover:-translate-y-1 duration-500">Point of Sale</li>
                    </a>
                </ul>
                <div class="flex justify-between items-center space-x-8">
                    <a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg></a>
                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg></a>
                    <a class="" href="./admin.php"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                        </svg></a>
                </div>
                <div>
                    <img src="./image/<?php echo $login_user["userAvatar"] ?>" alt="">
                </div>
            </div>
        </header>
        <div>
            <video class="" autoplay loop muted src="./image/banner-video.mp4"></video>
        </div>
        <div class="mt-[166px] flex justify-center text-center">
            <div class="w-full">
                <h1 class="text-3xl font-bold mb-10">New Arrivals</h1>
                <div class="flex justify-between">
                    <?php foreach ($products as $value) : ?>
                        <div class="flex flex-col items-start">
                            <img class="w-[400px] h-auto" src="./image/<?php echo $value["productImage"]; ?>" alt="">
                            <p class="text-xl"><?php echo $value["productName"] ?></p>
                            <p><?php echo $value["productPrice"] ?> VNĐ</p>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

    </div>
    <footer class="bg-slate-900 text-white w-full py-20 mt-32">
        <div class="grid grid-cols-2 container mx-auto">
            <div class="flex justify-between">
                <div class="grid grid-cols-3">
                    <div class="px-10">
                        <p class="text-md font-bold">FIND A STORE</p>
                        <p class="text-md font-bold">BECOME A MEMBER</p>
                        <p class="text-md font-bold">SIGN UP FOR EMAIL</p>
                        <p class="text-md font-bold">SEND US FEED BACK</p>
                    </div>
                    <div class="px-10">
                        <p class="text-md font-bold">GET HELP</p>
                        <p class="text-xs text-gray-500 hover:text-white">Order Status</p>
                        <p class="text-xs text-gray-500 hover:text-white">Delivery</p>
                        <p class="text-xs text-gray-500 hover:text-white">Returns</p>
                        <p class="text-xs text-gray-500 hover:text-white">Payment Option</p>
                        <p class="text-xs text-gray-500 hover:text-white">Contact Us</p>
                    </div>
                    <div class="px-10">
                        <p class="text-md font-bold">ABOUT NIKE</p>
                        <p class="text-xs text-gray-500 hover:text-white">News</p>
                        <p class="text-xs text-gray-500 hover:text-white">Careers</p>
                        <p class="text-xs text-gray-500 hover:text-white">Investors</p>
                        <p class="text-xs text-gray-500 hover:text-white">Sustainability</p>
                    </div>
                </div>
            </div>
            <div>

            </div>
        </div>

    </footer>

</body>

</html>