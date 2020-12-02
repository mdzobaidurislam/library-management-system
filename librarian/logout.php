<?php


session_start();

require_once('../include/function.php');

if (isset($_SESSION['libraian_login'])) {
		session_destroy();
        echo Redirect_to('login.php');
   }

  