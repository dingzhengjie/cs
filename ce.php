<?php

$url=$_GET['url'];
$id = 16;
for ($i = 1; $i < $id; $i++) {
   $ljs  = "http://49.232.130.204:9529/jx/jx.php?id=".$i."&url=".$url;
   $lj = header("location:$ljs");
   $liz = array_push($lj);
   // $ljs = 
    
}
echo json_encode($liz, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
//header("location:$lj")