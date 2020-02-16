<?php
session_start();
$apps_dir='apps';
$assets_dir='assets';
$ssys_dir='kero';
$kerosine_dir='kero/sine';
$library_dir='kero/lib';
$config_dir='apps/config';
$model_dir='apps/model';
$view_dir='apps/view';
$controller_dir='apps/controller';


if (defined('STDIN')){
	chdir(dirname(__FILE__));
}
if (realpath($apps_dir) !== FALSE){
	$apps_dir = realpath($apps_dir).'/';
}
if (realpath($assets_dir) !== FALSE){
	$assets_dir = realpath($assets_dir).'/';
}
if (realpath($ssys_dir) !== FALSE){
	$ssys_dir = realpath($ssys_dir).'/';
}
if (realpath($kerosine_dir) !== FALSE){
	$kerosine_dir = realpath($kerosine_dir).'/';
}
if (realpath($config_dir) !== FALSE){
	$config_dir = realpath($config_dir).'/';
}
if (realpath($library_dir) !== FALSE){
	$library_dir = realpath($library_dir).'/';
}
if (realpath($model_dir) !== FALSE){
	$model_dir = realpath($model_dir).'/';
}
if (realpath($view_dir) !== FALSE){
	$view_dir = realpath($view_dir).'/';
}
if (realpath($controller_dir) !== FALSE){
	$controller_dir = realpath($controller_dir).'/';
}
if(!is_dir($apps_dir)){
	die("missing apps dir: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}
if(!is_dir($assets_dir)){
	die("missing assets dir: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}
if(!is_dir($ssys_dir)){
	die("missing ssys dir: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}
if(!is_dir($kerosine_dir)){
	die("missing apps dir: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}
if(!is_dir($library_dir)){
	die("missing library dir: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}if(!is_dir($config_dir)){
	die("missing config dir: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}
if(!is_dir($model_dir)){
	die("missing nodel dir: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}if(!is_dir($view_dir)){
	die("missing view dir: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}
if(!is_dir($controller_dir)){
	die("missing controller dir: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}

$apps_dir = rtrim($apps_dir, '/').'/';
$ssys_dir = rtrim($ssys_dir, '/').'/';
$kerosine_dir = rtrim($kerosine_dir, '/').'/';
$library_dir = rtrim($library_dir, '/').'/';
$config_dir = rtrim($config_dir, '/').'/';
$model_dir = rtrim($model_dir, '/').'/';
$view_dir = rtrim($view_dir, '/').'/';
$controller_dir = rtrim($controller_dir, '/').'/';

if(!is_dir($apps_dir)) die("Sene framework directory missing : ".pathinfo(__FILE__, PATHINFO_BASENAME));
if(!is_dir($ssys_dir)) die("Sene framework directory missing : ".pathinfo(__FILE__, PATHINFO_BASENAME));
if(!is_dir($kerosine_dir)) die("Sene framework directory missing : ".pathinfo(__FILE__, PATHINFO_BASENAME));
if(!is_dir($library_dir)) die("Sene framework directory missing : ".pathinfo(__FILE__, PATHINFO_BASENAME));
if(!is_dir($config_dir)) die("Sene framework directory missing : ".pathinfo(__FILE__, PATHINFO_BASENAME));
if(!is_dir($model_dir)) die("Sene framework directory missing : ".pathinfo(__FILE__, PATHINFO_BASENAME));
if(!is_dir($view_dir)) die("Sene framework directory missing : ".pathinfo(__FILE__, PATHINFO_BASENAME));
if(!is_dir($controller_dir)) die("Sene framework directory missing : ".pathinfo(__FILE__, PATHINFO_BASENAME));

define('SENEROOT',str_replace("\\", "/",$apps_dir));
define('SENEASSETS',$assets_dir);
define('SENESYS',$ssys_dir);
define('SENEKEROSINE',$kerosine_dir);
define('SENELIB',$library_dir);
define('SENECFG',$config_dir);
define('SENEMODEL',$model_dir);
define('SENEVIEW',$view_dir);
define('SENECONTROLLER',$controller_dir);

if(!file_exists(SENECFG."/config.php")) die('unable to load config file : config.php');
include(SENECFG."/config.php");

if(!file_exists(SENECFG."/controller.php")) die('unable to load config file : controller.php');
include(SENECFG."/controller.php");

if(!file_exists(SENECFG."/timezone.php")) die('unable to load config file : timezone.php');
include(SENECFG."/timezone.php");

if(!file_exists(SENECFG."/database.php")) die('unable to load config file : database.php');
include(SENECFG."/database.php");

if(!file_exists(SENECFG."/session.php")) die('unable to load config file : session.php');
include(SENECFG."/session.php");

if(!isset($default_controller,$notfound_controller)){
	$default_controller="welcome";
	$notfound_controller="notfound";
}
define("DEFAULT_CONTROLLER",$default_controller);
define("NOTFOUND_CONTROLLER",$notfound_controller);

require_once SENEKEROSINE."/SENE_Engine.php";
$se = new SENE_Engine($db);
$se->SENE_Engine();

?>