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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated ">
                      <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Issue Books</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-bordered table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Book Issue Date</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $i=1;
                                        $id=$_SESSION['student_id'];
                                        $issue_show_query="SELECT issue_book.book_issue_date, books.book_name , books.book_image FROM books INNER JOIN issue_book ON issue_book.book_id=books.id WHERE issue_book.book_issue_return_date=' ' AND issue_book.student_id='$id'";
                                            $issue_show_run_query=mysqli_query($con,$issue_show_query);
                                            while ($data=mysqli_fetch_assoc($issue_show_run_query)) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $data['book_name']; ?></td>
                                            <td>
                                            <a href="../uploads/books/<?php echo $data['book_image'] ;  ?>" class="image">
                                                <img width="50px" class="img-thumbnail img" height="50px" src="../uploads/books/<?php echo $data['book_image'] ;  ?>" alt="">
                                            </a>
                                            </td>
                                            <td><?php echo date('d-M-Y',strtotime($data['book_issue_date'])) ; ?></td>

                                        </tr>
                                    <?php   $i++ ; } ?>
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