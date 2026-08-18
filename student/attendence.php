<?php
include("../db/connection.php");

$user_id = $_SESSION['user_id'];

$query = "
SELECT c.course_name, a.date, a.status
FROM attendance a
JOIN students s ON a.student_id = s.student_id
JOIN courses c ON a.course_id = c.course_id
WHERE s.user_id = $user_id
";

$result = mysqli_query($conn, $query);

echo "<h3>Attendance</h3>";
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['course_name']." - ".$row['date']." - ".$row['status']."<br>";
}
