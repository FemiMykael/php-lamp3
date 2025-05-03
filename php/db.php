<?php

function Createdb(){
    $servername = "bookstore.cf2i4e04wm5s.us-east-1.rds.amazonaws.com";
    $username = "admin";
    $password = "yourpassword";  // <- Replace with your actual RDS password
    $dbname = "bookstore";

    // Create connection without DB first
    $con = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create DB if it doesn't exist
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if (!mysqli_query($con, $sql)) {
        die("Database creation failed: " . mysqli_error($con));
    }

    // Connect to the newly created (or existing) DB
    $con = mysqli_connect($servername, $username, $password, $dbname);

    // Create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS books (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                book_name VARCHAR(25) NOT NULL,
                book_publisher VARCHAR(20),
                book_price FLOAT
            )";

    if (!mysqli_query($con, $sql)) {
        die("Table creation failed: " . mysqli_error($con));
    }

    return $con;
}
