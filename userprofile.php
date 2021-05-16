<?php
session_start();
include 'db.php';
if (!isset($_SESSION["email"])){

    header("location:index.php");

}
$email = $_SESSION["email"];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn,$sql);
$user = mysqli_fetch_array($result);
$id_u = $user["id"];
$sql = "SELECT tests.title,results.result,results.time FROM results JOIN tests ON results.id_test = tests.id JOIN users ON results.id_u = users.id WHERE id_u = '$id_u'";
$query = mysqli_query($conn,$sql);
$results = mysqli_fetch_all($query);
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <style>
    table, td, th {
      border: 1px solid black;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }
</style>
</head>
<body>
<div class="body">
    <div class="menu">
        <ul>
            <li><a href="home.php">Domů</a></li>
            <li><a href="leaderboard.php">Žebříček</a></li>
            <li style="float:right"><a href="userprofile.php" class="active">Profil</a></li>
        </ul>
    </div>
    <div id="info" style="text-align: center">
        <div><h3 style="text-align: center;background-color: darkgrey;margin: 0!important;height: 30px;">Info o uživateli</h3></div>
        <div style="margin: 10px">
            Jméno: <?=$user["name"]?><br/>
            Přijmení: <?=$user["surname"]?><br/>
            Uživatelské jméno: <?=$user["username"]?><br/>
            Poznámka: <?=$user["description"]?><br/>
        </div>
    </div>
    <div id="results">
        <div><h3 style="text-align: center;background-color: darkgrey;margin: 0!important;height: 30px;">Výsledky</h3></div>
        <table style="text-align: center;">
            <tr>
                <th>Název testu</th>
                <th>Procentuální úspešnost</th>
                <th>Datum</th>
            </tr>
            <?php
                foreach ($results as $result) {
                    echo "<tr>";
                    echo "<td>".$result[0]."</td>";
                    echo "<td>".$result[1]."%</td>";
                    echo "<td>".$result[2]."</td>";
                    echo "</tr>";
                }
            ?>    
        </table>
    </div>
    </div>
</div>
</body>
</html>
