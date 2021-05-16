<?php
session_start();
include 'db.php';
if (isset($_SESSION["email"])){

    header("location:home.php");

}

?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div id="welcome">
        Přihlašte se prosím, pokud ještě nemáte vytvořený účet, zde se můžete <a href="registration.php">zaregistrovat</a>.
    </div>
    <div id="login_form">
        <form method="POST" action="log_validation.php">
            <label>E-mail</label><br/>
            <input type="email" name="email" id="email" required><br/>
            <label>Heslo</label><br/>
            <input type="password" name="password" id="password" required><br/>
            <input type="submit" value="Přihlásit se" style="padding: 1px;margin: 5px">
        </form>
    </div>
    <div id="error">
       <?php
        if (isset($_SESSION["error"])){
            echo $_SESSION["error"];
        }
       ?>
    </div>
</div>
</body>
</html>
