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
            <p class="comment" id="body01"> In the space below you are allowed to place some comments. You can also comment eisting comments up to 5 subcomments.</p>
            <p class="comment" id="body00">Comments are situated below</p>
            <!--<p id="demo" onclick="new protoCom().postCom()"><b>CLICKME</b></p>-->
        <div>
            <button id="testbutton" onclick="new protoCom().postCom()">Reply</button>
        </div>
            <?php //require "copyPaster.php";?>
            <!--<p onclick="appender('body1', 'commentBase')" >Click to append submitted comment</p>-->

        </div>

        <form id="insertForm" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <fieldset>
                <legend>Input your name(optional) and new comment</legend>
                Name: <br>
                <input type="text" name="posterName" value="Anonymous" onclick="this.value=''"><br>
                Comment: <br>
                <textarea name="customComment" id="customComment" style="height: 200px" required onclick="fitArea()">Write comment here.</textarea>
                <input type="submit" value="Send"><br>
            </fieldset>
        </form>

        
        <script>
            function fitArea() {
                var getFontSize = 16;
                document.getElementById("customComment").innerHTML = '';
                document.getElementById("customComment").style.width = Math.round(window.innerWidth * 0.45).toString() + "px";
                document.getElementById("customComment").style.height =
                 (Math.round((500 * getFontSize) / (Math.round(window.innerWidth * 0.45)) + 1) * getFontSize).toString() + "px";
            }
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
            /*function apB() {
            console.log('test')
            var butt = document.createElement("BUTTON");
            var buttNamae = document.createTextNode("Reply");
            butt.appendChild(buttNamae);
            butt.setAttribute("id", "testbutton")
            butt.addEventListener("click", function () { new protoCom().postCom() });
            return butt;
            };*/
            function apB(){
                this.appendChild(document.getElementById("testbutton"))
            }
            (function testButton() {
                var arr = document.getElementsByClassName("comment");
                for (i = 0; i < arr.length; i++) {
                    arr[i].addEventListener("mouseenter", apB);
                }
            })();
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
            <p onclick="alert('')" id="base255.0.0.0.0">accustomed</p>
        </div>
    </body>
</html>
