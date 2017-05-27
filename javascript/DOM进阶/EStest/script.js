window.onload = function(){
	var wrap = document.getElementById("wrap");
	var btn2 = document.getElementById("btn2");
	var btn3 = document.getElementById('btn3');
	var letgo = document.getElementById('goto');

	//注意指针，应该是this.node才行,才是指事件‘click’
	function getNodeInfo(){
		var e = eventUtil.getNode(this.node);
		alert(eventUtil.showNodeType(e) +'/'+ eventUtil.showNodeTarget(e));
		eventUtil.stopBubble(e);
	}
	function ThirdOne () {
		var e = eventUtil.getNode(this.node);
		alert("Hello,I'm the Third one!" + eventUtil.showNodeType(e));
		e.stopPropagation();
	}
	function boxInfo () {
		var e = eventUtil.getNode(this.node);
		alert('BOX的节点类型是：' + eventUtil.showNodeType(e));
	}
	function preventDefault () {
		var e = eventUtil.getNode(this.node);
		eventUtil.preventDefault(e);
		eventUtil.stopBubble(e);
	}
	//第三个参数必须使用参数，否则无法实现，好难过............
	eventUtil.addHandler(btn2,'click',getNodeInfo);
	//eventUtil.removeHandler(btn2,'click',getNodeInfo);
	eventUtil.addHandler(btn3,'click',ThirdOne);
	eventUtil.addHandler(wrap,'click',boxInfo);
	eventUtil.addHandler(letgo,'click',preventDefault);
};