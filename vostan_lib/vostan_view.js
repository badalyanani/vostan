var charKeyE = 13;
var charKeyL = 37;
var charKeyU = 38;
var charKeyR = 39;
var charKeyD = 40;
var highlight;

$(document).keydown(function(e) {
    var nodes = {};
    var nodeEls = $("#viewTab").find("node");
    for (var i = 0; i < nodeEls.length; i++) {
        var tmp = window.vostan.getNodeByID(nodeEls[i].id)
        if (tmp) {
            tmp = tmp.attributes();
            var el = {};
            el.id = tmp.nodeID;
            el.cx = parseInt(tmp.left + tmp.width/2);
            el.cy = parseInt(tmp.top + tmp.height/2);
            nodes[tmp.nodeID] = el;
        }    
    }
    if (e.which == charKeyL || e.which == charKeyU || e.which == charKeyR || e.which == charKeyD) {
        resetActive();
    }
    if (e.which == charKeyE && highlight) {
        window.vostan.toggleRootByID(highlight.id);
    }

    function resetActive() {
        $("#viewTab").find("node").removeClass("active");
        if (!highlight) {
            var root = window.vostan.getRootID();
            $("#viewTab").find("#" + root).addClass("active");
            highlight = nodes[root];
        } else {
            var diff = 1000;
            var nextHighlight;

            for (var node in nodes) {
                var tmpHighlight = nodes[node];

                switch(e.which) {
                    case charKeyL:
                        console.log("Left");
                        var tmpdiff = Math.abs(tmpHighlight.cy - highlight.cy);
                        if (tmpHighlight.cx < highlight.cx && tmpdiff < diff && tmpHighlight.id != highlight.id) {
                            diff = tmpdiff; 
                            nextHighlight = tmpHighlight;
                        }
                        break;
                    case charKeyU:
                        console.log("Up");
                        var tmpdiff = Math.abs(tmpHighlight.cx - highlight.cx);
                        if (tmpHighlight.cy < highlight.cy && tmpdiff < diff && tmpHighlight.id != highlight.id) {
                            diff = tmpdiff; 
                            nextHighlight = tmpHighlight;
                        }
                        break;
                    case charKeyR:
                        console.log("Right");
                        var tmpdiff = Math.abs(tmpHighlight.cy - highlight.cy);
                        if (tmpHighlight.cx > highlight.cx && tmpdiff < diff && tmpHighlight.id != highlight.id) {
                            diff = tmpdiff; 
                            nextHighlight = tmpHighlight;
                        }
                        break;
                    case charKeyD:
                        console.log("Down");
                        var tmpdiff = Math.abs(tmpHighlight.cx - highlight.cx);
                        if (tmpHighlight.cy > highlight.cy && tmpdiff < diff && tmpHighlight.id != highlight.id) {
                            diff = tmpdiff; 
                            nextHighlight = tmpHighlight;
                        }
                        break;
                }
            }

            if (nextHighlight) {
                highlight = nextHighlight;
                $("#viewTab").find("#" + highlight.id).addClass("active");
            }
        }
    }
});

