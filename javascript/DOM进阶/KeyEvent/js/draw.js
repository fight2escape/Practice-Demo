//定义一个数组，来装抽奖内容
var data = ['8000RMB','爱疯7s','ipad-air','MacBook5','Galexy-8','世界环游100天',
			'辣条1万包','棒棒糖1支','体验老板生活一天','倚天剑2把','最强王者称号',
			'3DMax电影票0张','再抽一次','今天没钱坐公交','程序猿最帅','注孤生'];
var timer = null;
var flag = true;
window.onload = function(){
	var play = document.getElementById('play'),
		stop = document.getElementById('stop');
	play.onclick = playFun;
	//还没有要用的函数就先不要写上去，否则会报错
	stop.onclick = stopFun;

	//键盘事件
	document.onkeyup = function(e){
		e = event || window.event;
		//F5刷新BUG，其ASCII代号为116
		//Enter代号为13
		if(e.keyCode == 13 && flag){
			stopFun();
			flag = false;
		}else if(e.keyCode ==116){
			
		}else{
			playFun();
			flag = true;
		}
	}

}
function playFun () {
	flag = true;
	var play = document.getElementById('play'),
		title = document.getElementById('title'),
		stop = document.getElementById('stop');
	play.style.background = '#ccc';
	stop.style.background = 'red';
	title.style.color = '#fff';
	title.style.background = 'orange';
	title.style.fontWeight = 'thin';
	clearInterval(timer);
	timer = setInterval(function(){
		var random = Math.floor(Math.random()*16);
		title.innerHTML = data[random];
	},50);

}
function stopFun () {
	flag = false;
	var play = document.getElementById('play'),
		title = document.getElementById('title'),
		stop = document.getElementById('stop');

	play.style.background = '#f00';
	stop.style.background = '#aaa';
	title.style.border = "6px solid orange";
	title.style.fontWeight = "bold";
	title.style.background = '#f00';
	clearInterval(timer);

}