<?php
session_start();
include 'config/db.php';

if(!isset($_SESSION['student_id'])){
header("Location: login.php");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>View Jobs</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="navbar">
<h2>🎓 Placement Portal</h2>

<div class="nav-links">
<a href="dashboard.php">Dashboard</a>
<a href="jobs.php">Jobs</a>
<a href="upload_resume.php">Upload Resume</a>
<a href="logout.php">Logout</a>
</div>
</div>

<div class="container">

<h2>Available Jobs</h2>

<table>

<tr>
<th>Company</th>
<th>Role</th>
<th>Salary</th>
<th>Apply</th>
</tr>

<?php
$query = "SELECT * FROM jobs";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['company']; ?></td>

<td><?php echo $row['role']; ?></td>

<td><?php echo $row['salary']; ?></td>

<td>
<a class="btn" href="apply.php?job_id=<?php echo $row['id']; ?>">Apply</a>
</td>

</tr>

<?php } ?>

</table>

</div>

<footer>
© 2026 College Placement Portal
</footer>

</body>
</html>