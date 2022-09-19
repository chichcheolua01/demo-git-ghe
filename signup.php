<?php
    include "./model/connect.php";
    $query = "select * from users";
    $users = getAll($query);
    // $signup_alert = "";
    // $location = "";
    // $check = "";
    // $count = 0;
    // if(isset($_POST['submit'])) {
    //     foreach ($users as $value){
    //         if($_POST["userName"] == $value["userName"]){
    //             $count = $count + 0;
    //         }
    //         else {
    //             $count ++;
    //         }
    //     }
    //     if ($count == count($users))
    //     {
    //         $check = "true";
    //         $count = 0;
    //     }
    //     else
    //     {
    //         $check = "false";
    //         $count = 0;
    //     }
    //     if ($check == "true"){
    //         $location = "./controller/save-add-user.php";
    //         $signup_alert = "";
    //     }
    //     else
    //     {
    //         $location = "";
    //         $signup_alert = "Duplicate username, please try again.";
    //     }
    // }  
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function chooseFile(fileInput){
            if(fileInput.files && fileInput.files[0]){
                var reader = new FileReader();

                reader.onload = function(e){
                    $('#image').attr('src', e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>

<body>
    <div class="container mx-auto">
        <header class="py-[60px] flex justify-between items-center">
            <div class="flex items-center">
                <img class="h-[60px] w-auto" src="image/nike-logo.png" alt="">
            </div>
            <div class="flex justify-between items-center space-x-[100px]">
                <ul class="flex justify-between space-x-[52px]">
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
                    <h3 class="text-2xl font-extrabold">BECOME A NIKE MEMBER</h3>
                </div>
                <form action="./controller/save-add-user.php" method="POST" name="signup-form" id="signup-form" enctype="multipart/form-data">
                    <div class="flex flex-col space-y-10">
                        <div class="flex flex-col space-y-2">
                            <input class = "border border-gray-300 p-2 text-sm w-[300px]" type="text" name="userName" placeholder="Username">
                            <p class="text-sm text-rose-900" id="" name="signup_alert"></p>    
                            <input class = "border border-gray-300 p-2 text-sm w-[300px]" type="password" name="userPassword" placeholder="Password">
                            <input class = "border border-gray-300 p-2 text-sm w-[300px]" type="text" name="userFullName" placeholder="Full Name">
                            <select name="userGender" id="" class="outline-none">
                                <option value="Nam"><p class="text-sm">Nam</p></option>
                                <option value="Nữ"><p class="text-sm">Nữ</p></option>
                            </select>
                            <p class="py-2">Chọn ảnh đại diện</p>
                            
                            
                            <div class="flex flex-col items-center space-y-10">
                                
                                <input id="imageFile" class="hidden" type="file" name="userAvatar" onchange="chooseFile(this)">
                                <label class=" w-[200px] h-[50px] text-slate-900 border border-slate-900 rounded-lg top-0 bottom-0 left-0 right-0 flex justify-center items-center" for="imageFile">
                                <i class="material-icons">add_photo_alternate</i>  
                                Choose a photo</label>
                                <img src="" alt="" id="image" class="w-[200px] h-auto rounded-lg">
                            </div>
                        </div>                   
                        <button class="p-2 bg-black w-[300px]" type="submit" name="submit"><p class="text-nm text-white font-extrabold">SIGN UP</p></button>
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
</body>

</html>