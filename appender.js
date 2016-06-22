function appender(baseNodeId, nodeId) {
    document.getElementById(baseNodeId).appendChild(document.getElementById(nodeId));
}

var comArr = [
new protoCom("PostersName0", "0mytextytextytextytextytextytextytext", 0),
new protoCom("PostersName1", "1mytextytextytextytextytextytextytext", 0),
new protoCom("PostersName2", "2mytextytextytextytextytextytextytext", 0),
new protoCom("PostersName3", "3mytextytextytextytextytextytextytext", 0),
new protoCom("PostersName4", "4mytextytextytextytextytextytextytext", 0),
];

function protoCom(poster, comText, comTree){
    this.id = document.getElementsByClassName("comment").length - 2;
    this.id2 = 0;
    this.poster = poster;
    this.comText = comText;
    this.comTree = comTree;
    this.gatherer = function () {
        var nodePoster = document.createElement("p");
        var nodeBr = document.createElement("b");
        nodePoster.appendChild(nodeBr);
        nodeBr.appendChild(document.createTextNode(this.poster));
        var nodeComText = document.createElement("blockquote");
        nodeComText.appendChild(document.createTextNode(this.comText));
        nodePoster.appendChild(nodeComText);
        nodePoster.setAttribute("class", "comment");
        //nodePoster.setAttribute("id", comTree);
        nodePoster.setAttribute("id", document.getElementsByClassName("comment").length - 2);
        //nodePoster.appendChild(documment.getElementById("testbutton"));
        //nodePoster.addEventListener("mouseenter", apB);
        return nodePoster;
    };
    this.postCom = function () {
        if (this.id < 6) {
                var cA = document.getElementsByClassName("comment");
                var anchorId2;
                if (document.getElementsByClassName("comment")[cA.length - 1].id == 'body00') { anchorId = 'body00'; anchorId2 = 0; }
                else { anchorId = this.id - 1; anchorId2 = anchorId; }
                document.getElementsByClassName("comment")[cA.length - 1].id
                document.getElementById(anchorId).appendChild(comArr[anchorId2].gatherer());
        } else alert("Comments limit has been reached");
    }
}