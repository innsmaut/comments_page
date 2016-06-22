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
        <div id="testbutton">
            <button onclick="forPlusId()">Reply</button>
            <form  method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <input type="hidden" name="delId" value="0" id="delId">
                <input type="submit" onmouseover="document.getElementsByName('delId')[0].id = document.getElementById('testbutton').parentNode.id" value="Delete">
                <!--<button onclick="<?php //require 'deletion.php'; ?>">Delete</button>-->
            </form>
        </div>
        </div>
        <div hidden>
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
        </div>
        
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
        

        <?php
            $posN = $_POST['posterName'];
            $cComm = $_POST['customComment'];
            $piD = $_POST['parentId'];
            $sql = "INSERT INTO $tablename (parid, name, messg) VALUES ('$piD', '$posN', '$cComm');";

            if ($conn->query($sql) === true) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

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
                <ul id ='$sid[$y]' value='$parid[$y]' class='comment'>Author: $name[$y] Comment: $messg[$y]</ul>
                <script>
                    function fitall () {
                    document.getElementById($parid[$y]).appendChild(document.getElementById($sid[$y]));
                    };
                    fitall();
                </script>
                ";
                }
            $conn->close();
        ?>

        <script>
            function forPlusId() {
                document.getElementById("testbutton").parentNode.insertBefore(document.getElementById('insertForm'), document.getElementById("testbutton").parentNode.childNodes[1]);
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
