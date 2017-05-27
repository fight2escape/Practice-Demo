window.onload = function(){
	var loginBtn = document.getElementById('login'),
		hide	 = document.getElementById('hide'),
		logWin	 = document.getElementById('logwin'),
		close	 = document.getElementById('close');

	loginBtn.onclick = function(event){
		event = event || window.event;
		var clWidth = document.documentElement.clientWidth || document.body.clientWidth,
			clHeight = document.documentElement.clientHeight || document.body.clientHeight,
			logWidth = 670,
			logHeight = 380,
			logleft = (clWidth-logWidth)/2,
			logtop = (clHeight-logHeight)/2;
			console.log(logWin.offsetLeft +'/'+ logWin.offsetTop);

		logWin.style.left = logleft + 'px';
		logWin.style.top  = logtop + 'px';
		logWin.style.display = 'block';
		hide.style.display = 'block';
	}
	hide.onclick = close.onclick = function(){
		 logWin.style.display =  'none';
		 hide.style.display = 'none';
	}



};