<div id="main-content">
    <h2>Update Record</h2>
    <?php
    include ('header.php');
    include 'config.php';


    $id = $_GET['id'];

    $sql = "SELECT * FROM user_data WHERE id = {$id}";
    $result = mysqli_query($con, $sql) or die("Query Unsuccessful.");

    if(mysqli_num_rows($result) > 0)  {
      while($row = mysqli_fetch_assoc($result)){
    ?> 

    <form class="POST-form" action="updatedata.php" method="POST">
     <div class="form-group">
<input type="hidden" name="id"  value=<?php echo $row['id']?> />
</div>
      <div class="form-group">
    <label>Name:</label>
<input type="text" name="Name" value=<?php echo $row['Name']?> />
</div>
       <div class="form-group">
    <label for="num_input">Enter the numbers:</label>
<p>First Value:<br/>
<input type="number" id="first" name="numb1"value=<?php echo $row['numb1']?>></p>
<p>Second Value:<br/>
<input type="number" id="second" name="numb2" value=<?php echo $row['numb2']?>></p>
</div>

      <div class="form-group">
  <label>operations:</label>
  <?php
  $sql1 = "SELECT * FROM  operations"; 
  $result1= mysqli_query($con,$sql1) or die("query unsuccessfull.");
  if(mysqli_num_rows($result1) > 0)  {
    echo "<select name='operations'>";
  while($row1 = mysqli_fetch_assoc($result1)){
    if($row['operations'] == $row1['operations_id']){
      $select = "selected";
    }
    else{
      $select = "";
    }
  echo "<option {$select} value='{$row1['operations_id']}'>{$row1['operations_name']}</option>";
  }
  echo "</select>";
   }
    ?>
   
</div><br>
      <div class = "form-group">
    <label>calculate:</label>
<input type="submit" name="update" value="update">

</div>
</form>
      <?php 
      }
    }
    ?> 
</div>
</div>
</body>
</html>
