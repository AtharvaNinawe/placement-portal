<?php
session_start();

if(!isset($_SESSION['student_name'])){
header("Location: login.php");
exit();
}
?>

<?php include 'includes/header.php'; ?>

<h1 style="text-align:center;color:white;font-size:40px;margin-top:50px;">
Student Dashboard
</h1>

<div class="dashboard">

<a class="btn" href="jobs.php">💼 View Jobs</a>

<a class="btn" href="companies.php">🏢 Companies</a>

<a class="btn" href="upload_resume.php">📄 Upload Resume</a>

<a class="btn" href="logout.php">🚪 Logout</a>

</div>

<?php include 'includes/footer.php'; ?>