<?php
// Enter your host name, database username, password, and database name.
$con = mysqli_connect("localhost", "root", "", "loginsystem");
// Check connection
if (!$con) {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}