<?php
session_start();
if (!isset($_SESSION["email"])){

    header("location:index.php");

}
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="body">
    <div class="menu">
        <ul>
            <li><a href="home.php">Domů</a></li>
            <li><a href="leaderboard.php" class="active">Žebříček</a></li>
            <li style="float:right"><a href="userprofile.php">Profil</a></li>
        </ul>
    </div>
</div>
</body>
</html>
