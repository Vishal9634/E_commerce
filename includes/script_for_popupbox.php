<?php
    if(isset($_GET['result'])){
        $sts=$_GET['result'];
        if($sts=='already')
            echo "<script>alert('This product is already added into your cart...!');</script>";   
    }
?>