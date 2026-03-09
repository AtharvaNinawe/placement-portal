<?php
include "config/db.php";

if(isset($_POST['submit']))
{

$name=$_POST['company_name'];
$location=$_POST['location'];
$email=$_POST['email'];

$query="INSERT INTO companies(company_name,location,email)
VALUES('$name','$location','$email')";

mysqli_query($conn,$query);

echo "Company Added";

}
?>

<form method="POST">

<input type="text" name="company_name"
placeholder="Company Name" class="form-control mb-2">

<input type="text" name="location"
placeholder="Location" class="form-control mb-2">

<input type="email" name="email"
placeholder="Email" class="form-control mb-2">

<button name="submit" class="btn btn-primary">
Add Company
</button>

</form>