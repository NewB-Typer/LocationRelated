<?php

// Connect to the database
$dsn = 'mysql:host=localhost;dbname=database_name';
$user = 'database_user';
$password = 'database_password';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Get the data from the request
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Insert the data into the database
$sql = "INSERT INTO locations (latitude, longitude) VALUES (:latitude, :longitude)";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':latitude', $latitude);
$stmt->bindParam(':longitude', $longitude);
$stmt->execute();

?>
<!-- In this example, the PHP code receives the location data from the JavaScript code and stores it in a database using PDO. The code first establishes a connection to the database, then retrieves the latitude and longitude data from the request, and finally inserts the data into a table named locations using an SQL statement.
