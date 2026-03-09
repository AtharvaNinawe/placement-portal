<?php
$conn = mysqli_connect("localhost","root","","placement_portal");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){

    $job_id = $_POST['job_id'];

    $filename = $_FILES['resume']['name'];
    $tempname = $_FILES['resume']['tmp_name'];

    $folder = "resumes/".$filename;

    move_uploaded_file($tempname,$folder);

    $query = "INSERT INTO applications(job_id,resume) VALUES('$job_id','$filename')";
    mysqli_query($conn,$query);

    echo "<h3>Application Submitted Successfully</h3>";
}

$job_id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Resume</title>

<style>

body{
font-family: Arial;
background:#f2f2f2;
text-align:center;
}

form{
background:white;
width:300px;
margin:auto;
padding:20px;
margin-top:80px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
}

button{
background:#28a745;
color:white;
border:none;
padding:10px 20px;
cursor:pointer;
}

</style>

</head>

<body>

<form method="POST" enctype="multipart/form-data">

<h2>Upload Resume</h2>

<input type="hidden" name="job_id" value="<?php echo $job_id; ?>">

<br><br>

<input type="file" name="resume" required>

<br><br>

<button name="submit">Submit Application</button>

</form>

</body>
</html>