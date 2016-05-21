<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hemal</title>
</head>
<body>
    <form name="form2" action =" " method = "POST">
    First name:<input type = "text" name = "firstname" />
    Last Name:<input type = "text" name = "lastname"/>
        <input type = "submit" value = "submit"/>
    </form>
</body>
</html>
<?php
if(isset($_POST['firstname']) && isset($_POST['lastname'])) {
    $firstname =$_POST['firstname'];
    $lastname =$_POST['lastname'];
    echo"First Name $firstname, Last Name $lastname <br/>";

        $SERVER_NAME = "localhost";
        $USER_NAME = "root";
        $PASSWORD = "";
        $DB_NAME = "hemal";

        // Create connection
        $conn = new mysqli($SERVER_NAME, $USER_NAME, $PASSWORD, $DB_NAME);

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully <br/>";


        $sql = "INSERT INTO user (firstname, lastname)
        VALUES ('".$firstname."', '".$lastname."')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();


}
?>
<?php
$cookie_name = "root";
$cookie_value = "Kayes Hemal";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>
