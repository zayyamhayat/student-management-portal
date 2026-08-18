<?php
include("../db/connection.php");

$user_id = $_SESSION['user_id'];

$query = "
SELECT c.course_id, c.course_name
FROM courses c
JOIN teachers t ON c.teacher_id = t.teacher_id
WHERE t.user_id = $user_id
";

$result = mysqli_query($conn, $query);

echo "<h3>Courses I Teach</h3>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<a href='edit_marks.php?course_id=".$row['course_id']."'>
          ".$row['course_name']."</a><br>";
}
