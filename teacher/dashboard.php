<?php
include("../db/connection.php");
if ($_SESSION['role'] != 'teacher') header("Location: ../auth/select_role.php");
?>

<h2>Teacher Dashboard</h2>

<a href="courses.php">My Courses</a><br>
<a href="../auth/logout.php">Logout</a>
