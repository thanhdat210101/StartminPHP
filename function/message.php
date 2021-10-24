<?php
function SuccessMessage($message){
    echo '<script type="text/javascript">
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "'.$message.'",
        showConfirmButton: false,
        timer: 1500
      }
      )</script>';
}
function ErrorMessage($message){
  echo '<script type="text/javascript">
  Swal.fire({
      position: "top-end",
      icon: "error",
      title: "'.$message.'",
      showConfirmButton: false,
      timer: 1500
    }
    )</script>';
}
?>