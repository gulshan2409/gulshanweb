<?php
include 'db.php';
?>

<h2>Universitet Talabalari</h2>

<a href="add.php">Yangi talaba qo'shish</a>

<table border="1">
<tr>
<th>ID</th>
<th>Student</th>
<th>Enrollment</th>
<th>Faculty</th>
<th>Year</th>
<th>Average</th>
<th>Scholarship</th>
<th>Date</th>
<th>Action</th>
</tr>

<?php

$result = $conn->query("SELECT * FROM academic_records");

while($row = $result->fetch_assoc()){

echo "<tr>
<td>{$row['record_id']}</td>
<td>{$row['student_identity']}</td>
<td>{$row['enrollment_number']}</td>
<td>{$row['faculty_name']}</td>
<td>{$row['study_year']}</td>
<td>{$row['grade_average']}</td>
<td>{$row['scholarship_type']}</td>
<td>{$row['registration_date']}</td>
<td>
<a href='edit.php?id={$row['record_id']}'>Edit</a>
<a href='delete.php?id={$row['record_id']}'>Delete</a>
</td>
</tr>";

}

?>

</table>