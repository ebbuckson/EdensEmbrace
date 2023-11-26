<?php
//Esra Buckson 11/26
define('DB_HOST', 'localhost'); 
define('DB_USER', 'root');
define('DB_PASS', ''); 
define('DB_NAME', 'dataform');
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($conn->connect_error) {
    die('Connection Failed ' . $conn->connect_error);
}


if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
$name = $_POST["Name"];
$email = $_POST['email'] ?? 'default@example.com';
$message = $_POST["message"];


if (empty($name) || empty($email) || empty($email) || empty($message)) {
    // At least one variable is empty
    echo "Please fill in all the required fields.";
    return;
}
$query = $conn->prepare("INSERT INTO user_inquiries (Name, Email, Message) 
VALUES (?,?,?)");
$query->bind_param('sss', $name, $email, $message);
$query->execute();
$conn->close();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form</title>
    <script>
    </script>
    </head>
    <body>
    <!--we will start here-->
        <p> Form submitted successfully. Thank you so much! </p> <break>
        <a href="https://ebbuckson.github.io/EdensEmbrace/">Click here to return to Home</a>
    </body>


</html>









