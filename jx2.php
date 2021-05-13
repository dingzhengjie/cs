<?php
$dz=$_GET["url"];
//$id = 16;
//for ($i = 1; $i < $id; $i++) {
    $data="http://49.232.130.204:9529/jx/jx.php?id=1&url=".$dz;
    $fh= file_get_contents($data);
    echo $fh;
    echo '</br>';
    $data3="http://49.232.130.204:9529/jx/jx.php?id=3&url=".$dz;
    $fh3= file_get_contents($data3);
    echo $fh3;
    echo '</br>';
    $data6="http://49.232.130.204:9529/jx/jx.php?id=6&url=".$dz;
    $fh6= file_get_contents($data6);
    echo $fh6;
    echo '</br>';
    $data8="http://49.232.130.204:9529/jx/jx.php?id=8&url=".$dz;
    $fh8= file_get_contents($data8);
    echo $fh8;
    echo '</br>';
    $data9="http://49.232.130.204:9529/jx/jx.php?id=9&url=".$dz;
    $fh9= file_get_contents($data9);
    echo $fh9;
    echo '</br>';
//}
