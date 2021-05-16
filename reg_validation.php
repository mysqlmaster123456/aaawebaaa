<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect("localhost","root","","znalostni_web");

if($conn === false){
    die(mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $description = $_POST['description'];

    echo $name.' '.$surname.' '.$username.' '.$password.' '.$email.' '.$description;

    $sql = "INSERT INTO users (name,surname,username,email,password,description) VALUES ('$name','$surname','$username','$email','$password_hash','$description')";

    if (mysqli_query($conn,$sql)){
        header('location:home.php');
    } else{
        echo "ERROR " . mysqli_error($conn);
    }

}


