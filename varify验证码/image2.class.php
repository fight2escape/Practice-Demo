<?php 
/**
 * 将GD库相关操作封装成类
 */
class image {

	private $info;
	private $image;
	private $image_thumb;
	private $tWdith,$tHeight;

	public function __construct($src){

		if(isset($src)&&!empty($src)){

			$this->info = $this->getImgInfo($src);
			$this->image = $this->createImg($src,$this->info['type']);
			header("Content-Type:".$this->info['mime']);
		}
	}

	public function addTextMark($name,$text='Hello Bin',$size=20, $angle=0, $x=20, $y=20, $color=array(0,0,0),$alpha=50, $fontfile='./font/STCAIYUN.TTF'){

		$this->textMark($text,$size, $angle, $x, $y, $color,$alpha, $fontfile);
		$this->show();
		$this->save($name);
	}

	public function addImgMark($src,$name){

		$this->imgMark($src);
		$this->show();
		$this->save($name);
	}

	public function imageThumb($name,$time=0,$flag=2,$width=0,$height=0){

		$this->thumb($time,$width,$height);
		$this->show($flag);
		$this->save($name,$flag);

	}


	public function getImgInfo($src){

		$info = getimagesize($src);
		$info = array(
			'width' => $info[0],
			'height' => $info[1],
			'type' => image_type_to_extension($info[2],false),
			'mime' => $info['mime']
		);
		return $info;
	}

	public function createImg($src2,$type){

		$create = "imagecreatefrom".$type;
		$image = $create($src2);
		return $image;
	}

	public function textMark($text='Hello Bin',$size=20, $angle=0, $x=20, $y=20, $color=array(0,0,0),$alpha=50, $fontfile='./font/STCAIYUN.TTF' ){

		$color = imagecolorallocatealpha($this->image, $color[0], $color[1], $color[2], $alpha);
		imagettftext($this->image, $size, $angle, $x, $y, $color, $fontfile, $text);
	}

	public function imgMark($src){

		$waterInfo = $this->getImgInfo($src);
		$waterImg = $this->createImg($src,$waterInfo['type']);
		imagecopymerge($this->image, $waterImg, 0, 0, 0, 0, $waterInfo['width'], $waterInfo['height'], 50);
		imagedestroy($waterImg);
	}

	public function thumb($time=0,$width=0,$height=0){

		if($time!=0&&is_numeric($time)){
			$this->tWidth = $this->info['width']*$time;
			$this->tHeight = $this->info['height']*$time;
		}elseif($width!=0&&$height!=0){
			if(is_numeric($width)&&is_numeric($height)){
				$this->tWidth = $width;
				$this->tHeight = $height;
			}
		}else{
			$this->tWidth = 0;
			$this->tHeight = 0;
		}
		$this->image_thumb = imagecreatetruecolor($this->tWidth, $this->tHeight);
		imagecopyresampled($this->image_thumb, $this->image, 0, 0, 0, 0, $this->tWidth, $this->tHeight, $this->info['width'], $this->info['height']);

	}

	public function show($flag=1){

		$show = "image".$this->info['type'];
		if(2==$flag){
			$show($this->image_thumb);
		}else{
			$show($this->image);
		}
	}

	public function save($name,$flag=1,$path=null){

		$save = "image".$this->info['type'];
		if(null==$path){
			$path = './img/'.$name.'.'.$this->info['type'];
		}else{
			$path = $path.$name.'.'.$this->info['type'];
		}
		if(2==$flag){
			return $save($this->image_thumb,$path);
		}
		if(1==$flag){
			return $save($this->image,$path);
		}
	}

	public function __destruct(){

		if($this->image){
			imagedestroy($this->image);
		}
		if($this->image_thumb){
			imagedestroy($this->image_thumb);
		}
	}



}

?>