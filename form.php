<?php include('header.php');
include ('config.php');
?>
<div id="main-content">
<form class= "POST-form" method="POST" action="display.php">
<div class="form-group">
<label>Name:</label>
<input type="text" name="Name" class="formin" />
</div>
<div class="form-group">
<label for="num_input"class="a1">Enter the numbers:</label>
<p>First Value:</p>
<input type="number" id="first" name="numb1"value="" class="formnum">
<p>Second Value:</p>
<input type="number" id="second" name="numb2" value="" class="formnum">
</div>
<div class="form-group">
<label>operations:</label>
<select name="operations">
<option value=""selected disabled>operators</option>
<?php 
$sql= "select * from operations"; 
$result= mysqli_query($con,$sql) or die("query unsuccessfull.");
while($row = mysqli_fetch_assoc($result)){
?>
<option value="<?php echo $row['operations_id'];?>"><?php echo $row['operations_name'];?></option>
<?php } ?>
</select>   
</div><br>
<div class = "form-group">
<label>calculate:</label>
<input type="submit" name="submit" value="submit" class="submit">

</div>
</form>
</body>
</html>
