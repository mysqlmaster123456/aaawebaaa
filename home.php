<?php
session_start();
include 'db.php';
if (!isset($_SESSION["email"])){

    header("location:index.php");

}
$sql = "SELECT * FROM tests";
$query = mysqli_query($conn,$sql);
$tests = mysqli_fetch_all($query);
?>
<html>
    <head>
      <link rel="stylesheet" href="style.css">
      <meta charset="UTF-8">
    </head>
    <body>
        <div class="body">
            <div class="menu">
                <ul>
                    <li><a href="home.php" class="active">Domů</a></li>
                    <li><a href="leaderboard.php">Žebříček</a></li>
                    <li style="float:right"><a href="userprofile.php">Profil</a></li>
                </ul>
            </div>
            <div id="tests">
                <div><h2>Vyber si test</h2></div>
                <?php
                    foreach ($tests as $test){
                        echo "<a href='tests/test.php?id=".$test[0]."'>".$test[1]."</a>"."<br/>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>
