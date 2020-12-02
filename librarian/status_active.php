
<?php 

require_once('../include/Db.php');
require_once('../include/function.php');

 $id=base64_decode($_GET['id']);
 $query="UPDATE students SET status='1' WHERE id='$id' ";
 $run_query=mysqli_query($con,$query);
 if ($run_query) {
 	echo Redirect_to('student.php');
 }
 