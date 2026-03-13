<?php
include 'db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM academic_records WHERE record_id=$id");

$row = $result->fetch_assoc();

if(isset($_POST['update'])){

$student_identity = $_POST['student_identity'];
$enrollment_number = $_POST['enrollment_number'];
$faculty_name = $_POST['faculty_name'];
$study_year = $_POST['study_year'];
$grade_average = $_POST['grade_average'];
$scholarship_type = $_POST['scholarship_type'];
$registration_date = $_POST['registration_date'];

$conn->query("UPDATE academic_records SET

student_identity='$student_identity',
enrollment_number='$enrollment_number',
faculty_name='$faculty_name',
study_year='$study_year',
grade_average='$grade_average',
scholarship_type='$scholarship_type',
registration_date='$registration_date'

WHERE record_id=$id");

header("Location:index.php");

}

?>

<h2>Talabani tahrirlash</h2>

<form method="POST">

Student:
<input type="text" name="student_identity" value="<?php echo $row['student_identity']; ?>"><br><br>

Enrollment:
<input type="text" name="enrollment_number" value="<?php echo $row['enrollment_number']; ?>"><br><br>

Faculty:
<input type="text" name="faculty_name" value="<?php echo $row['faculty_name']; ?>"><br><br>

Year:
<input type="number" name="study_year" value="<?php echo $row['study_year']; ?>"><br><br>

Average:
<input type="text" name="grade_average" value="<?php echo $row['grade_average']; ?>"><br><br>

Scholarship:
<input type="text" name="scholarship_type" value="<?php echo $row['scholarship_type']; ?>"><br><br>

Date:
<input type="date" name="registration_date" value="<?php echo $row['registration_date']; ?>"><br><br>

<button name="update">Yangilash</button>

</form>