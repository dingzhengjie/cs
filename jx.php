<?phperror_reporting(0);include ('./curl.php');$urldz = 'url=' . $_GET['url'];//带url=$urlget = $_GET['url'];//不带url=$id = $_GET['id'];//接口id$jxsl=16;  //接口数量$time = time();  //当前时间戳$times = 'time='.$time;//print $time;if ($id == "" or $urlget == "") {	echo '当前参数不对<br/><br/>接口参数： id是解析线路 url是解析地址 目前有'.$jxsl.'条解析数据 id不能大于'.$jxsl.' 线路8不能使用<br/><br/>例子如下：<br/>http://www.xygsp.top/jx.php?id=5&url=https://www.iqiyi.com/v_19rz4c70vw.html<br/>';	}if ($id >= $jxsl+1 and $id != "") {	echo '接口参数数为 1-'.$jxsl.' 不要大于'.$jxsl.'即可.....';}//解析1   //无名小站if ($id == 1) {	$data = pz_curl("https://www.administratorm.com/api.php", $urldz, 1);	$a = pz_jsonjx($data, 1);   // pz_echo($a);    	$aa = pz_qzbwb($a, 0, 2);		if ($aa == '//') {        $a='https:'.$a;	}    pz_echo($a);}//解析2    //久播解析vip      http://vipapi.jiubojx.com/api_hcvip.phpif ($id == 2) {    $data = pz_curl('https://vip.jiubojx.com/vip/api.php', $urldz.'time=1608700408&referer=https%3A%2F%2Fjx.jiubojx.com%2F&ckey=bdc65dbc189ad78dc0281adbe45f7d04&vkey=0aa52df3f9aff6c59f8fb58c95a0167c&key=64406ff05b0380d9ee06f6a05774d0c4&key2=2a257d53d9cf4645ef7f05ac95c0165c&key3=ddd32c6x8f6872e6axfx5cbs6994db2x&pltfrom=0', 1);	$a=pz_jsonjx($data,1);    pz_echo($a);}//解析3   //ckmov无广告解析if ($id == 3) {    $data = pz_curl('https://ckmov.ccyjjd.com/ckmov/api.php', $urldz.'&referer=aHR0cHM6Ly93d3cuY2ttb3YudmlwLw%3D%3D&ref=0&time=1620300945&type=&other=aHR0cHM6Ly92LnFxLmNvbS94L2NvdmVyL216YzAwMjAwYm14ZTNlay5odG1s&ios=', 1);	$a=pz_jsonjx($data,1);    	$aa = pz_qzbwb($a, 0, 2);		if ($aa == '//') {        $a='https:'.$a;	}    pz_echo($a);}//解析4  //全网视频在线解析if ($id == 4) {	$data = pz_curl("http://jx.idc126.net/jx/api.php", $urldz, 1);	$a = pz_jsonjx($data, 1);	$aa = pz_qzbwb($a, 0, 2);	if ($aa == '//') {		$urldz = $_GET['url'];		$data = pz_curl('https://yi29f.cn/vip01/api.php?url=' . $urldz, '', 0);		$a = pz_jsonjx($data, 1);        pz_echo($a);	} else {        pz_echo($a);	}}//解析5    //解析啦if ($id == 5) {$xyt=array('Origin: https://jiexiapi.yilans.net','X-Requested-With: XMLHttpRequest',    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8','Sec-Fetch-Site: same-origin','Sec-Fetch-Mode: cors',    'Accept-Language: zh-CN,zh;q=0.9',); $data=pz_curl("https://jiexiapi.yilans.net/pangu/api.php",$urldz,1,$xyt);	$a = pz_jsonjx($data, 1);    pz_echo($a);}//解析6   //全网解析if ($id==6){	$data=pz_curl('https://jx.elwtc.com/vip/api.php', $urldz, 1);	$a = pz_jsonjx($data, 1);	$aa = pz_qzbwb($a, 0, 2);	if ($aa == '//') {        $a='https:'.$a;	}    pz_echo($a);}//解析7   //8090解析if ($id == 7) {	$data = pz_curl('https://8090.gdkaman.com/jiexi2019/api.php',$urldz, 1);	$a = pz_jsonjx($data, 1);	$aa = pz_qzbwb($a, 0, 2);		if ($aa == '//') {        $a='https:'.$a;	}    pz_echo($a);}//解析8   //久播解析if($id==8){	$data = pz_curl('http://49.232.130.204:9529/jx0/api.php', $urldz.'apiname=api.php&url=https%3A%2F%2Fv.qq.com%2Fx%2Fcover%2Fmzc00200bmxe3ek.html&time=1620300198&referer=&ckey=457298f9470958d457502d21ced5862a&vkey=caa362302f006417e735f8ff90f2043a&key=678e1ca3865f1f809d1a23b51f50e5e9&key2=8ad3f230ef502477c775684f0052949a&key3=82dh73c2bk8e19es1j40a3b17a6375el&pltfrom=0', 1);	$a=pz_jsonjx($data,1);    pz_echo($a);}//解析9暂无   //ckplayer解析if($id==9){        $data=pz_curl("https://ckplayer.gdkaman.com/jiexi/api.php",$urldz,1);        $a=pz_jsonjx($data,1);    //pz_echo($a);    	$aa = pz_qzbwb($a, 0, 2);		if ($aa == '//') {        $a='https:'.$a;	}    pz_echo($a);}//解析10  //全网视频在线解析if($id==10){    $data=pz_curl('http://api.oopw.top/jiexi/api.php',$urldz,1);    $a=pz_jsonjx($data,1);    pz_echo($a);}//解析11  //思云解析if ($id == 11) {    $tj='url='.$urlget.'&referer=&ref=0&time=1608700759&type=&other=aHR0cDovL3YucXEuY29tL3gvcGFnZS9sMDAzNXoyd3N3bC5odG1s&token=f6d141bdd5ca1fa4963263df53511130&keep=effa8bfea4599d86fbb6ffdc13e5c77d&key=3aec25dcc071865555b043dd31cc8add&ios=';    $data=pz_curl("https://pay.520yk.cn/256/api.php",$tj,1);    $a=pz_jsonjx($data,1);   pz_echo($a);}//芒果专用解析if($id==12){    $data=pz_curl('https://plamgtvcache.ccyjjd.com/mgtv888/api.php?url='.$urlget.'&danmu=0',"",0);    $a=pz_jsonjx($data,1);    pz_echo($a);}//解析13   //思云解析if ($id == 13) {	$data = pz_curl('https://vip.ap2p.cn/api.php',$urldz, 1);	$a = pz_jsonjx($data, 1);	$aa = pz_qzbwb($a, 0, 2);		if ($aa == '//') {        $a='https:'.$a;	}    pz_echo($a);}//解析14 //云解析if ($id == 14) {    $tj='url='.$urlget.'&wap=0&ios=0&host=jx.ergan.top&key=1961861b45244ecdb4657e19707113f7-c33e6cd0c577ae60fdc689f03f7f4145&sign=955cBrZ44TwBpFuH4ZcUBBEGN6a77whC--werGDqO2sgb4wuWZLXOfjMvBAAaSLTYKUd2s-jH8Xb8lmIoQ&token=7234B1atgI-8Jm5BejjoYjnxnoEzzcORW1jpWG2qutYiBsNmCi0BMjcdVugUHHwZjGSl8Yy_NusBJjP0aQ&type=&referer=aHR0cHM6Ly9qeC5lcmdhbi50b3AvP3VybD1odHRwczovL3YucXEuY29tL3gvY292ZXIvbXpjMDAyMDBheWtrMHIwLmh0bWw%3D&time=1609102919';    $data=pz_curl("https://jx.ergan.top/mgtv/Api.php",$tj,1);    $a=pz_jsonjx($data,1);    pz_echo($a);}//解析15  //256解析if ($id == 15) {    $tj='url='.$urlget.'&referer=aHR0cDovL2tqLmdvdWh5cy5jbi8%3D&ref=0&time=1609103750&type=&other=aHR0cHM6Ly92LnFxLmNvbS94L2NvdmVyL216YzAwMjAwYXlrazByMC5odG1s&token=2f6b8914c74d9d4037190ecbc387f554&keep=1aa93f2cd2330caa253f9b77212604c6&key=869578295911096fd4fb3b3019335c1a&ios=';    $data=pz_curl("http://sp.tbmiaosha.com/256/api.php",$tj,1);    $a=pz_jsonjx($data,1);    pz_echo($a);}//解析16   //解析if ($id == 16) {	$data = pz_curl('https://video4080.ccyjjd.com/mgtv1206/api.php',$urldz, 1);	$a = pz_jsonjx($data, 1);	$aa = pz_qzbwb($a, 0, 2);		if ($aa == '//') {        $a='https:'.$a;	}    pz_echo($a);}//待添加//echo '***无耻的分割线***';function pz_echo ($txt){    if($txt==''){        $arr['code']='-1';        $txt='解析失败，换个接口试试吧..';    }else{        $arr['code']='200';    }    if($_GET['id'] == 1){        $arr['id']='本接口来自无名小站';    }    if($_GET['id'] == 3){        $arr['id']='本接口来自ckmov无广告解析';    }    if($_GET['id'] == 6){        $arr['id']='本接口来自全网解析';    }    if($_GET['id'] == 8){        $arr['id']='本接口来自久播解析';    }    if($_GET['id'] == 9){        $arr['id']='本接口来自ckplayer解析';    }   #$arr['qq群']='进群请备注来意--929248136  --进群密码--【pzapi】 ';    $arr['url']=$txt;    //$arr['pzapi.top']='本接口来自互联网';   echo json_encode($arr, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);    //header("location:$txt");    //echo json_encode($arr, true );}