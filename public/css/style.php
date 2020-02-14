<?php
header("Content-type: text/css; charset: UTF-8");



$servername = "127.0.0.1";
$username = "forge";
$password = "lvkZZ2nWicuPlIcPR64A";
$dbname = "forge";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT id FROM sites WHERE domain = '" . $_SERVER['HTTP_HOST']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $site_id = $row['id'];
    }
} else {
    echo "0 results";
}




$sql = "SELECT css FROM templates WHERE site_id = '" . $site_id ."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row['css'];
    }
}

$sql = "SELECT css FROM pages WHERE site_id = '" . $site_id ."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row['css'];
    }
}



$conn->close();



?>