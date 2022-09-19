<?php
    include "./model/connect.php";
    $query = "select * from users";
    $users = getAll($query);
?>
<?php
    session_start(); //bắt đầu session
        // /*
        //     session là một phiên làm việc giữa client và server 
        //     Một session bắt đầu khi client gửi request đến server, 
        //     nó tồn tại xuyên suốt từ trang này đến trang khác trong 
        //     ứng dụng web và chỉ kết thúc khi hết thời gian timeout 
        //     hoặc khi bạn đóng ứng dụng. 
        //     Giá trị của session sẽ được lưu trong biến $_SESSION
        // */
        // include "../model/connect.php"; //import file connect.php
        // $query = "select * from users"; //câu lệnh lấy toàn bộ dữ liệu từ bảng users trong DB
        // $users = getAll($query); //thực hiện lấy dữ liệu và gán cho biến $users
        // foreach($users as $value){ //lặp để kiểm tra dữ liệu nhập vào form và dữ liệu trong DB
        //     if(isset($_POST["btn-login"])){ //kiểm tra xem button login đã được ấn hay chưa
        //         if(!$_POST["username"] == "" && !$_POST["password"] == ""){//kiểm tra xem username và password có trống hay không
        //             if($_POST["username"] == $value["username"] && $_POST["password"] == $value["password"]){ // kiểm tra xem username và password nhập vào có trùng với username và password trong DB hay không
        //                 $_SESSION["username"] = $_POST["username"]; //nếu khớp dữ liệu trong DB thì gán dữ liệu username vào session thông qua key là username
        //                 header("location:../admin.php"); //điều hướng về trang admin
        //             }
        //         }else{
        //             echo "Invalid Data"; //nếu dữ liệu nhập vào không đúng thì thông báo lỗi và giữ nguyên trang login
        //         }
        //     }
        // }
    $login_alert = "";
    foreach ($users as $value) {
        if(isset($_POST['submit'])) {
            $userName = $_POST['userName'];
            $userPassword = $_POST['userPassword'];
            if($userName == $value['userName'] && $userPassword == $value['userPassword'])
            {
                $_SESSION['userName'] = $userName;
                header('Location: index.php');
                echo "<script> alert('Đăng nhập thành công');</script>";
            }
            else
            {
                $login_alert = "Incorrect username or password";
            }
        }
    } 
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

<body>
    <div class="container mx-auto">
        <header class="py-[60px] flex justify-between items-center">
            <div class="flex justify-center items-center">
                <img class="h-[60px] w-auto" src="image/nike-logo.png" alt="">
            </div>
            <div class="flex justify-between items-center space-x-[100px]">
                <ul class="md:flex justify-between space-x-[52px] hidden">
                    <a href="index.php"><li class="text-sm hover:-translate-y-1 duration-500">Home</li></a>
                    <a href=""><li class="text-sm hover:-translate-y-1 duration-500">Store</li></a>
                    <a href=""><li class="text-sm hover:-translate-y-1 duration-500">About</li></a>
                    <a href=""><li class="text-sm hover:-translate-y-1 duration-500">Blog</li></a>
                    <a href=""><li class="text-sm hover:-translate-y-1 duration-500">Point of Sale</li></a>
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
            </div>
        </header>
        <div class="flex justify-center">
            <div class="flex flex-col items-center space-y-10">
                <div>
                    <img class="h-10 w-auto" src="./image/nike-logo.png" alt="">
                </div>
                <div class="flex flex-col items-center">
                    <h3 class="text-2xl font-extrabold">YOUR ACCOUNT FOR </h3>
                    <h3 class="text-2xl font-extrabold">EVERYTHING NIKE</h3>
                </div>
                <p class="text-sm text-rose-900" id="login_alert"> <?php echo $login_alert;?></p>
                <form action="" method="POST">
                    <div class="flex flex-col space-y-10">
                        <div class="flex flex-col space-y-2">
                            <input class="border border-gray-300 p-2 text-sm w-[300px] outline-none" type="text" name="userName" placeholder="Username">
                            <input class="border border-gray-300 p-2 text-sm w-[300px] outline-none" type="password" name="userPassword" placeholder="Password">
                            
                        </div>
                        <button class="p-2 bg-black w-[300px]" type="submit" name="submit">
                            <p class="text-nm text-white font-extrabold">SIGN IN</p>
                        </button>
                        <p class="text-sm text-gray-500">Not a member? <a href="signup.php" class="text-black underline">Join us</a> </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <footer class="bg-slate-900 text-white w-full py-20 mt-32">
        <div class="grid grid-cols-2 container mx-auto">
            <div class="flex justify-between">
                <div class="grid grid-cols-3 space-x-32">
                    <div>
                        <p class="text-lg font-bold">FIND A STORE</p>
                        <p class="text-lg font-bold">BECOME A MEMBER</p>
                        <p class="text-lg font-bold">SIGN UP FOR EMAIL</p>
                        <p class="text-lg font-bold">SEND US FEED BACK</p>
                    </div>
                    <div>
                        <p class="text-lg font-bold">GET HELP</p>
                        <p class="text-xs text-gray-500 hover:text-white">Order Status</p>
                        <p class="text-xs text-gray-500 hover:text-white">Delivery</p>
                        <p class="text-xs text-gray-500 hover:text-white">Returns</p>
                        <p class="text-xs text-gray-500 hover:text-white">Payment Option</p>
                        <p class="text-xs text-gray-500 hover:text-white">Contact Us</p>
                    </div>
                    <div>
                        <p class="text-lg font-bold">ABOUT NIKE</p>
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
    <script src="./javascript/main.js"></script>
</body>

</html>