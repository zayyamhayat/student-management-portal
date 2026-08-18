<?php
include("../db/connection.php");

$course_id = $_GET['course_id'];

$query = "
SELECT s.student_id, s.name
FROM enrollments e
JOIN students s ON e.student_id = s.student_id
WHERE e.course_id = $course_id
";

$result = mysqli_query($conn, $query);

echo "<h3>Edit Marks</h3>";

while ($row = mysqli_fetch_assoc($result)) {
?>
<form method="post">
    <?php echo $row['name']; ?>
    <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">
    Quiz: <input type="number" name="quiz">
    Assignment: <input type="number" name="assignment">
    Mid: <input type="number" name="mid">
    Final: <input type="number" name="final">
    <button name="save">Save</button>
</form>
<hr>
<?php } ?>

<?php
if (isset($_POST['save'])) {
    $sid = $_POST['student_id'];
    $quiz = $_POST['quiz'];
    $assignment = $_POST['assignment'];
    $mid = $_POST['mid'];
    $final = $_POST['final'];

    mysqli_query($conn,
    "REPLACE INTO grade_book
    (student_id, course_id, quiz_marks, assignment_marks, mid_marks, final_marks)
    VALUES ($sid, $course_id, $quiz, $assignment, $mid, $final)");
}
?>
