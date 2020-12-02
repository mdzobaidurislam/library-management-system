<?php 
require_once('header.php');


?>

<?php

if (isset($_POST['issue_book_save'])) {

 $student_book_id  = $_POST['student_book_id'];
 $issue_book_id    = $_POST['issue_book_id'];
 $book_issue_date  = $_POST['book_issue_date'];

 $issue_query="INSERT INTO issue_book(student_id,book_id,book_issue_date) VALUES ('$student_book_id','$issue_book_id','$book_issue_date') ";

 $run_issue_query=mysqli_query($con,$issue_query);
 if ($run_issue_query) {

  mysqli_query($con,"UPDATE books SET available_qty=available_qty-1 WHERE id='$issue_book_id' ");

  ?>
      
      <script type="text/javascript">
        alert('Book Issue Succesfull!');
      </script>

 <?php }else{ ?>
        <script type="text/javascript">
        alert('Book Issue Not Added');
      </script>

<?php }}


?>
 <!-- =-=-=-=-=-=-Content Start Body=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Issue Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row  ">
                      <div class="col-sm-12 col-md-6 col-md-offset-3">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline" method="post" action="">
                                       
                                        <div class="form-group">
                                              <select name="student_id" class="form-control" >
                                                <option value="">Select</option>
                                               <?php  $query="SELECT * FROM students WHERE status='1'";
                                        $run_query=mysqli_query($con,$query);
                                        while ($row=mysqli_fetch_assoc($run_query)) { ?>
                                                <option value="<?php echo $row['id']; ?>"> <?php echo ucwords($row['fname'].' '. $row['lname']).' -('. $row['roll'].' )' ;  ?></option>
                                              <?php }?>
                                              </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="search" class="btn btn-primary">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                              <?php
                              if (isset($_POST['search'])) {
                                $id=$_POST['student_id'];
                                $search_query="SELECT * FROM students WHERE id='$id' AND status='1' ";
                                $search_result=mysqli_query($con,$search_query);
                                $search_data=mysqli_fetch_assoc($search_result);?>
                                <div class="panel">
                                  <div class="panel-content">
                                      <div class="row">
                                          <div class="col-md-12">
                                              <form method="post" action="">
                                                  
                                                      <div class="form-group">
                                                          <label for="name">Student Name</label>
                                                          <input type="text" class="form-control" id="name" value="<?php echo ucwords($search_data['fname'].' '. $search_data['lname']); ?>" readonly>
                                                     <input type="hidden" name="student_book_id" value="<?php echo $search_data['id'];?>">
                                                      </div>
                                                    <div class="form-group">
                                                      <select name="issue_book_id" class="form-control" >
                                                        <option value="">Select</option>
                                                       <?php  $book_query="SELECT * FROM books WHERE available_qty > 0 ";
                                                          $book_run_query=mysqli_query($con,$book_query);
                                                          while ($book_row=mysqli_fetch_assoc($book_run_query)) { ?>
                                                                  <option value="<?php echo $book_row['id']; ?>"> <?php echo $book_row['book_name'] ;  ?></option>
                                                                <?php }?>
                                                      </select>
                                                       </div>
                                                       <div class="form-group">
                                                           <label for="name">Book Issue Date</label>
                                                           <input type="text" class="form-control" value="<?php echo date('d-m-Y');?>" name="book_issue_date" readonly>
                                                      </div>
                                                      <div class="form-group">
                                                          <input type="submit" name="issue_book_save" class="btn btn-primary" value="Save Issue Book">
                                                      </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <?php } ?>



                        </div>
                    </div>
                </div>
                 </div>

 <!-- =-=-=-=-=-=-Content End=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php 
require_once('footer.php');
?>