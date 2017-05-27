window.onload =  function(){
	var closeBtn = document.getElementById('closeBtn'),
		showAd	 = document.getElementById('showAd'),
		wholeAd	 = document.getElementById('wrapAd');

	function show(obj){
		obj.style.display = 'block';
	}
	function hide(obj){
		obj.style.display = 'none';
	}

	closeBtn.onclick = function(){
		hide(wholeAd);
		show(showAd);
	}
	showAd.onclick = function(){
		hide(showAd);
		show(wholeAd);
	}
}