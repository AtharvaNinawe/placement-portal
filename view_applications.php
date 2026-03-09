<?php
include 'config/db.php';
include 'includes/header.php';

$result = mysqli_query($conn,"SELECT * FROM applications");
?>

<h2 style="color:white;text-align:center;">Job Applications</h2>

<table>

<tr>
<th>Student Name</th>
<th>Job ID</th>
<th>Resume</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

echo "<tr>";

echo "<td>".$row['student_name']."</td>";

echo "<td>".$row['job_id']."</td>";

echo "<td>".$row['resume']."</td>";

echo "</tr>";

}

?>

</table>

<?php include 'includes/footer.php'; ?>