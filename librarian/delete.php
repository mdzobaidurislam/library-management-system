<?php 

require_once('../include/Db.php');
require_once('../include/function.php');

 $id=base64_decode($_GET['deletebook']);
 $query="DELETE FROM books WHERE  id='$id' ";
 $run_query=mysqli_query($con,$query);
 if ($run_query) {
 	echo Redirect_to('manage_book.php');
 }
