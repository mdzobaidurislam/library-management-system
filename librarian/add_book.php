<?php 
require_once('header.php');


if (isset($_POST['add_book'])) {
    
     $book_name               = htmlentities($_POST['book_name']);
     $book_author_name        = htmlentities($_POST['book_author_name']);
     $book_publication_name   = htmlentities($_POST['book_publication_name']);
     $book_purchase_date      = htmlentities($_POST['book_purchase_date']);
     $book_price              = htmlentities($_POST['book_price']);
     $book_qty                = htmlentities($_POST['book_qty']);
     $available_qty           = htmlentities($_POST['available_qty']);
    echo $libraian_username       =$_SESSION['libraian_username'];

     // Book Image 
     $book_image_name         = $_FILES['book_image']['name'];
     $explode                 = explode('.',$book_image_name);
     $book_image_extention    = end($explode);
     $create_image_name       = date('Ymdhis').'.'.$book_image_extention;

    // validation 
       $input_error=array();
      if (empty($book_name)) {
          $input_error['book_name']=" Book name is required.";
      }
      if (empty($book_author_name)) {
          $input_error['book_author_name']="Author name is required.";
      }
      if (empty($book_publication_name)) {
          $input_error['book_publication_name']="Publication name is required.";
      }
      if (empty($book_purchase_date)) {
          $input_error['book_purchase_date']="Book purchase date is required.";
      }
      if (empty($book_price)) {
          $input_error['book_price']="Book price is required.";
      }
      if (empty($book_qty)) {
          $input_error['book_qty']="Book quanty is required.";
      }

      if (empty($available_qty)) {
          $input_error['available_qty']="Book available quanty is required.";
      }

      if (count($input_error)===0) {

         $book_query="INSERT INTO books (book_name, book_image, book_author_name, book_publication_name, book_purchase_date, book_price, book_qty, available_qty, libraian_username) VALUES ('$book_name','$create_image_name','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$available_qty','$libraian_username')";
        $book_run_query=mysqli_query($con,$book_query);
            if ($book_run_query) {
                move_uploaded_file($_FILES['book_image']['tmp_name'] , '../uploads/books/'.$create_image_name);
                  $smsg="Book Add successfull!";
              }else{
                $emsg="Something wrong?Try Again !";
              }

      }

   


}


?>
 <!-- =-=-=-=-=-=-Content Start Body=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Add Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
             <div class="row animated ">
                <div class="col-sm-12 col-md-6 col-md-offset-3">
                    <h2 class="section-subtitle text-center"><b>Add</b> book</h2>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <!-- =-=-=-=-Massages  start===== -->
                                <div class="col-md-12">
                                <?php
                                    if (isset($smsg)) {?>
                                    <div class="alert alert-success fade in">
                                        <a href="#" class="close" data-dismiss="alert">×</a>
                                        <?php echo $smsg;?>
                                    </div>
                                  <?php  }
                                ?>
                                <?php
                                    if (isset($emsg)) {?>
                                    <div class="alert alert-danger fade in">
                                        <a href="#" class="close" data-dismiss="alert">×</a>
                                        <?php echo $emsg;?>
                                    </div>
                                  <?php  }
                                ?>
                                </div>
                                <!-- =-=-=-=-Massages  end===== -->
                                <div class="col-md-12">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                                        <h5 class="mb-md ">Add Book</h5>
                                        <div class="form-group">
                                            <label for="book_name">Book Name</label>
                                            <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name" value="<?= isset($book_name) ? $book_name:'' ; ?>">
                                            <?php if(isset($input_error['book_name'])){ echo $input_error['book_name'];} ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_name">Book Image</label>
                                            <input type="file" class="form-control" id="book_image" name="book_image" placeholder="Book Name" value="<?= isset($book_image) ? $book_image:'' ; ?>">
                                            <?php if(isset($input_error['book_image'])){ echo $input_error['book_image'];} ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="book_author_name">Book Author</label>
                                            <input type="text" class="form-control" id="book_author_name" name="book_author_name" placeholder="Book Author name" value="<?= isset($book_author_name) ? $book_author_name:'' ; ?>">
                                            <?php if(isset($input_error['book_author_name'])){ echo $input_error['book_author_name'];} ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_publication_name">Book Publication Name</label>
                                            <input type="text" class="form-control" id="book_publication_name" name="book_publication_name" placeholder="Book Publication Name" value="<?= isset($book_publication_name) ? $book_publication_name:'' ; ?>">
                                            <?php if(isset($input_error['book_publication_name'])){ echo $input_error['book_publication_name'];} ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchase_date">Book Purchase Date</label>
                                            <input type="date" class="form-control" id="book_purchase_date" name="book_purchase_date" placeholder="Book Purchase Date" value="<?= isset($book_purchase_date) ? $book_purchase_date:'' ; ?>">
                                            <?php if(isset($input_error['book_purchase_date'])){ echo $input_error['book_purchase_date'];} ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_price">Book Price</label>
                                            <input type="number" class="form-control" id="book_price" name="book_price" placeholder="Book Price" value="<?= isset($book_price) ? $book_price:'' ; ?>">
                                            <?php if(isset($input_error['book_price'])){ echo $input_error['book_price'];} ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_qty">Book Quanty</label>
                                            <input type="number" class="form-control" id="book_qty" name="book_qty" placeholder="Book Quanty" value="<?= isset($book_qty) ? $book_qty:'' ; ?>">
                                            <?php if(isset($input_error['book_qty'])){ echo $input_error['book_qty'];} ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="available_qty">Book Available Quanty</label>
                                            <input type="number" class="form-control" id="available_qty" name="available_qty" placeholder="Book Available Quanty" value="<?= isset($available_qty) ? $available_qty:'' ; ?>">
                                            <?php if(isset($input_error['available_qty'])){ echo $input_error['available_qty'];} ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="add_book" class="btn btn-primary" value="Add Book">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

 <!-- =-=-=-=-=-=-Content End=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php 
require_once('footer.php');
?>