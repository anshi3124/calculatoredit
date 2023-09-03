<?php
 include('header.php');
 include 'config.php';
 if(isset($_POST['update']))
 {
  $id=$_POST['id'];  
 $Name=$_POST['Name'];
 $numb1 = $_POST['numb1'];
 $numb2 = $_POST['numb2'];
 $operations = $_POST['operations'];
 $ans='';

if (is_numeric($numb1) && is_numeric($numb2)){
    switch ($operations) {
          case '1':
            $ans = $numb1 + $numb2;
           echo"<input readonly='readonly' name='result' value='$ans'>";
           $ans1=$ans;
            break;
          case '2': 
            $ans = $numb1 - $numb2;
            echo"<input readonly='readonly' name='result' value='$ans'>";
            $ans1=$ans;
            break;
          case '3':
            $ans = $numb1 * $numb2;
            echo"<input readonly='readonly' name='result' value='$ans'>";
            $ans1=$ans;
            break;
          case '4':
            $ans = $numb1 / $numb2;
            echo"<input readonly='readonly' name='result' value='$ans'>";
            $ans1=$ans;
            break;
            
     }
    }
 }

$sql =mysqli_query($con,"UPDATE user_data SET Name = '{$Name}', numb1 = '{$numb1}', numb2 = '{$numb2}',
operations='{$operations}',ans={$ans1} WHERE id = {$id}");
$result = mysqli_query($con, $sql);
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
header("Location:display.php");
 
mysqli_close($con);
?>