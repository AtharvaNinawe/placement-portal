<?php
include "config/db.php";

if(isset($_POST['submit']))
{

$company=$_POST['company_id'];
$role=$_POST['job_role'];
$salary=$_POST['salary'];
$eligibility=$_POST['eligibility'];

$query="INSERT INTO jobs(company_id,job_role,salary,eligibility)
VALUES('$company','$role','$salary','$eligibility')";

mysqli_query($conn,$query);

echo "Job Added";

}
?>

<form method="POST">

<input type="text" name="company_id"
placeholder="Company ID">

<input type="text" name="job_role"
placeholder="Job Role">

<input type="text" name="salary"
placeholder="Salary">

<input type="text" name="eligibility"
placeholder="Eligibility">

<button name="submit">Add Job</button>

</form>