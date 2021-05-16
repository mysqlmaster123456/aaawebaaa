<?php
session_start();
require "../db.php";
if (!isset($_SESSION["email"])){

    header("location:index.php");

}
if (isset($_GET["id"])) {
    $test_id = $_GET["id"];
}
$sql = "SELECT * FROM questions_answers WHERE id_test = '$test_id'";
$email = $_SESSION["email"];
$query = mysqli_query($conn,$sql);
$questions_answers = mysqli_fetch_all($query);
$sql = "SELECT number_questions FROM tests WHERE id = '$test_id'";
$query = mysqli_query($conn,$sql);
$number_questions_arr = mysqli_fetch_array($query);
$number_questions = $number_questions_arr["number_questions"];
$sql = "SELECT id FROM users WHERE email='$email'";
$query = mysqli_query($conn,$sql);
$user_id_arr = mysqli_fetch_array($query);
$id_u = $user_id_arr["id"];
$right_answers = 0;
$wrong_questions = array();
$right_answers_arr = array();

if (isset($_POST["vyhodnotit"])) {
    for ($i=0; $i < count($questions_answers); $i++) { 
       if($_POST["answer".$i] == $questions_answers[$i][1]){
            $right_answers++;
       } else {
            array_push($wrong_questions, $questions_answers[$i][0]);
            array_push($right_answers_arr, $questions_answers[$i][1]); 
       }
    }
    $result = ($right_answers / $number_questions) * 100; 
    $sql = "INSERT INTO results VALUES ('$id_u','$test_id','$result',now())";
    $query = mysqli_query($conn,$sql);
}
?>
<html>
<head>
    <title>TEST - Počítačový HW</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="body">
    <div class="menu">
        <ul>
            <li><a href="../home.php">Domů</a></li>
            <li><a href="../leaderboard.php">Žebříček</a></li>
            <li style="float:right"><a href="../userprofile.php">Profil</a></li>
        </ul>
    </div>
    <div class="test">
        <form method="POST">
            <?php
            $a = 0;
              foreach ($questions_answers as $question_answer){
                echo "<strong>".$question_answer[0]."</strong><br/>";  
                echo "<input type='radio' name='answer".$a."' required value='".$question_answer[1]."'>".$question_answer[1]."<br/>";
                echo "<input type='radio' name='answer".$a."' required value='".$question_answer[2]."'>".$question_answer[2]."<br/>";
                echo "<input type='radio' name='answer".$a."' required value='".$question_answer[3]."'>".$question_answer[3]."<br/><br/>";
              $a++;
              }
            ?>
            <input type="submit" name="vyhodnotit" value="Vyhodnotit"><br/><br/>
            <?php
                if ($right_answers > 0) {
                    echo "Počet spravných odpovědí ".$right_answers." / ".$number_questions."<br/>";
                }
                if ($right_answers < $number_questions) {
                    for ($i=0; $i < count($wrong_questions); $i++) { 
                        echo "<span style='color:red'>".$wrong_questions[$i]."</span><br/>";
                        echo "<span style='color:green'>".$right_answers_arr[$i]."</span><br/>";
                    }   
                } 
            ?>
        </form>
    </div>
</div>
</body>
</html>
