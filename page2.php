//uses MySQL (PDO)
<?php
$usernameForm = $_POST['usernameForm'];
$passwordForm = $_POST['passwordForm'];
$classForm = $_POST['classForm'];


$servername = "tutor123.database.windows.net";
$username = "tutoradmin";
$password = "Tutorpassword7";
$myDB = "Tutor";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 

    $sql = "INSERT INTO TutorTable (username,PW,class) VALUES (:usernameForm, :passwordForm, :classForm)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usernameForm', $usernameForm);
    $stmt->bindParam(':passwordForm', $passwordForm);
      $stmt->bindParam(':classForm', $classForm);
    $stmt->execute();

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

$conn = NULL;
?>