<?php

$localhost="localhost";
$dbuser="root";
$dbpassword="";
$dbdatabase="LMS";

$con=mysqli_connect($localhost,$dbuser,$dbpassword,$dbdatabase);

mysqli_query($con,'SET CHARACTER SET utf8');
mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'");









?>