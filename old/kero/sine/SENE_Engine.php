<?php
class SENE_Engine{
  protected static $__instance;
	var $notfound=NOTFOUND_CONTROLLER;
	var $default=DEFAULT_CONTROLLER;
	public function __construct(){
		require_once SENEKEROSINE."/SENE_Controller.php";
		require_once SENEKEROSINE."/SENE_Model.php";
		self::$__instance = $this;
	}
  public static function getInstance(){
    return self::$_instance;
  }
	public function SENE_Engine(){
		$this->newRouteFolder();
	}
	private function defaultController(){
		$cname = $this->default."";
		include SENECONTROLLER.$this->default.".php";
		$cname = new $cname();
		$cname->index();
	}
	private function notFound(){
		$cname = $this->notfound."";
		include SENECONTROLLER.$this->notfound.".php";
		$cname = new $cname();
		$cname->index();
	}
	private function newRouteFolder(){
		$found=0;
		$sene_method = $GLOBALS['sene_method'];
		if(isset($_SERVER[$sene_method])){
			$path=$_SERVER[$sene_method];
			$path=explode("/",$path);
			$path[1] = str_replace('-','_',$path[1]);
			if((!empty($path[1]))){
				$newpath = realpath(SENECONTROLLER.$path[1]);
				if(is_dir($newpath)){
				    $newpath = rtrim($newpath,'/');
				    $newpath = $newpath.'/';
				    if(empty($path[2])) $path[2] = 'home';
					$filename = realpath($newpath.''.$path[2].".php");
					//var_dump($filename);
					//die($filename);
					if(is_file($filename)){
						include $filename;
						$cname = basename($filename, ".php");
						$cname = str_replace('-','_',$cname);
						$cname = new $cname();
						$func = "index";
						if(isset($path[3])){
							if(empty($path[3])){
								$func = "index";
							}else{
								$func = $path[3];
							}
						}
								
						if(method_exists($cname,$func)){
							$reflection = new ReflectionMethod($cname, $func);
							if (!$reflection->isPublic()){
								$this->notFound();
							}
							$args=array();
							$num = $reflection->getNumberOfParameters();
							if($num>0){
								for($j=0;$j<$num;$j++){
									if(isset($path[(4+$j)])){
										$args[]=$path[(4+$j)];
									}else{
										$args[]=NULL;
									}
								}
							}
							$reflection->invokeArgs($cname,$args);
						}else{
							$this->notFound();
						}
					}
				}else{
					$filename = realpath(SENECONTROLLER.$path[1].".php");
					if(is_file($filename)){
						include $filename;
						$cname = basename($filename, ".php");
						$cname = str_replace('-','_',$cname);
						if(class_exists($cname)){
							$cname = new $cname();
							$func = "index";
							if(isset($path[2])){
								if(empty($path[2])){
									$func = "index";
								}else{
									$func = $path[2];
								}
							}
									
							if(method_exists($cname,$func)){
								$reflection = new ReflectionMethod($cname, $func);
								if (!$reflection->isPublic()){
									$this->notFound();
								}
								$args=array();
								$num = $reflection->getNumberOfParameters();
								if($num>0){
									for($j=0;$j<$num;$j++){
										if(isset($path[(3+$j)])){
											$args[]=$path[(3+$j)];
										}else{
											$args[]=NULL;
										}
									}
								}
								$reflection->invokeArgs($cname,$args);
							}else{
								
								$this->notFound();
							}
						}else{
							//echo 'controller not found';
							$this->notFound();
						}
					}else{
						$this->notFound();
					}
				}
			}else{
				$this->defaultController();
			}
		}else{
			$this->defaultController();
		}
	}
	private function newRoute(){
		$found=0;
		$sene_method = $GLOBALS['sene_method'];
		if(isset($_SERVER[$sene_method])){
			$path=$_SERVER[$sene_method];
			$path=explode("/",$path);
			$path[1] = str_replace('-','_',$path[1]);
			if((!empty($path[1]))){
				$filename = realpath(SENECONTROLLER.$path[1].".php");
				if(is_file($filename)){
					include $filename;
					$cname = basename($filename, ".php");
					$cname = str_replace('-','_',$cname);
					$cname = new $cname();
					$func = "index";
					if(isset($path[2])){
						if(empty($path[2])){
							$func = "index";
						}else{
							$func = $path[2];
						}
					}
							
					if(method_exists($cname,$func)){
						$reflection = new ReflectionMethod($cname, $func);
						if (!$reflection->isPublic()){
							$this->notFound();
						}
						$args=array();
						$num = $reflection->getNumberOfParameters();
						if($num>0){
							for($j=0;$j<$num;$j++){
								if(isset($path[(3+$j)])){
									$args[]=$path[(3+$j)];
								}else{
									$args[]=NULL;
								}
							}
						}
						$reflection->invokeArgs($cname,$args);
					}else{
						$this->notFound();
					}
				}else{
					$this->notFound();
				}
			}else{
				$this->defaultController();
			}
		}else{
			$this->defaultController();
		}
	}
	private function newRoute2(){
		$found=0;
		$sene_method = $GLOBALS['sene_method'];
		if(isset($_SERVER[$sene_method])){
			$path=$_SERVER[$sene_method];
			$path=explode("/",$path);
			foreach (glob(SENECONTROLLER."*.php") as $filename){
				if(isset($_SERVER['PATH_INFO'])){
					$path[1] = str_replace('-','_',$path[1]);
					if((!empty($path[1])) && (basename($filename, ".php")==$path[1])){
						if(is_file($filename)){
							include $filename;
							$cname = basename($filename, ".php");
							$cname = str_replace('-','_',$cname);
							$cname = new $cname();
							$func = "index";
							if(isset($path[2])){
								if(empty($path[2])){
									$func = "index";
								}else{
									$func = $path[2];
								}
							}
							
							if(method_exists($cname,$func)){
								$reflection = new ReflectionMethod($cname, $func);
								if (!$reflection->isPublic()){
									$found=0;
									break;
								}
								$args=array();
								$num = $reflection->getNumberOfParameters();
								if($num>0){
									for($j=0;$j<$num;$j++){
										if(isset($path[(3+$j)])){
											$args[]=$path[(3+$j)];
										}else{
											$args[]="";
										}
									}
									$reflection->invokeArgs($cname,$args);
									$found=1;
									break;
								}else{
									$reflection->invokeArgs($cname,$args);
									$found=1;
									break;
								}
								
							}else{
								$found=0;
								break;
							}
						}else{
							$found=0;
							break;
						}
					}else{
						$found=0;
						//continue to next file
					}
				}else{
					$found=0;
					break;
				}
			}
			if($found == 0){
				$this->notFound();
			}
		}else{
			$cname = $this->default."";
			include SENECONTROLLER.$this->default.".php";
			$cname = new $cname();
			$cname->index();
		}
	}
	private function aktif($route=1){
		if($route){
			$this->newRoute();
		}else{
			foreach (glob(SENECONTROLLER."*.php") as $filename){
				if(isset($_GET[basename($filename, ".php")])){
					if(is_file($filename)){
						include $filename;
						foreach (glob(SENEMODEL."*.php") as $fmodel){
							include $fmodel;
						}
						$content = new Content();
						$found = 1;
						break;
					}else{
						include SENEVIEW.$this->notfound.".php";
						content();
						///echo 'not found';
						$found = 1;
						break;
					}
				}else{
					//print_r($_GET);
					$found = 0;
					//break;
				}
			}
			if($found == 0){
				include SENECONTROLLER.$this->notfound.".php";
				$content = new Content();
				//print_r($_GET);
			}
		}
	}
	
	private function inaktif(){
		include SENECONTROLLER.$this->default.".php";
		$content = new Content();
	}
}
function redir($url,$time=0,$type=1){
	if($type==0){
		header("Location : ".$url);
	}else{
		if($time){
			echo '<meta http-equiv="refresh" content="'.$time.';URL=\''.$url.'\'" />';
		}else{
			echo '<meta http-equiv="refresh" content="1;URL=\''.$url.'\'" />';
		}
	}
}
function base_url($url=""){
	return $GLOBALS['site'].$url;
}
function enkrip($str){
	return base64_encode(base64_encode($str));
}
function dekrip($str){
	return base64_decode(base64_decode($str));
}
DEFINE('SALTKEY',$GLOBALS['saltkey']);
function keyAdm(){
	return sha1(date("*d*Y*d").SALTKEY);
}
?>
