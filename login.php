<?php
session_start();
include 'config/db.php';

$error="";

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM students WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

$row = mysqli_fetch_assoc($result);

$_SESSION['student_id'] = $row['id'];
$_SESSION['student_name'] = $row['name'];

header("Location: dashboard.php");
exit();

}else{

$error = "Invalid Email or Password";

}

}
?>

<?php include 'includes/header.php'; ?>

<h2 style="text-align:center;color:white;margin-bottom:20px;">Student Login</h2>

<?php
if($error!=""){
echo "<p class='error-msg'>$error</p>";
}
?>

<form method="POST" class="<?php echo ($error != '') ? 'shake' : ''; ?>">

<input type="email" name="email" placeholder="Enter Email" required>

<input type="password" name="password" placeholder="Enter Password" required>

<button class="btn" name="login">Login</button>

</form>

<?php include 'includes/footer.php'; ?>