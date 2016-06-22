<?php
require 'createDB.php'; 
if ($baseState == false) {
    die ('<b>No database available</b>');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <div id="commentsBlock">Custom text.
            <p class="comment" id="0"> In the space below you are allowed to place some comments. You can also comment eisting comments up to 5 subcomments.</p>
            <p class="comment" id="t1">Comments are situated below</p>
            <p class="comment" id="t2">here is test comment</p>
            <?php //require 'insertData.php'; ?>
        <div>
            <!--<button id="testbutton" onclick="this.parentNode.appendChild(document.getElementById('insertForm'))">Reply</button>-->
            <button id="testbutton" onclick="forPlusId()">Reply</button>
        </div>

        </div>

        <form  id="insertForm" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <fieldset>
                <legend>Input your name(optional) and new comment</legend>
                Name: <br>
                <input type="text" name="posterName" value="Anonymous" onclick="this.value=''"><br>
                <input type="hidden" name="parentId" value="0" id="setParent">
                Comment: <br>
                <textarea name="customComment" id="customComment" style="height: 100px; width: 450px" required onclick="this.innerHTML=''">Write comment here.</textarea>
                <input type="submit" value="Send" onclick="document.getElementById('1').appendChild(aNC().cloneNode())"><br>
            </fieldset>
        </form>

        
        <script>
            /*function fitArea() {
                var getFontSize = 16;
                document.getElementById("customComment").innerHTML = '';
                document.getElementById("customComment").style.width = Math.round(window.innerWidth * 0.45).toString() + "px";
                document.getElementById("customComment").style.height =
                 (Math.round((500 * getFontSize) / (Math.round(window.innerWidth * 0.45)) + 1) * getFontSize).toString() + "px";
            }*/
        </script>
        <script src="appender.js"></script>

        <script>
            function test1() {
                var level = document.getElementById("demo").parentNode.childNodes[1].id;
                var lMas = level.slice(4, level.length).split(".");
                for (i = 0; i > 5; i++) {
                    if (Number(lMas[i]) !== 0 && Number(lMas[i - 1]) !== 0) { lMas[i] = Number(lMas[i]) + 1 }
                }
                var levelNew = "base" + lMas.join(".");
                document.getElementById("demo").innerHTML = "The level is " + level + " and the new id is " + levelNew;
            }
        </script>


        <script>
            function aNC() {
                <?php 
                $ccom = $_POST['customComment'];
                $pname = $_POST['posterName'];
                $piD = $_POST['parentId'];
                echo "                
                var lpname = '$pname';
                var lccom = '$ccom';
                var lpiD = $piD;
                "?>
                var nodePoster = document.createElement("p");
                var nodeBr = document.createElement("b");
                nodePoster.appendChild(nodeBr);
                nodeBr.appendChild(document.createTextNode(""));
                var nodeComText = document.createElement("blockquote");
                nodeComText.appendChild(document.createTextNode(""));
                nodePoster.appendChild(nodeComText);
                nodePoster.setAttribute("class", "comment");
                nodePoster.setAttribute("id", lpiD + 1);
                nodeBr.innerHTML = lpname;
                nodeComText.innerHTML = lccom;
                return nodePoster;
            }
        </script>
            <script>
            <?php
                /*$ccom = $_POST['customComment'];
                $pname = $_POST['posterName'];
                $piD = $_POST['parentId'];
                echo "            
                function postMessage() {
                document.getElementById('$piD').appendChild(aNC);
            }";*/
            ?>
        </script>
        
        <p id="commentBase"> 
            <?php   
                $pname = $_POST['posterName'];
                echo "<b>$pname</b>";
                echo "<br>";
                $ccom = $_POST['customComment'];
                echo "$ccom";
            ?>
        </p>
        <div>
            <button id="testbutton2" onclick="this.parentNode.appendChild(aNC())">TimedReply</button>
        </div>

        <?php
            $posN = $_POST['posterName'];
            $cComm = $_POST['customComment'];
            $piD = $_POST['parentId'];
            /*$sql = "INSERT INTO $tablename (parid, name, messg) VALUES ('$piD', '$posN', '$cComm');";

            if ($conn->query($sql) === true) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }*/

            $sql = "SELECT * FROM $tablename";
            /*$result = $conn->query($sql)->fetch_assoc();
            echo $result['name'];
            if ($result === true) {
            echo "<script>console.log('Comments are loaded successfully')</script>";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }*/
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " Parent: " . $row["parid"]. " Name: " . $row["name"]. " Message: " . $row["messg"]. "<br>";
                }

            echo ('<br>');

            $sql = "SELECT * FROM $tablename ORDER BY parid, id";
            $result = $conn->query($sql);
            $len = $result->num_rows;
            for ($y=0;$y<$len;$y++){
                $row = $result->fetch_assoc();
                $parid[$y] = $row["parid"];
                $name[$y] = $row["name"];
                $messg[$y] = $row["messg"];
                $sid[$y] = $row["id"];
                echo "
                <ul id ='$sid[$y]' value='$parid[$y]' class='comment'>Author: $name[$y] Comment: $messg[$y]<br>BLOCK<br>BLOCK<br>BLOCK</ul>
                <script>
                    function fitall () {
                    document.getElementById($parid[$y]).appendChild(document.getElementById($sid[$y]));
                    };
                    fitall();
                </script>
                ";
                }
            /*echo "<script>
            (function(){
                for (i=1;i<$len+1;i++){
                    var paid = document.getElementById(i).getAttribute('value');
                    console.log(paid);
                    if (paid!==0){document.getElementById(paid).appendChild(document.getElementById(i));}else{console.log('false')}
                }
            })();</script>
            ";*/
            
            $conn->close();
        ?>

        <script>
            function forPlusId() {
                document.getElementById("testbutton").parentNode.appendChild(document.getElementById('insertForm'));
                var x = document.getElementById("testbutton").parentNode.id;
                document.getElementById('setParent').value = x;
            }
        </script>
        <script>
            function apB() {
                this.insertBefore(document.getElementById("testbutton"), this.childNodes[1])
            }

            (function testButton() {
                var arr = document.getElementsByClassName("comment");
                for (i = 0; i < arr.length; i++) {
                    arr[i].addEventListener("mouseenter", apB);
                }
            })();
          </script>
    </body>
</html>
