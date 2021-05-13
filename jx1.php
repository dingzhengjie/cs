<?php
error_reporting(0);
include_once 'curl.php';
$dz=$_GET["url"];

if ($url='' or strlen($dz)<10){
    pz_echo("");
    exit();
}
$data=pz_curl("http://cache.zjvip.xyz:88/jx.php?url=".$dz,"",0);
$dataJSON=json_decode($data);
$urlTXT=$dataJSON->url;
$typeTXT=$dataJSON->type;

pz_echo($urlTXT,$typeTXT);

function pz_echo ($txt,$type=null){
    if($txt==''){
        $arr['code']='404';
        $txt='error';

    }else{
        $arr['code']='200';
    }
    $arr['type']=$type;
    $arr['二次解析']='临时调用地址  ';
    $arr['url']=$txt;
    $arr['出售解析接口']='联系QQ4852724';
    echo json_encode($arr);
}