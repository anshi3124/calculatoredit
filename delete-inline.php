<?php

$id = $_GET['id'];

include 'config.php';

$sql = "DELETE FROM user_data WHERE id = {$id}";
$result = mysqli_query($con, $sql) or die("Query Unsuccessful.");
if ($sql === TRUE) {
    echo '<script type="text/javascript">
    Swal.fire({
      position: "top-end",
      icon: "data deleted successfully",
      title: "Your work has been saved",
      showConfirmButton: false,
      timer: 1500
    })
    </script>';
  }
  else{
    echo '<script type="text/javascript">
    Swal.fire({
      position: "top-end",
      icon: "data not deleted successfully",
      title: "Your work has been saved",
      showConfirmButton: false,
      timer: 1500
    })
    </script>';
  }
  
header("Location: http://localhost/calculatoredit/display.php");

mysqli_close($con);

?>
