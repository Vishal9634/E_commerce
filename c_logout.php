<?php
    session_start();
    
    unset($_SESSION['customer_email']);

    header('location:index.php?result=You have logged out successfully');


?>