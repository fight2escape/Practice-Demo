window.onload = function(){
	var topAd = document.getElementById('topAd'),
		adImg = document.getElementById('adImg'),
		showAd = document.getElementById('showAd'),
		closeBtn = document.getElementById('close');
	//广告下拉
	setTimeout(function(){
		var timer = setInterval(function(){
			var speed = 10;
			var height = topAd.offsetHeight + speed;
			if(height>385){
				clearInterval(timer);
				upTheAd();
			}
			topAd.style.height = height +'px';
		},20);

	},1500);
	//广告 上拉
	function upTheAd () {
		setTimeout(function(){
			var timer = setInterval(function(){
				var speed = topAd.offsetHeight/50;
				var height = topAd.offsetHeight - speed;
				if(height<=68){
					clearInterval(timer);
					adImg.style.display = 'none';
					showAd.style.display= 'block';
				}
				topAd.style.height = height +'px';
			},20);
		},3000);
	}
	closeBtn.onclick =  function(){
		showAd.style.display =  'none';
		var timer = setInterval(function(){
			height = topAd.offsetHeight - 5;
			if(height<=0){
				clearInterval(timer);
				topAd.style.height = 0 +'px';
			}
			topAd.style.height = height +'px';
		},20);
	}

}