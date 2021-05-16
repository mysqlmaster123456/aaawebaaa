<?php
include 'db.php';

?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="login_form">
            <form method="POST" action="reg_validation.php">
                <label>Jméno</label><br/>
                <input type="text" name="name" id="name" required><br/>
                <label>Přijmení</label><br/>
                <input type="text" name="surname" id="surname" required><br/>
                <label>Přezdívka</label><br/>
                <input type="text" name="username" id="username" required><br/>
                <label>Heslo</label><br/>
                <input type="password" name="password" id="password" required><br/>
                <label>Heslo znovu</label><br/>
                <input type="password" name="password_check" id="password_check" required><br/>
                <label>E-mail</label><br/>
                <input type="email" name="email" id="email" required><br/>
                <label>Poznámka</label><br/>
                <textarea name="description" id="description"></textarea><br/>
                <input type="submit" value="Zaregistrovat se">
            </form>
        </div>
    </body>
</html>
