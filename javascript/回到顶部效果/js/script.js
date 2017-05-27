window.onload = function(){
	var btn=document.getElementById('btn');
	var timer=null;
	var stopBtn = document.getElementById('stop');
	var noStop = true;
	var clientHeight = document.documentElement.clientHeight || document.body.clientHeight;
	btn.onclick =  function(event){
		event = event || window.event;
		if(event.stopPropagation){
			event.stopPropagation;
		}else if(event.cancleBubble){
			event.cancleBubble=true;
		}
		timer =  setInterval(function(){
			var disTop=document.documentElement.scrollTop || document.body.scrollTop;
			var mySpeed=disTop/5;
			noStop = true;////////////////////还有这里，跟下面的注释一伙
			document.documentElement.scrollTop = document.body.scrollTop = disTop-mySpeed;
			if(disTop<=0){
				clearInterval(timer);
			}
		},30);
	};
	window.onscroll = function(){
		var scrDis = document.documentElement.scrollTop || document.body.scrollTop;
		if(scrDis>=clientHeight){
			btn.style.display = 'block';
		}else{
			btn.style.display = 'none';
		}
	//为什么如下设置就能人为终止滚动条计时器？？？？？？？？？？？？？？
		if(!noStop){
			clearInterval(timer);
		}
		noStop = false;
		
	};
}