<?php
error_reporting(0);
include_once 'curl11.php';
$dZZ=$_GET["url"];
if ($url='' or strlen($dZZ)<10){
    pz_echo("");
    exit();
}

//专线区
if (pz_xzwb($dZZ,"pptv.com")=="1"){
    jx1($dZZ);
    exit();
}elseif (pz_xzwb($dZZ,"bilibili.com")==1){
    jx0($dZZ);
    exit();
}elseif (pz_xzwb($dZZ,"mgtv.com")==1){
    jx0($dZZ);
    exit();
}elseif (pz_xzwb($dZZ,"cztv.com")=="1"){
    cztv($dZZ);
    exit();
}elseif (pz_xzwb($dZZ,"miguvideo.com")=="1"){
    miguvideo($dZZ);
    exit();
}

//结束专线miguvideo.com

jx0($dZZ);

function jx0($STR){
    $dz=$STR;
    $TJ='url='.$dz.'&referer=aHR0cHM6Ly92aXAuc3d1aWkudG9wLz91cmw9aHR0cHM6Ly93d3cuaXFpeWkuY29tL3ZfMW5wdDV4bDVrOXMuaHRtbD92ZnJtPXBjd19ob21lJnZmcm1ibGs9Q1omdmZybXJzdD03MTIyMTFfY2Fpbml6YWl6aHVpX2ltYWdlMw%3D%3D&ref=0&time=1618673004&ip=59.36.120.233&type=&other=aHR0cHM6Ly93d3cuaXFpeWkuY29tL3ZfMW5wdDV4bDVrOXMuaHRtbD92ZnJtPXBjd19ob21lJnZmcm1ibGs9Q1omdmZybXJzdD03MTIyMTFfY2Fpbml6YWl6aHVpX2ltYWdlMw%3D%3D&token=54d476f229d9d71af48efd6088f67e20&keys=b8d67394781411ef89b07bed1f6852b4&keep=d27e556210ed9ef1dd6c3ccb6abb0053&key=5365a4f485e050d425cf816dccf7c661&ios=';
    $data=pz_curl('https://vip.swuii.top/jiexi/apis.php ',$TJ,1);
    pz_json($data,0);
}
function jx1($STR){
    $dz=$STR;
    $tj='url='.$dz.'&referer=aHR0cHM6Ly93d3cuaXFpeWkuY29tL3ZfMXIyNnZnaG0xeWcuaHRtbD92ZnJtPXBjd19ob21lJnZmcm1ibGs9TCZ2ZnJtcnN0PTcxMTIxOV9ob21lX2RpYW55aW5nX2Zsb2F0X3ZpZGVvX2FyZWEy&ref=0&time=1620392467&type=&other=aHR0cDovL3d3dy5pcWl5aS5jb20vdl8xcjI2dmdobTF5Zy5odG1s&ios=';
    $data=pz_curl("https://ckmov.ccyjjd.com/ckmov/api.php",$tj,1);
    pz_json($data,1);
}
function jx2($STR){
    $dz=$STR;
    $data=pz_curl("http://m3u8.tv.janan.net/json.php?url=".$dz,'',0);
    pz_json($data,2);
}
function jx3($STR){
    $dz=$STR;
    $data=time()."000";
    $str="meitiankankankeykeykey".$data;
    $str2="1.0.9".$data;
    $seturl="http://47.113.126.237/jiexi/4kjiexi.php/?url=".$dz."&time=".$data."&key=".md5($str,FALSE)."&code=".md5($str2,FALSE);
    $data=pz_curl($seturl,"",0);
    $a=json_decode($data);
    $bb=$a->url;
    pz_json($bb,3);
}



function pz_json($STR,$ID=null){
    $dZZ=$_GET["url"];
    $dataJSON=json_decode($STR);
    $urlTXT=$dataJSON->url;
    $typeTXT=$dataJSON->type;


    if ($ID==0){
        if (pz_xzwb($urlTXT,"http")=="-1"){
            jx1($dZZ);
            exit();
        }
    }    elseif ($ID==1){
        if (pz_xzwb($urlTXT,"http")=="-1"){
            jx2($dZZ);
            exit();
        }
    }elseif ($ID==2){
        if (pz_xzwb($urlTXT,"http")=="-1"){
            jx3($dZZ);
            exit();
        }
    }elseif ($ID=3){
        if (pz_xzwb($STR,"http")=="-1"){
            pz_echo("视频数据丢失",$typeTXT,$ID);
            exit();
        }
        pz_echo($STR,$typeTXT,$ID);
        exit();
    }




    pz_echo($urlTXT,$typeTXT,$ID);
}
function pz_echo ($txt,$type=null,$ID=null){
   header('Content-type:text/json');
    if($txt==''){
        $arr['code']='404';
        $txt='error';

    }else{
        $arr['code']='200';
    }
    $arr['解析ID']=$ID;
    $arr['type']=$type;
    $arr['二次解析']='临时调用地址  请勿直接调用 本地址仅为测试';
    $arr['url']=$txt;
    $arr['PHP更新时间']='2021年5月7日21:08:15';
    //echo json_encode($arr, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    header("location:$txt");
    
}

function cztv($STR){

$SL=preg_match("/([1-9][0-9]{3,})/",$STR,$RES);
if ($SL<=0){
    pz_echo("");
    exit();
}
$id=$RES[1];
$XYT=array(
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'Accept-Language: zh-CN,zh;q=0.9',
'Cache-Control: no-cache',
'Connection: keep-alive',
'Cookie: acw_tc=76b20ff616128569358337857e76bb1dd9451324b92e4e24e4c0658d1a66bc',
'Host: apicms.cztv.com',
'Pragma: no-cache',
'Sec-Fetch-Dest: document',
'Sec-Fetch-Mode: navigate',
'Sec-Fetch-Site: none',
'Sec-Fetch-User: ?1',
'Upgrade-Insecure-Requests: 1',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36',
);
$data=pz_curl("https://apicms.cztv.com/mms/out/video/playJson?id=".$id."&platid=111&splatid=1002&domain=www.lecloud.com","",0,$XYT);

$dataJSON=json_decode($data);
$GQ=count($dataJSON->playurl->dispatch);
$TXT=$dataJSON->playurl->dispatch[$GQ-1]->url[1]->yd;
if ($TXT==""){
  usleep(1000*500);
   $data=pz_curl("https://apicms.cztv.com/mms/out/video/playJson?id=".$id."&platid=111&splatid=1002&domain=www.lecloud.com","",0,$XYT);
    $dataJSON=json_decode($data);
    $GQ=count($dataJSON->playurl->dispatch);
    $TXT=$dataJSON->playurl->dispatch[$GQ-1]->url[1]->yd;
}
pz_echo($TXT,"解析单线","单线ID");

}



function miguvideo($STR){

    preg_match('/[1-9][0-9]{4,}/',$STR,$RES);
    $CID=$RES[0];
    $TJ='url='.$CID.'%40miguvideo&referer=aHR0cHM6Ly9hcGkub2tqeC5jYzozMzg5L2p4LnBocD91cmw9aHR0cDovL3d3dy5taWd1dmlkZW8uY29tL21ncy93ZWJzaXRlL3ByZC9kZXRhaWwuaHRtbD9jaWQ9NzA2NzE4MjE1&ref=0&time=1616983744&other=aHR0cDovL3d3dy5taWd1dmlkZW8uY29tL21ncy93ZWJzaXRlL3ByZC9kZXRhaWwuaHRtbD9jaWQ9NzA2NzE4MjE1&token=bcc205479765462cef58a94576ab2a5e&keys=f3cb7ea48141c281e6f4f4d91cad21ac&keep=aa03c417c539da1687054eef3736214d&key=c6802006b312a46b42134b6bcceb0af5';
   $data=pz_curl("https://api.okjx.cc:3389/17/api.php",$TJ,1);
    $dataJSON=json_decode($data);
    $urlTXT=$dataJSON->url;
    $typeTXT=$dataJSON->type;


    if (pz_xzwb($urlTXT,"http")=="-1"){
        pz_echo('https:'.$urlTXT,$typeTXT,"咪咕专线");
    }else{
        pz_echo($urlTXT,$typeTXT,"咪咕专线");
    }


}//暂停使用


