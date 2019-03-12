<?php
require_once 'config.php';
// Create connection

$sql = "INSERT INTO employees (name, address, salary) VALUES ('John', 'Doe', '01')";

if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();
?> 