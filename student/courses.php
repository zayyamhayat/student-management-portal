<?php
include("../db/connection.php");

$user_id = $_SESSION['user_id'];

$query = "
SELECT c.course_name
FROM enrollments e
JOIN students s ON e.student_id = s.student_id
JOIN courses c ON e.course_id = c.course_id
WHERE s.user_id = $user_id
";

$result = mysqli_query($conn, $query);

echo "<h3>My Courses</h3>";
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['course_name'] . "<br>";
}
