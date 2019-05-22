<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "login";

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    echo "Connection is successful!<br/>";
    $sql = "SELECT username FROM users";
    $users = $dbh->query($sql);

    echo "<br/>";
    $result = $users->fetchAll(PDO::FETCH_COLUMN, 0);
    foreach($result as $key => $value) {
        echo $key . ": " . $value . "<br/>";
    }
    $dbh = null;
}
catch (PDOexception $e) {
    echo "Error is: " . $e-> getMessage();
}

