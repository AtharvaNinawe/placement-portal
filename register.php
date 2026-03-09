<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

include 'config/db.php';
include 'includes/header.php';

if(isset($_POST['register'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$sql="INSERT INTO students(name,email,password)
VALUES('$name','$email','$password')";

if(mysqli_query($conn,$sql)){
echo "<p class='success'>Registration Successful</p>";
}else{
echo "Error: ".mysqli_error($conn);
}

}
?>

<h2 style="text-align:center;color:white;margin-bottom:20px;">Register</h2>

<form method="POST">

<input type="text" name="name" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button class="btn" name="register">Register</button>

</form>

<?php include 'includes/footer.php'; ?>