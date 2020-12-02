<?php 
require_once('header.php');
?>
 <!-- =-=-=-=-=-=-Content Start Body=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Return Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row  ">
                 <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Students</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Student Name</th>
                                        <th>Roll</th>
                                        <th>Phone</th>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Book Issue Date</th>
                                        <th>Book Return</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        $query="SELECT issue_book.id,issue_book.book_id,issue_book.book_issue_date,students.fname,students.lname,students.roll,students.phone,books.book_name,books.book_image
FROM issue_book 
INNER JOIN students ON students.id=issue_book.student_id
INNER JOIN books ON books.id=issue_book.book_id
WHERE issue_book.book_issue_return_date=''";
                                        $run_query=mysqli_query($con,$query);
                                        while ($row=mysqli_fetch_assoc($run_query)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo ucwords($row['fname'].' '. $row['lname']) ;  ?></td>
                                        <td><?php echo $row['roll'] ;  ?></td>
                                        <td><?php echo $row['phone'] ;  ?></td>
                                        <td><?php echo $row['book_name'] ;  ?></td>
                                        <td>
                                            <a href="../uploads/books/<?php echo $row['book_image'] ;  ?>" class="image">
                                                <img width="50px" class="img-thumbnail img" height="50px" src="../uploads/books/<?php echo $row['book_image'] ;?>" alt="">
                                            </a>
                                        </td>
                                        <td><?php echo $row['book_issue_date'] ;  ?></td>
                                        <td><a href="return_book.php?id=<?php echo $row['id'] ;?>&bookid=<?php echo $row['book_id'] ;?>">Return Book</a></td>
                                    </tr>
                                    <?php  $i++ ;} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                 </div>



 <!-- =-=-=-=-=-=-Content End=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php 
require_once('footer.php');
?>