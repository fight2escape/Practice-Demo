window.onload = function(){
	var demo = document.getElementById('demo'),
		mask = document.getElementById('mask'),
		exp  = document.getElementById('exp'),
		expimg = document.getElementById('expimg');

	var demoWidth = demo.offsetWidth;
	var demoHeight = demo.offsetHeight;
	var demoLeft = demo.offsetLeft;
	var demoTop = demo.offsetTop;
	var expWidth = exp.offsetWidth;
	var expHeight = exp.offsetHeight;

	demo.onmousemove = function(e){
		showMask(e);

	};
	demo.onmouseover = function(){
		mask.style.display = 'block';
		exp.style.display =  'block';
	}
	demo.onmouseout = function(){
		mask.style.display = 'none';
		exp.style.display = 'none';
	}

	function showMask (eve) {
		//要先使display为block才能用offset获取到相应宽高
		
		var maskWidth = mask.offsetWidth;
		var maskHeight = mask.offsetHeight;

		var event = eve || window.event;
		var mousePx = event.clientX;
		var mousePy = event.clientY;

		var maskLeft,maskTop;
		var expLeft,expTop;
		/*console.log('mousePxPy:'+ mousePx +'///'+ mousePy);*/
		//设置遮罩层位置
		maskLeft = mousePx - demoLeft - maskWidth/2;
		maskTop  = mousePy - demoTop - maskHeight/2 +10;
		/*console.log('maskLeft&Top:' + maskLeft +'///'+ maskTop);
		console.log('demoLeft&Top:' + demoLeft +'///'+ demoTop);
		console.log('maskW&H:' + maskWidth +'///'+ maskHeight);*/
		var maxLeft = demoWidth - maskWidth;
		var maxTop  = demoHeight - maskHeight;
		if(maskLeft<0)maskLeft=0;
		if(maskTop<0)maskTop=0;
		if(maskLeft>maxLeft)maskLeft=maxLeft;
		if(maskTop>maxTop)maskTop=maxTop;
		mask.style.left = maskLeft +'px';
		mask.style.top = maskTop +'px';
		mask.style.display = 'block';

		expimg.style.left = -maskLeft*2.56 +'px';
		expimg.style.top = -maskTop*2.56 +'px';
	}


};