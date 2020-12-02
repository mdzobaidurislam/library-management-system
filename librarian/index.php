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
                        <div class="col-md-3">
                            <div class="panel widgetbox wbox-2 bg-scale-0">
                                    <a href="student.php">
                                        <div class="panel-content">
                                            <div class="row">
                                        <?php
                                         $student_query=mysqli_query($con,"SELECT * FROM students");
                                         $row=mysqli_num_rows($student_query);

                                        ?>
                                                <div class="col-xs-4">
                                                    <span class="icon fa fa-users"></span>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h4 class="subtitle color-darker-1">Total Student</h4>
                                                    <h1 class="title color-primary"> <?php echo $row; ?></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel widgetbox wbox-2 bg-scale-0">
                                    <a href="#">
                                        <div class="panel-content">
                                            <div class="row">
                                        <?php
                                         $libraian_query=mysqli_query($con,"SELECT * FROM libraian");
                                         $total_libraian=mysqli_num_rows($libraian_query);

                                        ?>
                                                <div class="col-xs-4">
                                                    <span class="icon fa fa-users"></span>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h4 class="subtitle color-darker-1">Total Libraian</h4>
                                                    <h1 class="title color-primary"> <?php echo $total_libraian; ?></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel widgetbox wbox-2 bg-scale-0">
                                    <a href="manage_book.php">
                                        <div class="panel-content">
                                            <div class="row">

                                        <?php
                                        
                                         $books=mysqli_query($con,"SELECT * FROM books");
                                         $total_books=mysqli_num_rows($books);
                                         $total_books_data=mysqli_query($con,"SELECT SUM(`book_qty`) as total FROM books");
                                         $book_qty=mysqli_fetch_assoc($total_books_data);

                                        ?>
                                                <div class="col-xs-4">
                                                    <span class="icon fa fa-book"></span>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h4 class="subtitle color-darker-1">Total Books</h4>
                                                    <h1 class="title color-primary"> <?php echo $total_books . '('.$book_qty['total'].')';?></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel widgetbox wbox-2 bg-scale-0">
                                    <a href="manage_book.php">
                                        <div class="panel-content">
                                            <div class="row">

                                        <?php
                                        
                                         $total_av_query=mysqli_query($con,"SELECT SUM(available_qty) as total_a FROM books");
                                         $total_a=mysqli_fetch_assoc($total_av_query);

                                        ?>
                                                <div class="col-xs-4">
                                                    <span class="icon fa fa-book"></span>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h4 class="subtitle color-darker-1">Available Books</h4>
                                                    <h1 class="title color-primary"> <?php echo $total_a['total_a'] ;?></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        </div>

                 </div>

 <!-- =-=-=-=-=-=-Content End=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php 
require_once('footer.php');
?>