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
                            <li><a href="javascript:avoid(0)">Manage Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated ">
                      <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Books</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-bordered table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Book Name</th>
                                        <th>Image</th>
                                        <th>Book Author</th>
                                        <th>Publication Name</th>
                                        <th>Purchase Date</th>
                                        <th>Price</th>
                                        <th>Quanty</th>
                                        <th>Av.Qnt</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        $query="SELECT * FROM books";
                                        $run_query=mysqli_query($con,$query);
                                        while ($row=mysqli_fetch_assoc($run_query)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td> <?php echo $row['book_name'] ;  ?> </td>
                                        <td>
                                            <a href="../uploads/books/<?php echo $row['book_image'] ;  ?>" class="image">
                                                <img width="50px" class="img-thumbnail img" height="50px" src="../uploads/books/<?php echo $row['book_image'] ;  ?>" alt="">
                                            </a>
                                        </td>
                                        <td><?php echo $row['book_author_name'] ;  ?></td>
                                        <td><?php echo $row['book_publication_name'] ;  ?></td>
                                        <td><?php echo date('d-M-Y',strtotime($row['book_purchase_date'])) ;  ?></td>
                                        <td>TK: <?php echo $row['book_price'] ;  ?></td>
                                        <td><?php echo $row['book_qty'] ;  ?></td>
                                        <td><?php echo $row['available_qty'] ;  ?></td>
                                        <td>
                                            <a class="btn-sm btn btn-info" href="javascript:avoid(0)" data-toggle="modal" data-target="#book-<?php echo $row['id']; ?>"><i class="fa fa-eye"></i></a> 
                                            <a class="btn-sm btn btn-warning" href="javascript:avoid(0)"><i class="fa fa-pencil" data-toggle="modal" data-target="#book-update<?php echo $row['id']; ?>"></i></a>
                                            <a class="btn-sm btn btn-danger" href="delete.php?deletebook=<?php echo base64_encode($row['id']) ;?>" onclick="return confirm('Are you sure?')" ><i class="fa fa-trash-o"></i></a>
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
<!-- Modal Book Datails show -->
<?php
    
     $query="SELECT * FROM books ";
    $run_query=mysqli_query($con,$query);
    while ($row=mysqli_fetch_assoc($run_query)) {
        $update_id=$row['id'];
        $book_update_query="SELECT * FROM books WHERE id='$update_id' ";
        $run_update_query=mysqli_query($con,$book_update_query);
        $data=mysqli_fetch_assoc($run_update_query);
 ?>
<div class="modal fade" id="book-update<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i> Update Book Info </h4>
            </div>
            <div class="modal-body">
                  <div class="row">
                      <div class="col-sm-12 col-md-12 ">
                    <h2 class="section-subtitle text-center"><b>Update</b> book</h2>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <!-- =-=-=-=-Massages  end===== -->
                                <div class="col-md-12">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="book_name">Book Name</label>
                                            <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name" value="<?php echo $data['book_name']; ?>">
                                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="book_author_name">Book Author</label>
                                            <input type="text" class="form-control" id="book_author_name" name="book_author_name" placeholder="Book Author name" value="<?php echo $data['book_author_name']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_publication_name">Book Publication Name</label>
                                            <input type="text" class="form-control" id="book_publication_name" name="book_publication_name" placeholder="Book Publication Name"value="<?php echo $data['book_publication_name']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchase_date">Book Purchase Date</label>
                                            <input type="date" class="form-control" id="book_purchase_date" name="book_purchase_date" placeholder="Book Purchase Date" value="<?php echo $data['book_purchase_date']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_price">Book Price</label>
                                            <input type="number" class="form-control" id="book_price" name="book_price" placeholder="Book Price" value="<?php echo $data['book_price']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_qty">Book Quanty</label>
                                            <input type="number" class="form-control" id="book_qty" name="book_qty" placeholder="Book Quanty" value="<?php echo $data['book_qty']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="available_qty">Book Available Quanty</label>
                                            <input type="number" class="form-control" id="available_qty" name="available_qty" placeholder="Book Available Quanty" value="<?php echo $data['available_qty']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="update_book" class="btn btn-primary" value="Update Book">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  </div>
            </div>
        </div>
    </div>
</div>
<?php  } ?>
<!-- Update Book -->
<?php

if (isset($_POST['update_book'])) {
    
     $id               = htmlentities($_POST['id']);
     $book_name               = htmlentities($_POST['book_name']);
     $book_author_name        = htmlentities($_POST['book_author_name']);
     $book_publication_name   = htmlentities($_POST['book_publication_name']);
     $book_purchase_date      = htmlentities($_POST['book_purchase_date']);
     $book_price              = htmlentities($_POST['book_price']);
     $book_qty                = htmlentities($_POST['book_qty']);
     $available_qty           = htmlentities($_POST['available_qty']);
   

         $book_query=" UPDATE books SET book_name='$book_name',book_author_name='$book_author_name',book_publication_name='$book_publication_name',book_purchase_date='$book_purchase_date',book_price='$book_price',book_qty='$book_qty',available_qty='$available_qty' WHERE id='$id' ";
        $result=mysqli_query($con,$book_query);
         if ($result) {?>
      
              <script type="text/javascript">
                alert('Book Update Succesfull!');
                javascript:history.go(-1);
              </script>

         <?php }else{ ?>
                <script type="text/javascript">
                alert('Book  Not Updated');
              </script>

        <?php }
            
}
?>
<!-- Modal Book Datails show -->
<?php
    
     $query="SELECT * FROM books";
    $run_query=mysqli_query($con,$query);
    while ($row=mysqli_fetch_assoc($run_query)) {
 ?>
<div class="modal fade" id="book-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Info </h4>
            </div>
            <div class="modal-body">
                <table class=" tabble table-bordered">
                     <tr class="row">
                        <td class="col-md-6">Book Name</td>
                        <td class="col-md-6"><?php echo $row['book_name'] ;  ?> </td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-6">Book Author</td>
                        <td class="col-md-6"><?php echo ucwords($row['book_author_name']) ;  ?> </td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-6">Publication Name</td>
                        <td class="col-md-6"><?php echo ucwords($row['book_publication_name']) ;  ?> </td>
                    </tr>
                    <tr class="row">
                       <th class="col-md-6">Book purchase Date</th>
                       <td class="col-md-6"> <?php echo ucwords($row['book_purchase_date']) ;  ?> </td>
                    </tr>
                    <tr class="row">
                        
                         <th class="col-md-6"> Book Price</th>
                        <td class="col-md-6"> <?php echo ucwords($row['book_price']) ;  ?> </td>
                    </tr>
                    <tr class="row">
                        
                         <th class="col-md-6">Book Quanty</th>
                        <td class="col-md-6"> <?php echo ucwords($row['book_qty']) ;  ?> </td>
                    </tr>
                    <tr class="row">
                        <th class="col-md-6">Available Quanty</th>
                        <td class="col-md-6"> <?php echo ucwords($row['available_qty']) ;  ?> </td>
                    </tr>
                     <tr class="row">
                        <th class="col-md-6">Book Image</th>
                        <td class="col-md-6">
                            <img width="300px" class="img-thumbnail img" height="300px" src="../uploads/books/<?php echo $row['book_image'] ;  ?>" alt="">
                        </td>
                    </tr>
                </table>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php  } ?>
 <!-- =-=-=-=-=-=-Content End=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php 
require_once('footer.php');
?>