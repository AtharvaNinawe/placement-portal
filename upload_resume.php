<?php
session_start();
include 'config/db.php';

if(!isset($_SESSION['student_id'])){
header("Location: login.php");
exit();
}

$message = "";
$messageClass = "";

if(isset($_POST['upload']))
{
$resume = $_FILES['resume']['name'];
$tmp = $_FILES['resume']['tmp_name'];
$fileType = strtolower(pathinfo($resume, PATHINFO_EXTENSION));

// Allowed file types
$allowedTypes = array('pdf', 'doc', 'docx');

if(in_array($fileType, $allowedTypes)){
    if(move_uploaded_file($tmp, "resumes/".$resume)){
        $message = "Resume Uploaded Successfully";
        $messageClass = "success";
    } else {
        $message = "Error uploading file. Please try again.";
        $messageClass = "error";
    }
} else {
    $message = "Invalid file type. Only PDF, DOC, and DOCX files are allowed.";
    $messageClass = "error";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Resume</title>
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

<h2>Upload Resume</h2>

<?php if($message != ""): ?>
<div class="<?php echo $messageClass; ?>"><?php echo $message; ?></div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">

<input type="file" name="resume" accept=".pdf,.doc,.docx" required>

<button class="btn" name="upload">Upload Resume</button>

</form>

</div>

<footer>
© 2026 College Placement Portal
</footer>

</body>
</html>