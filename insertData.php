<?php
            $sql = "SELECT * FROM table0;";
            $result = $conn->query($sql);
            if ($result === true) {
            echo "<script>console.log('Comments are loaded successfully')</script>";
            echo $result;
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

?>

