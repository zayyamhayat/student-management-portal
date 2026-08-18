<?php
include("../db/connection.php");
if ($_SESSION['role'] != 'student') header("Location: ../auth/select_role.php");
?>

<h2>Student Dashboard</h2>

<a href="courses.php">My Courses</a><br>
<a href="attendance.php">My Attendance</a><br>
<a href="../auth/logout.php">Logout</a>
h