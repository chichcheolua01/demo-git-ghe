<?php
    include "../model/connect.php";
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    $userAvatar = $_FILES['userAvatar']['name'];
    //var_dump($userAvatar);
    $userFullName = $_POST['userFullName'];
    $userGender = $_POST['userGender'];
    $query = "INSERT INTO users (userName, userPassword, userFullName, userGender, userAvatar) VALUES ('$userName', '$userPassword', '$userFullName','$userGender', '$userAvatar')";
    connect($query);
    move_uploaded_file($_FILES['userAvatar']['tmp_name'],"../image/".$_FILES['userAvatar']['name']);
    header("Location:../signup.php");
?>
