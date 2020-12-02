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
                            <li><a href="javascript:avoid(0)">Student</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row  ">
                 <div class="col-sm-12">
                    <div class="pull-left">
                        <h4 class="section-subtitle"><b>All Students</b></h4>
                    </div>
                    <div class="pull-right">
                        <a href="print_all_students.php" target="_blank" class="btn btn-primary "><i class="fa fa-print"></i> Print</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Reg. No</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        $query="SELECT * FROM students";
                                        $run_query=mysqli_query($con,$query);
                                        while ($row=mysqli_fetch_assoc($run_query)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo ucwords($row['fname'].' '. $row['lname']) ;  ?></td>
                                        <td><?php echo $row['roll'] ;  ?></td>
                                        <td><?php echo $row['reg'] ;  ?></td>
                                        <td><?php echo $row['email'] ;  ?></td>
                                        <td><?php echo $row['username'] ;  ?></td>
                                        <td><?php echo $row['phone'] ;  ?></td>
                                        <td><?php echo $row['photo'] ;  ?></td>
                                        <td><?php echo $row['status']==1 ? '<span class="badge x-success">Active</span>':'<span class="badge x-danger">Inactive</span>' ;  ?></td>
                                        <td>
                                            <?php
                                                if ($row['status']==1) {?>
                                                    <a href="status_inactive.php?id=<?php echo base64_encode($row['id']) ;?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-up"></i></a>
                                                <?php }else{ ?>
                                                    <a href="status_active.php?id=<?php echo base64_encode($row['id']) ;?>" class="btn btn-warning btn-sm"><i class="fa fa-arrow-down"></i></a>
                                           <?php } ?>
                                              
                                        </td>
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