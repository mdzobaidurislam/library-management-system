<?php

function Redirect_to($location){

    header("location:".$location);
    exit();
    
}



?>