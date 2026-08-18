<?php
$conn = mysqli_connect("localhost", "root", "", "student_management_portal");

if (!$conn) {
    die("Database connection failed");
}
session_start();
?>
