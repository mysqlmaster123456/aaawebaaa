<?php
$conn = mysqli_connect("localhost","root","", "znalostni_web");
session_start();

if($conn === false){
    die(mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = mysqli_escape_string($conn,$_POST["email"]);
    $password = mysqli_escape_string($conn,$_POST["password"]);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_array($result)){
            if (password_verify($password, $row["password"])){
                $_SESSION["email"] = $email;
                header("location:home.php");
                echo "ahoj1";
            } else {
                $_SESSION["error"] = "Chybné uživatelské jméno nebo heslo";
                header("location:index.php");
                echo "ahoj2";
            }
        }
    } else {
        $_SESSION["error"] = "Chybné uživatelské jméno nebo heslo";
        header("location:index.php");
    }

}