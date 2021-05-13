<?php
    /**
     * [url=home.php?mod=space&uid=275307]@param[/url] $url 请求网址
     * @param bool $params 请求参数
     * @param int $post 请求方式
     * @param int $https https协yi
     * [url=home.php?mod=space&uid=161696]@Return[/url] bool|mixed
     */


/**
 *
 * @param string $url  请求地址
 * @param string $params  请求数据
 * @param int $post  0 get 1 post
 * @param array $xyt 添加协议头
 * @param array $cookies 添加cookies
 * @param null $zdx 重定向 不填为假 1为真
 * @param null $fhxyt_COOKIES 返回协议头 cookies 数组方式 0为假 1为真
 * @return bool|false|string|string[]
 */


   function pz_curl($url, $params, $post, $xyt=array(),$cookies=array(),$zdx=null,$fhxyt_COOKIES=null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //判断是否重定向
       if ($zdx==1){
           curl_setopt($ch, CURLOPT_AUTOREFERER, false);
       }

       //当前为1的时候返回 协议头和cookies 返回协议头
        if ($fhxyt_COOKIES==1){
            curl_setopt($ch, CURLOPT_HEADER, 2);
        }

        //判断cookies是不是空的
       if ($cookies[0]<>""){
       curl_setopt($ch, CURLOPT_COOKIE, $cookies[0]);
    }
        //判断是否需要协议头
       if (empty($xyt)<>true){
            //判断是否需要协议头
            curl_setopt($ch, CURLOPT_HTTPHEADER, $xyt);
        }
        //判断是不是https
       $str=substr($url, 0,5);
        if ($str=='https') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        }
        //post判断
        if ($post==1) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } elseif ($post==0){
            //curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        }
        $response = curl_exec($ch);
        curl_close($ch);

        if ($fhxyt_COOKIES==1){
            $FGH='';
            $data=explode($FGH,$response);
            return $data;
        }else{
            return $response;
        }

    }




	function pz_jsonjx($txt,$id)//txt=json数据    $id=1 解析type 2解析url


{
	$json=json_decode($txt);   //编码json数据

	
	if ($id==1){
			
		$fanhui=$json->url;
	}elseif($id==2){
		$fanhui=$json->type;
	}
	return $fanhui;
}
	function pz_xzwb($txt,$a)//寻找文本找到返回1  或者返回-1   参数说明  txt是寻找的文本  a是被寻找的文本
{
	$fanhui=stristr($txt, $a);

	if($fanhui==false)
	{
		$fanhui=-1;
		}else{
		$fanhui=1;	
		}

	return($fanhui);
}
    function pz_qzbwb($txt,$a,$b){
 
	
	return(substr($txt, $a,$b));
 }//取左边文本
    function pz_qzjwb($str, $leftStr, $rightStr)
{
    $left = strpos($str, $leftStr);
    //echo '左边:'.$left;
    $right = strpos($str, $rightStr,$left);
    //echo '<br>右边:'.$right;
    if($left < 0 or $right < $left) return '';
    return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}//取中间文文本
    function pz_zwbth($txt,$a,$b){
  $data=str_replace($a,$b,$txt);

  return $data;
}//子文本替换
?>