<?php
/*$sql = "SET FOREIGN_KEY_CHECKS=0;";
$conn->query($sql);
$sql = "INSERT INTO $tablename (parid, name, messg) VALUES ('$piD', '$posN', '$cComm');";
if ($conn->query($sql) === true) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}*/

if($piD==1){$selfid = $piD;}else{$selfid = $piD+1;};
$sql = "INSERT INTO $tablename (id, parid, name, messg) VALUES ('$selfid', '$piD', '$posN', '$cComm');";
if ($conn->query($sql) === true) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
/*$sql = "SET FOREIGN_KEY_CHECKS=1;";
$conn->query($sql);*/

?>
