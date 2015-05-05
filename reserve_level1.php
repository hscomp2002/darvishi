<?php
    include_once ('include/config.php');
    date_default_timezone_set("Asia/Tehran");
//$var=var_export($_REQUEST,true).'
//';file_put_contents("log.txt",$var,FILE_APPEND);	
if(isset($_POST['submit'])){
require_once ('lib/nusoap.php'); 



$client = new nusoap_client('http://164.138.22.33/bank/app/reserve/server.php'); 

        $ip = $_SERVER['REMOTE_ADDR'];     
        if($ip){
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
        }
        // There might not be any data
        else $ip='';

	
$booking[] = array(
 	'userName' => "ansar",
	'password' => "ansar724",
	'id_agency' => 724,//"$_POST[agency]",    // id Attribute in agancy Node 724
	'id_flight'    => 347,//"$_POST[flight]",  // flightID  NOD 297
   	'nCap'	  => $_POST['ncap'],      // nCap Nod -- Between 1-4 1
	'id_flight2'    => "",  // flightID  NOD
   	'nCap2'	  => "",      // nCap Nod -- Between 1-4
	'garanti'   => '0',      // 0
	'adult'     => $_POST['adult'] ,     // count adult reserve 
	'inf'       => $_POST['inf'],      // 0
 	'child'     => $_POST['child'],       // 0
	'ip'     => $_SERVER['REMOTE_ADDR']//$ip       // 0
	);
	
$response = $client->call('booking_request',$booking); 
if($client->fault) { 
	echo "FAULT: <p>Code: (".$client->faultcode."</p>"; 
	echo "String: ".$client->faultstring; 
	} 
else {
	if($_POST['export']=='json'){
            //echo "{\"ticket\":[{\"status\":\"$response[status]\", \"voucher_id\":\"$response[voucher_id]\", \"aim\":\"$response[aim]\", \"price\":\"$response[price]\", \"bprice\":\"$response[bprice]\", \"total\":\"$response[total]\", \"btotal\":\"$response[btotal]\", \"offer\":\"$response[offer]\"}]}";
            //die();
            $tedad = (int)$_POST['adult']+(int)$_POST['child']+(int)$_POST['inf'];
            $ticket_ids = array();
            for($i = 0;$i < $tedad;$i++)
            {
                $q="insert into `ticket` (`voucher_id`,`aim`,`stat`,`err`,`total`) values ('".((isset($response['voucher_id']))?$response['voucher_id']:'0')."','".((isset($response['aim']))?$response['aim']:'0')."','".$response['status']."','".(isset($response['error'])?$response['error']:'')."',".((isset($response['total']))?$response['total']:'0').")";
                $db->query($q);
                $ticket_ids[] = $db->insert_id;
            }
            echo json_encode(array("ticket"=>array($response),"ticket_id"=>$ticket_ids));
	}
	else{
	echo 'STATUS=='.$response['status'].'<br>';
	if($response['status']==0) echo 'ERROR == '.$response['error'].'<br>';
	else echo 'VOUCHER == '.$response['voucher_id'].'<br>AIM == '.$response['aim'].'<br>PRICE == '.$response['price'].'<br>TOTAL == '.$response['total'].'<br>OFFER == '.$response['offer'];
echo '<br>';
	foreach($response as $var=>$value) echo "$var => $value <br>";
	}
	
	} 
}



	
?>
