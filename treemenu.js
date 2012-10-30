var tree;
function treeInit() {
    tree = new YAHOO.widget.TreeView('.menu-testers-3-container');
    //tree.render();
}
YAHOO.util.Event.onDOMReady(treeInit);