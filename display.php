<?php 
include('header.php');

include ('config.php');

if(isset($_POST['submit']))
 {        
$Name = $_POST['Name'];
$numb1 = $_POST['numb1'];
$numb2 = $_POST['numb2'];
$operations = $_POST['operations'];
$ans='';

if (is_numeric($numb1) && is_numeric($numb2)){
switch ($operations) {
      case '1':
        $ans = $numb1 + $numb2;
       echo"<input readonly='readonly' name='result' value='$ans'>";
        break;
      case '2': 
        $ans = $numb1 - $numb2;
        echo"<input readonly='readonly' name='result' value='$ans'>";
        break;
      case '3':
        $ans = $numb1 * $numb2;
        echo"<input readonly='readonly' name='result' value='$ans'>";
        break;
      case '4':
        $ans = $numb1 / $numb2;
        echo"<input readonly='readonly' name='result' value='$ans'>";
        break;
        
 }
}


 $sql = mysqli_query($con,"INSERT INTO User_data(Name,numb1,numb2,operations,ans) VALUES ('$Name',
  '$numb1','$numb2','$operations','$ans')");
  if ($sql === TRUE) {
    echo '<script type="text/javascript">
     Swal.fire({
       position: "center",
       icon: "success",
       title: "data  inserted successfully",
       showConfirmButton: false,
       timer: 1500
     })
     </script>';
 } else {
     echo '<script type="text/javascript">
     Swal.fire({
       position: "top-end",
       icon: "success",
       title: "data not inserted successfully",
       showConfirmButton: false,
       timer: 1500
     })
     </script>';
 }
}
 ?>
 <div id="main-content">
 <h2>All Records</h2>
   <?php
   //$page = 0 ;
   $limit = 4;
   $page = 0;
   
   if(isset($_GET['page']) && $_GET['page']!=""){
    $page = $_GET['page'];
   } else{
   $page = 1;
   }
   $offset = ($page - 1) * $limit;

   $sql = "SELECT * FROM user_data JOIN operations WHERE user_data.operations 
   = operations.operations_id LIMIT {$offset},{$limit} ";
   $result = mysqli_query($con, $sql) or die("Query Unsuccessful.");

   if(mysqli_num_rows($result) > 0)  {
    ?>
     <table cellpadding="7px">
     <thead>
     <th>s.no</th>
     <th>Name</th>
     <th>numb1</th>
     <th>numb2</th>
     <th>operations</th>
     <th>ans</th>
     <th>action</th>
     </thead>
     <tbody>
       <?php
          $i = 0;
         while($row = mysqli_fetch_assoc($result)){
        
       ?>
         <tr>
             <td><?php echo ++$i; ?></td>
             <td><?php echo $row['Name']; ?></td>
             <td><?php echo $row['numb1']; ?></td>
             <td><?php echo $row['numb2']; ?></td>
             <td><?php echo $row['operations_name']; ?></td>
             <td><?php echo $row['ans'];?></td>
             <td>
                 <a href='../calculatoredit/update.php ?id=<?php echo $row['id']; ?>'>Edit</a>
                 <a href='../calculatoredit/delete-inline.php ?id=<?php echo $row['id']; ?>'>Delete</a>
             </td>
         </tr>
       <?php } ?>
     </tbody>
 </table>
 <?php }else{
 echo "<h2>No Record Found</h2>";
 }

$sql1 = "SELECT * FROM user_data";
$result1 = mysqli_query($con,$sql1)or die("query failed");
if(mysqli_num_rows($result1) > 0){

  $total_record = mysqli_num_rows($result1);
  
  $total_page = ceil($total_record/ $limit);

  echo'<ul class= "pagination admin-pagination">';

  if($page > 1){
   echo '<li><a href="display.php?page='.($page - 1).'">Prev</a></li>';
   }
  for($i = 1 ; $i <= $total_page; $i++){
    if ($i == $page){
    $active = "active";
   }else {
    $active = "";
  }
    
    echo'<li class= "'.$active.'"><a href="display.php?page='.$i.'">'.$i.'</a></li>';
  }
   if($total_page > $page){
   echo '<li><a href="display.php?page='.($page + 1).'">Next</a></li>';
   }
  echo '</ul>';
}
        mysqli_close($con);
 ?>
 </body>
 </div>
 </div>
 </html>
  


    

       
        
