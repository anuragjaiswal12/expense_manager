<?php
    $con=mysqli_connect("localhost","root","","expense_manager");
    if(!$con){
        echo "Failed to connect to MySQL".mysqli_connect_error();
    }
?>