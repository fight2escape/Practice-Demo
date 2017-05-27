//注释部分为优化，虽然代码和老师“差不多”，
//但是总是报错不能读取值为空的addEventListener，故保持原样
window.onload = function(){
	var getEle = function(id) {
		return document.getElementById(id);
	}

/*	function addEvent(element, event, callbackFunction) {
	    if (element.addEventListener) {
	        element.addEventListener(event, callbackFunction, false);
	    } else if (element.attachEvent) {
	        element.attachEvent('on' + event, callbackFunction);
	    }
	}
*/
		var t1 = document.getElementById('tooltip1'),
		t2 = document.getElementById('tooltip2'),
		t3 = document.getElementById('tooltip3'),
		t4 = document.getElementById('tooltip4'),
		t5 = document.getElementById('tooltip5'),
		t6 = document.getElementById('tooltip6');

	var isIE = navigator.userAgent.indexOf('MSIE') > -1;
	var tooltipClass = 'ttpbox';

	function showTooltip(obj,id,cont,width,height){
		if(!getEle(id)){
			var tooltipbox = document.createElement('div');
			tooltipbox.className = tooltipClass;
			tooltipbox.id = id;
			tooltipbox.innerHTML = cont;
			obj.appendChild(tooltipbox);
			tooltipbox.style.display = 'block';
			tooltipbox.style.width = width ? width +'px': 'auto';
			tooltipbox.style.height = height ? height + 'px': 'auto';

			if(!width && isIE){
				tooltipbox.style.left = tooltipbox.offsetWidth;
			}

			var left = obj.offsetLeft,
				top = obj.offsetTop + 16;///必须和文字大小一样，否则效果不明显
			var wid = tooltipbox.offsetWidth;
			var cwid = document.documentElement.clientWidth || document.body.clientWidth;
			/*console.log(left + '/' + wid + '/' + cwid);*/
			if((left+wid)>cwid){
				left = cwid - wid;
				if(left<0){
					left=0;
				}
			}
			tooltipbox.style.left = left +'px';
			tooltipbox.style.top = top +'px';
			obj.onmouseleave = function(){
				setTimeout(function(){
					tooltipbox.style.display = 'none';
				});
			}
			/*addEvent(obj,'mouseleave',function(){
				setTimeout(function(){
				tooltipbox.style.display = 'none';
				},150);
			});*/
			
		}else{
			getEle(id).style.display = 'block';
		}
	}

/*	addEvent(getEle('demo'),'mouseover',function(e){
		var event = e || window.event;
		var target = event.target || event.srcElement;

		if(target.className == 'tooltip'){
			var html_;
			var width_;
			var id_;

			switch(target.id){
				case 'tooltip1':
					html_ = '中华人民共和国';
					id_ = 't1';
					break;
				case 'tooltip2':
					html_ =  '美国篮球职业联赛';
					id_ = 't2';
					break;
				case 'tooltip3':
					html_ = '<h2>春晓</h2><p>春眠不觉晓,</p><p>处处闻啼鸟。</p><p>夜来风雨声,</p><p>花落知多少。</p>';
					id_ = 't3';
					break;
				case 'tooltip4':
					html_ = '<div id="pic"><img src="1.jpg" /></div>';
					id_ = 't4';
					break;
				case 'tooltip5':
					html_ = '<div id="mycont"><img src="2.jpg" /><h3>我的昵称</h3><p>我的简介，可以有很多</p></div>';
					id_ = 't5';
					break;
				case 'tooltip6':
					html_ =	'<iframe src="http://www.imooc.com/" width="500" height="400"></iframe>';				
					id_ = 't6';
					width_ = 522;
					break;		
				default:
					return false;	
			}
			showTooltip(target,id_,html_,width_);
		}
	});*/
	t1.onmouseenter = function(){	
		var _html = '中华人民共和国';
		showTooltip(this,'t1',_html);[]
	}
	t2.onmouseenter = function(){
		var _html = '美国篮球职业联赛';
		showTooltip(this,'t2',_html);
	}
	t3.onmouseenter = function(){
		var _html = '<h2>春晓</h2><p>春眠不觉晓,</p><p>处处闻啼鸟。</p><p>夜来风雨声,</p><p>花落知多少。</p>';
		showTooltip(this,'t3',_html);
	}
	t4.onmouseenter = function(){
		var _html = '<div id="pic"><img src="1.jpg" /></div>';
		showTooltip(this,'t4',_html);
	}
	t5.onmouseenter = function(){
		var _html = '<div id="mycont"><img src="2.jpg" /><h3>我的昵称</h3><p>我的简介，可以有很多</p></div>';
		showTooltip(this,'t5',_html);
	}
	t6.onmouseenter = function(){
		var _html = '<iframe src="http://www.imooc.com/" width="500" height="400"></iframe>';
		showTooltip(this,'t6',_html,522);
	}

};