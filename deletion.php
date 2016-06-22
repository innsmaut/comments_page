<?php
     $delId = $_POST["delId"];
     $sql = "DELETE FROM $tablename WHERE id=$delId";
     if ($conn->query($sql) === true) {
     echo ("Comment deleted sucessfully");
     } else {
     echo ("Error: " . $sql . "<br>" . $conn->error);
     }
?>