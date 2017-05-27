window.onload = function(){	//onload在页面元素都加载好了以后再执行此js
	//获取个元素对象
	var box = document.getElementById("wrap");
	var imgs = box.getElementsByTagName("img");
	//设置各个图片宽度
	var imgWidth = imgs[0].offsetWidth;
	var exposeWidth = 160;
	//设置容器宽度
	var boxWidth = imgWidth + (imgs.length - 1) * exposeWidth;
	box.style.width = boxWidth + 'px';
	//设置各个图片初始位置
	function setImgsPos () {
		for(var i=1; i<imgs.length; i++){
			var imgLeft = imgWidth + exposeWidth * (i-1);
			imgs[i].style.left = imgLeft + "px";
		}
	}
	//首先初始化
	setImgsPos();
	//设置鼠标经过时，图片所要移动的距离
	var slideWidth = imgWidth - exposeWidth;
	for(var i=0,len=imgs.length; i < len; i++){
		//（function（x）{}）（X）；是立即调用的意思，这个没见过，回头看看
		(function(i){
			imgs[i].onmouseover = function(){
				//初始化，很重要的一步
				setImgsPos();   
				for(var j=1;j<=i;j++){
				//设置打开门，最后的PX别忘了，不然实现不了
					imgs[j].style.left = parseInt(imgs[j].style.left) - slideWidth + "px";
				}
			}; 
		})(i);
	}
};
