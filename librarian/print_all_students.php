

<?php 

require_once('../include/Db.php');
require_once('../include/function.php');

$query=mysqli_query($con,"SELECT * FROM `students`");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Print All Student</title>
	<style>
		body{
			margin: 0;
			padding: 0;
			font-family: kalpurush;
		}
		.print_area{
			width: 750px;
			height: 500px;
			box-sizing: border-box;
			margin: 0 auto;
			page-break-after: always;
			background: #ddd;
			margin-bottom: 10px;
		}
		.header,.page_info{
			text-align: center;

		}
		.header h3{
			margin: 0;
		}
		.data_info table{
			width: 100%;
			border-collapse: collapse;

		}
		.data_info table  th,
		.data_info table td{
				border: 1px solid #555;
				padding: 4px;
				line-height: 1rem;
				text-align: center;
		}

		
	</style>
</head>
<body onload="window.print()" >

	<?php 

	$sn=1;
	$page=1;
	$per_page=30;
	$result=mysqli_num_rows($query);
	while ($data=mysqli_fetch_assoc($query)) { 
		
	if ($sn % $per_page==1) {
		echo page_header();
	}
			?>
				<tr>
					<td><?=  $sn ; ?></td>
					<td><?=  $data['fname'].' '. $data['lname']; ?></td>
					<td><?=  $data['phone'] ?></td>
					<td><?= $data['roll'] ; ?></td>
					<td><?= $data['reg'] ; ?></td>
					<td><?= $data['email'] ; ?></td>
					
				</tr>

			
				<?php if ($sn % $per_page==0 || $result==$per_page) {
					echo page_footer($page++);
			} $sn++;}?>
</body>
</html>
<?php

function page_header(){
	$data='<div class="print_area">
		<div class="header">
			<h3>IT Company</h3>
			<h3>Sarishbari , Jamalpur</h3>
		</div>
		<div class="data_info">
			<table class="table table-bordered"> 
				<tr>
					<th>S.N</th>
					<th>Student Name</th>
					<th>Phone Number</th>
					<th>Roll</th>
					<th>Registraion</th>
					<th>Email</th>
				</tr>';
	return $data;
}
function page_footer($page){
	$data='
			</table>
			<div class="page_info">Page:'.$page.'</div>
		</div>
	</div>';
	return $data;
}

?>