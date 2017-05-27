window.onload=function(){
	var box=document.getElementById('divselect'),
	    title=box.getElementsByTagName('cite')[0],
	    menu=box.getElementsByTagName('ul')[0],
	    as=box.getElementsByTagName('a'),
      index=-1;
      n = as.length;

  function initLi () {
    for(var i=0,len=as.length;i<len;i++){
      as[i].style.background = '#fff';
    }
  }
   
    // 点击三角时
  title.onclick=function(event){
      // 执行脚本
    event = event || window.event;
    if(event.stopPropagation){
      event.stopPropagation();
    }else if(event.cancleBubble){
      event.cancleBubble = true;
    }
    menu.style.display = 'block';
    //鼠标 操作
    for(var i=0,len=as.length;i<len;i++){
      as[i].onmouseover = function(){
        for(var i=0,len=as.length;i<len;i++){
          as[i].style.background = '#fff';
        }
        this.style.background = '#bbb';
      }
      as[i].onmouseout = function(){
        this.style.background = '#fff';
      }
      as[i].onclick = function(event){;
        title.innerHTML = this.innerHTML;
      }
    }
    //键盘操作
    //上38，下40.console.log(event.keyCode);
    //别忘了event要传进来
//自己的算法略复杂，找时间跟着老师的改改
    document.onkeyup = function(event){
      if(event.keyCode==40){
        index = indexOf(++index,n);
        var index2 = indexOf(index-1,n);
        as[index].style.background = '#bbb';
        as[index2].style.background = '#fff';
      }else if(event.keyCode==38 && index!=-1){
        index = indexOf(--index,n);
        var index2 = indexOf(index+1,n);
        as[index].style.background = '#bbb';
        as[index2].style.background = '#fff';
      }else if(event.keyCode==38 && index==-1){
        index = indexOf(index,n);
        var index2 = indexOf(index+1,n);
        as[index].style.background = '#bbb';
        as[index2].style.background = '#fff';
      }else if(event.keyCode==13 && index!=-1){   //这里要注意，不能等于-1的时候选
        menu.style.display = 'none';
        title.innerHTML = as[index].innerHTML;
      }
    }
  }  
  function indexOf (ind,len) {
    ind = ind%len;
    if(ind<0){
      ind = len+ind;
    }
    return ind;
  }
    //在浏览器任意位置点击时收起下拉框
    document.onclick = function(){
      menu.style.display = 'none';
      index = -1;
      initLi();
    }

 }