
<?php
     require_once('../include/Db.php');
     require_once('../include/function.php');

    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $bookid=$_GET['bookid'];
        $date=date('y-d-y');
        $return_book_query="UPDATE issue_book SET book_issue_return_date=' $date' WHERE id='$id' ";
       
        $run_return_book_query=mysqli_query($con,$return_book_query);

        if ($run_return_book_query) {
        	 mysqli_query($con,"UPDATE books SET available_qty=available_qty+1 WHERE id='$bookid' ");

        		echo Redirect_to('manage_return_book.php');

     } } ?>