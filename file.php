<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * Date: 2017/12/26
 * Time: 上午10:02
 */
$fp=fopen('Hospital Billing - Event Log.xes','r');
$str='';
while (!feof($fp)){
    $buf=fgets($fp);
    $item='';
    if(preg_match('/concept:name/',$buf)){
        $item=explode('"',$buf)[3];
        if ($item=='NEW'){
            $item="\n".$item;
        }
        $item.="\t";

    }
    $str.=$item;
}
$fp2=fopen('hostipal-newData.txt','w');
fwrite($fp2,$str);
fclose($fp);
fclose($fp2);