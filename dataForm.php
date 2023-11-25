<?php
//Esra Buckson 11/25/2023
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
        <form id="contact" method="POST" action="dataForm.php">
        <h1>Contact Me</h1>
        <h5>Name</h5>
        <input name="Name" placeholder=" Name..." style="border-radius: 3px;">
        <h5>Email</h5>
        <input name="email" placeholder="Email Address..." style="border-radius: 3px;">
        <h5>Message</h5>
        <textarea name="message" placeholder="Message..." style="border-radius: 3px;" rows="4" cols="20"></textarea>
        <br>
        <button name="button1" type="submit" style="width: 100px; height: 20px; margin-top: 
        1rem;">Submit</button>
        </form>
    </body>


</html>









</html>
