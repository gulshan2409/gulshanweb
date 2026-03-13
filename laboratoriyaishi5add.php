<?php
include 'db.php';

if(isset($_POST['submit'])){

$student_identity = $_POST['student_identity'];
$enrollment_number = $_POST['enrollment_number'];
$faculty_name = $_POST['faculty_name'];
$study_year = $_POST['study_year'];
$grade_average = $_POST['grade_average'];
$scholarship_type = $_POST['scholarship_type'];
$registration_date = $_POST['registration_date'];

$sql = "INSERT INTO academic_records
(student_identity,enrollment_number,faculty_name,study_year,grade_average,scholarship_type,registration_date)

VALUES
('$student_identity','$enrollment_number','$faculty_name','$study_year','$grade_average','$scholarship_type','$registration_date')";

$conn->query($sql);

header("Location:index.php");
}

?>

<h2>Yangi talaba qo'shish</h2>

<form method="POST">

Talaba ismi:
<input type="text" name="student_identity"><br><br>

Enrollment number:
<input type="text" name="enrollment_number"><br><br>

Faculty:
<input type="text" name="faculty_name"><br><br>

Study year:
<input type="number" name="study_year"><br><br>

Grade average:
<input type="text" name="grade_average"><br><br>

Scholarship:
<input type="text" name="scholarship_type"><br><br>

Registration date:
<input type="date" name="registration_date"><br><br>

<button type="submit" name="submit">Saqlash</button>

</form>