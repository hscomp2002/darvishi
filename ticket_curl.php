<?php
include_once('include/config.php');
if(!isset($_REQUEST['voucher_id']) && !isset($_REQUEST['check_voucher']))
{
    die('access denied');
}
$voucher_id = isset($_REQUEST['check_voucher'])?$_REQUEST['check_voucher']:$_REQUEST['voucher_id'];
$check_stat = '-4';
$q="select id from ticket where voucher_id = ".$voucher_id;
$rows=$db->get_results($q);
if($rows)
{

    $url = $statusUrl.'?voucher_id='.$voucher_id;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);

    //curl_setopt($ch,CURLOPT_POSTFIELDS,"api=$api&amount=$amount&redirect=$redirect");
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $check_stat = trim(curl_exec($ch));
    curl_close($ch);
}
if(isset($_REQUEST['check_voucher']))
    die($check_stat);
if((int)$check_stat === 1)
{
    $url = $printUrl.'?voucher_id='.$voucher_id;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);

    //curl_setopt($ch,CURLOPT_POSTFIELDS,"api=$api&amount=$amount&redirect=$redirect");
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $res = curl_exec($ch);
    curl_close($ch);
    die($res);
}
else
{
    die("بلیت مورد نظر موجود نمی باشد");
}