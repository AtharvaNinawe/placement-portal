<?php
session_start();

if(!isset($_SESSION['student_name'])){
header("Location: login.php");
exit();
}
?>

<?php
include 'config/db.php';
include 'includes/header.php';

$result = mysqli_query($conn,"SELECT * FROM companies");
?>

<h2>Companies</h2>

<table>

<tr>
<th>Company</th>
<th>Location</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result)){
echo "<tr>";
echo "<td>".$row['company_name']."</td>";
echo "<td>".$row['location']."</td>";
echo "</tr>";
}
?>

</table>

<?php include 'includes/footer.php'; ?>