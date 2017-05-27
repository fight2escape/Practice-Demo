//由于IE不支持getElementsByClassName，为了实现兼容，自定义一个兼容函数
function getByClass (rclass,parentId) { //一个类名，以及他的父节点id
	var oParent = parentId?document.getElementById(parentId):document,
		eles = [],
		elements = oParent.getElementsByTagName("*");
//将要取的类名的相关节点装在数组内
	for(var i=0;i<elements.length;i++){
		if(elements[i].className == rclass){
			eles.push(elements[i]);
		}
	}
	return eles;
}
//HTML加载完后，再执行
window.onload = drag;

function drag () {
	var oTitle = getByClass("login_logo_webqq","loginPanel")[0];
	oTitle.onmousedown = fnDown;
	//关闭按钮
	var close = document.getElementById("ui_boxyClose");
	close.onclick = function(){
		document.getElementById('loginPanel').style.display = 'none';
	}



	//下拉框的相关设置
	//首先，取各个元素
	var loginState = document.getElementById('loginState'), 	//这里是逗号
		stateList = document.getElementById('loginStatePanel'),
		stateTxt = document.getElementById('login2qq_state_txt'),
		loginStateShow = document.getElementById('loginStateShow'),
		lis = document.getElementsByTagName('li');				//分号别忘了

	//点击显示状态栏
	loginState.onclick = function(e){
		//为了实现兼容写得较复杂，以下为阻止冒泡，避免状态栏的显示冲突
		e = event || window.event;
		if(e.stopPropagation){
			e.stopPropagation();
		}else if(e.cancleBubble){
			e.cancleBubble = true;
		}
		stateList.style.display = 'block';
	}
	//为各个状态依次添加事件
	for(var i=0,l=lis.length;i<l;i++){
		//鼠标滑过、滑出时的背景设置
		lis[i].onmouseover = function(){
			this.style.background="#333";
		}
		lis[i].onmouseout = function(){
			this.style.background="#fff";
		}
		//点击之后的相关操作
		lis[i].onclick = function(e){

			e = event || window.event;
			if(e.stopPropagation){
				e.stopPropagation();
			}else if(e.cancleBubble){
				e.cancleBubble = true;
			}
			//选中后要隐藏状态栏
			stateList.style.display = 'none';
			//取得选中的标签的id
			var id = this.id;
			//再通过自定义的函数取得其子节点，别忘了这个“[0]”
			var lisInfo = getByClass('stateSelect_text',id)[0];
			//现在可以改变状态栏的显示内容了
			stateTxt.innerHTML = lisInfo.innerHTML;
			//更改类名时，第一个字符串最后需要加上空格，否则两个类名就连成一串了
			loginStateShow.className = 'login-state-show ' + id;
		}
	}
	//在窗口任意位置点击鼠标都能隐藏状态栏
	document.onclick = function(){
		stateList.style.display = 'none';
	}	
}

function fnDown(event){
	event = event ||window.event;  //为了与IE兼容，IE只支持window.event
	var oDrag = document.getElementById("loginPanel");
	//鼠标与边框的距离
	var disX = event.clientX - oDrag.offsetLeft;
	var disY = event.clientY - oDrag.offsetTop;
	//鼠标移动、离开的操作
	document.onmouseover = function(event){
		event = event || window.event;
		fnMove(event,disX,disY);
	}
	document.onmouseup = function(){
		document.onmouseover = null;
		document.onmouseup = null;
	}

}
//鼠标移动时，登录框相对移动的位置设置函数
function fnMove (event,posX,posY) {
	var oDrag = document.getElementById("loginPanel");
	//边框左上角应该在的位置
	var left = event.clientX - posX;
	var top = event.clientY - posY;
	//取窗口的宽高，为了兼容，写成如下
	var winW = document.documentElement.clientWidth || document.body.clientWidth;
	var winH = document.documentElement.clientHeight || document.body.clientHeight;
	//边框所能移动的最大距离
	var maxL = winW - oDrag.offsetWidth - 10;
	var maxH = winH - oDrag.offsetHeight;
	//为了让整个登录框始终保持在浏览器窗口中，当其越界时，再拉回来
	if(left<0){
		left = 0;
	}else if(left>maxL){
		left = maxL;
	}
	if(top<0){
		top = 10;
	}else if(top>maxH){
		top = maxH;
	}
 	//确定好坐标后，可以赋值了
	oDrag.style.left = left + 'px';
	oDrag.style.top = top + 'px';
}