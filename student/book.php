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
                        <div class="panel">
                            <div class="panel-content">
                                <form method="post" action="">
                                    <div class="row pt-md">
                                        <div class="form-group col-sm-9 col-lg-10">
                                                <span class="input-with-icon">
                                            <input type="text" name="search_book_name" class="form-control" id="lefticon" placeholder="Search" required>
                                            <i class="fa fa-search"></i>
                                        </span>
                                        </div>
                                        <div class="form-group col-sm-3  col-lg-2 ">
                                            <button type="submit" name="search_book" class="btn btn-primary btn-block">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="row">
                	<div class="col-md-12">

						<?php

						if (isset($_POST['search_book'])) {?>
							
						<div class="panel">
                            <div class="panel-content">
                    	      <div class="row">
                    		<?php
                    		$search_book_name=$_POST['search_book_name'];
                    			$books_show=mysqli_query($con,"SELECT * FROM `books` WHERE `book_name` LIKE '%$search_book_name%'");
                    				$tem=mysqli_num_rows($books_show);
                    				if ($tem > 0) { ?>
                    					<?php while ($data=mysqli_fetch_assoc($books_show)) { ?>
			                    		<div class="col-sm-3 col-md-2" >
			                    			<div class="books_box" style="overflow: hidden;">
			                    				<img width="100%" height="170px" src="../uploads/books/<?php echo $data['book_image']; ?>" alt="">
		                    				<br>
			                    				<p><?php echo $data['book_name']; ?></p>
			                    				<p><b>Available Quanty:</b><?php echo $data['available_qty']; ?> </p>
			                    			</div>
			                    		</div>
			                    	    <?php } ?>
                    				<?php }else{ 

                    						echo "<h1 class='text-center text-danger' >Book not found</h1>";
                    				}?>
		                    		
		                    	</div>
		                    </div>
		                </div>
						<?php }else{ ?>

						<div class="panel">
                            <div class="panel-content">
                    	      <div class="row">
                    		<?php
                    			$books_show=mysqli_query($con,"SELECT * FROM books");
                    			
		                    			while ($data=mysqli_fetch_assoc($books_show)) { ?>
		                    		<div class="col-sm-3 col-md-2" >
		                    			<div class="books_box" style="overflow: hidden;">
		                    				<img width="100%" height="170px" src="../uploads/books/<?php echo $data['book_image']; ?>" alt="">
	                    				<br>
		                    				<p><?php echo $data['book_name']; ?></p>
		                    				<p><b>Available Quanty:</b><?php echo $data['available_qty']; ?> </p>
		                    			</div>
		                    		</div>
		                    	    <?php } ?>
		                    	</div>
		                    </div>
		                </div>
					<?php } ?>
						

                		 
                	</div>
                </div>

 <!-- =-=-=-=-=-=-Content End=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php 
require_once('footer.php');
?>