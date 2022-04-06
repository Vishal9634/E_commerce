<div>
   <h1 style="text-align:center;margin-top:0px;font-weight:550;color:gray;font-family:Segoe UI,SegoeUI,Helvetica Neue,Helvetica,Arial,sans-serif;">Manage Your Account Here</h1>
</div>
<br><span style="color:red;padding:5px;font-weight:600;font-size:24px;text-decoration:underline;">Important !</span><br>
<?php
   $c_id=$customer['customer_id'];
   $pending_orders=mysqli_query($con,"SELECT * FROM customer_orders WHERE customer_id='$c_id' AND order_status='Pending'");
   $total_pending_orders=mysqli_num_rows($pending_orders);
   if($total_pending_orders>0){
        echo "
            <span style='color:green;padding:5px;font-size:20px;'>You have ($total_pending_orders) pending orders.</span><br>
            <span style='color:;padding:5px;font-size:20px;'>Or you can pay <a href=''>Offline now!</a></span><br>
        ";
    }else{
        echo "<span style='color:green;padding:5px;font-size:20px;'>You have no pending orders.</span><br>";
    }  
?>
<?php
    $get_orders=mysqli_query($con,"SELECT * FROM customer_orders WHERE customer_id='$c_id'");    
    if(mysqli_num_rows($get_orders)<=0){
        echo "<span style='color:green;padding:5px;font-size:20px;'>You have no any order...<a href='index.php' style='color:blue'>Continue Shopping</a></span><br>";
    }else{
?>
           <table class="table">
               <tr><th colspan="7" style="text-align:center;font-size:20px;background:#f5f7f9">All Order Details</th></tr>
                <tr>
                    <th>Order no.</th>
                    <th>Total products</th>
                    <th>Due pmount</th>
                    <th>Invoice no.</th>
                    <th>Order date</th>
                    <th>Paid/Unpaid</th>
                    <th>Status</th>
               </tr>
               <?php
                   $get_orders=mysqli_query($con,"SELECT * FROM customer_orders WHERE customer_id='$c_id'");
                   $order_no=1;
                   while($order=mysqli_fetch_array($get_orders)){
                       if($order['order_status']=='Pending') $status='Unpaid';
                       else $status='Paid';
               ?>
               <tr>
                    <td><?=$order_no;?></td>
                    <td><?=$order['total_products'];?></td>
                    <td><?=$order['due_amount'];?></td>
                    <td><?=$order['invoice_no'];?></td>                   
                    <td><?=$order['order_date'];?></td>
                    <td><?=$status;?></td>
                   <td><a href="confirm.php?order_id=<?=$order['order_id']?>">Confirm if paid</a></td>
               </tr>
                <?php $order_no++; ?>
               <?php } ?>
           </table>
        <?php } ?> 