<?php
   
   error_reporting(E_ALL);ini_set('display_errors', 1);

    include_once('include/config.php');
    include_once("include/pdate.php");
    //var_dump($_POST);
    //die();
	if(isset($_POST['mosafer'])){
		$j=count($_POST['mosafer']['age']);
		for($i=0;$i<$j;$i++){
			$_POST['mosafer']['name'][$i].'<br>';
			$listMosafer[$i]['pass_id']=$i;
			$listMosafer[$i]['name']=$_POST['mosafer']['name'][$i];
			$listMosafer[$i]['family']=$_POST['mosafer']['family'][$i];
			$listMosafer[$i]['en_name']='';//$_POST['mosafer']['en_name'][$i];
			$listMosafer[$i]['en_family'] ='';//$_POST['mosafer']['en_family'][$i];
			$listMosafer[$i]['age']=$_POST['mosafer']['age'][$i];
			$listMosafer[$i]['sex']=$_POST['mosafer']['sex'][$i];
			$listMosafer[$i]['passport']=$_POST['mosafer']['code_melli'][$i];
			$listMosafer[$i]['expiredate']='';//$_POST['mosafer']['expiredate'][$i];
			$listMosafer[$i]['birthday_year']=$_POST['mosafer']['birthday_year'][$i];
			$listMosafer[$i]['birthday_month']=$_POST['mosafer']['birthday_month'][$i];
			$listMosafer[$i]['birthday_day']=$_POST['mosafer']['birthday_day'][$i];
		}
	}



if(isset($_POST['submit'])){
date_default_timezone_set("Asia/Tehran");
require_once ('lib/nusoap.php'); 
//$client = new soapclient('http://www.gohar724.com/stand/app/reserve/server.php'); 
$client = new nusoap_client('http://164.138.22.33/bank/app/reserve/server.php');

$regticket[] = array(
		'userName'   => "darvishi",
		'password'   => "darvishistand",
		'voucher'    => $_POST['voucher'],  // id Attribute in agancy Node 
		'aim'        => $_POST['aim'],  // AIM Cod e Return Level 1
		'mobile'     => $_POST['mobile'],
		'country'    => '',
		'email'      => $_POST['email'],
		'address'    => '',
		'description'=> '',
		'mcurrency'  => '',
		'mosafer'    => $listMosafer
		); 

		
$response = $client->call('booking_registerTicket',$regticket); 
//var_dump($response);
//Process result 
    if($client->fault) 
    { 
	echo "FAULT: <p>Code: (".$client->faultcode."</p>"; 
	echo "String: ".$client->faultstring; 
    } 
    else 
    {
	
	
	if($response['status']==0) 
            {
				if(isset($response['error']))
				$msg=$response['error'];
				else
				$msg='Not Detected';}
	else 
            $msg=$response['register']; 

        $ticket_ids = explode(',',$_REQUEST["ticket_id"]);
        foreach($ticket_ids as $i=>$ticket_id)
        {
			$err='';
			if(isset($response['error']))
			$err=$response['error'];
            $q = "update `ticket` set  `stat`='".$response['status']."' ,`err` = '".$err."' where id = $ticket_id";
            $db->query($q);
        }

		if($response['status']=="1")
            {
				$url="Location: ".$_REQUEST['agency_site']."/gohar/bank.php?voucher_id=".$_REQUEST['voucher']."&";
				var_dump($url);
				header($url);
			exit();}
        else {
			$err='';
			if(isset($response['error']))$err=$response['error'];
            header("Location: index.php?fail=".$err."&voucher_id=".$_POST['voucher']."&");
			exit();
        }
    }
    
}

?>
