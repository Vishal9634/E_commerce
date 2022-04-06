
<?php
$country_id=$_POST['country_id'];
include_once('includes/connection.php');
$run_selected_contry=mysqli_query($con,"SELECT * FROM states WHERE country_id='$country_id'");
?>
<select id="ip_element" name="c_state" class="form-control" style="margin-bottom:10px;width:49%">
<option value="" selected="selected" disabled="disabled">Select your state</option>
<?php
while($rec=mysqli_fetch_array($run_selected_contry)){
    $state_name=$rec['name'];
  
    echo "<option>".$state_name."</option>";
}
?>
</select>