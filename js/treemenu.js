function yuitreeInit() {
  var yuitree1 = new YAHOO.widget.TreeView("list-pages");
  var root = yuitree1.getRoot();
  if (YAHOO.widget.TreeView.nodeCount > 1) {
	  yuitree1.render();
	  if (yuitree1.getNodeByProperty("href", rawURL)) {
		  currentTreeNode = rawURL;
	  }
	  if (yuitree1.getNodeByProperty("href", cleanURL)) {
		  currentTreeNode = cleanURL;
	  }
	  if ( typeof(currentTreeNode) != 'undefined' ) {
		  syncTocUsingHref(currentTreeNode);
	  }
  }
  function syncTocUsingHref(currentHref) {
	currentNode = yuitree1.getNodeByProperty("href", currentHref)
	if ((currentNode) && (!currentNode.isRoot())) {
	  syncTocUsingNode(currentNode.parent);
	  currentNode.focus();
	}
  }
  
  function syncTocUsingNode(currentNode) {
	if ((currentNode) && (!currentNode.isRoot())) {
	  syncTocUsingNode(currentNode.parent);
	  currentNode.expand();
	}
  }
}
YAHOO.util.Event.onDOMReady(yuitreeInit);