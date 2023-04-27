<?php
require 'connect.php';
if (!empty($_SESSION["id"])) {
    header("Location: login.php");
}
if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM uspa WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {

        if ($password == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: dashboard.php");
        } else {
            echo "<script> alert('Wrong Password');</script>";
        }
    } else {
        echo "<script> alert('User Not Registered');</script>";
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="flex flex-col justify-center items-center w-screen h-screen bg-color:30,30,30">
    <h1 class="text-2xl font-bold mb-2 block text-center font-semibold">
        Your Website Name
    </h1>
    <form action="#" method="post" autocomplete="off">
        <div class="w-96 p-6 shadow-2xl bg-white rounded-md">
            <h1 class="text-3xl block text-center font-semibold"></i>Login Panel</h1>
            <hr class="mt-3">
            <div class="mt-3">
                <label for="username" class="block text-base mb-2">Username</label>
                <input required type="text" name="username" id="username"
                       class="border w-full next-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                       placeholder="Enter Username."/>
            </div>
            <div class="mt-3">
                <label for="password" class="block text-base mb-2">Password</label>
                <input required type="password" name="password" id="password"
                       class="border w-full next-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                       placeholder="Enter Password."/>
            </div>

            <div class="mt-4 mb-6">
                <button type="submit" name="submit" id="submit" value="Login"
                        class="border-2 border-black bg-black shadow-2xl text-white py-1 w-full rounded-md hover:bg-transparent hover:text-black">
                    Login
                </button>
            </div>
    </form>
</div>
</div>
</body>
</html>