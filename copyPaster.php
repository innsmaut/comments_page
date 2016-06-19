<?php

     $pname = $_POST['posterName'];
     $ccom = $_POST['customComment'];

     echo "<p id='defaultId'>
            <p><b>$pname</b> 
            <br> 
            $ccom</p>
            <button onlick='addComButt()' >Reply</button>
           </p>
     ";




?>


