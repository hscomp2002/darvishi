<?php
function monize($str)
	{
		$out=$str;
		$out=str_replace(',','',$out);
		$out=str_replace('.','',$out);
		$j=-1;
		$tmp='';
		//$strr=explode(' ',$str);
		for($i=strlen($str)-1;$i>=0;$i--){
				//alert(txt[i]);
			if($j<2){
				$j++;
				$tmp=substr($str,$i,1) . $tmp;
			}else{
				$j=0;
				$tmp=substr($str,$i,1) . ',' . $tmp;
			}
		}                
		$out=$tmp;
	//	$out=($str);
	//	$out=strlen($str);
	//	$out=substr[strlen(
//echo enToPerNums($out);
		return enToPerNums($out);
	}
	function umonize($str){
		$out=$str;
		$out=str_replace(',','',$out);
		$out=str_replace('.','',$out);
		return($out);
	}
	function enToPerNums($inNum){
		$outp = $inNum;
		$outp = str_replace('0', '۰', $outp);
		$outp = str_replace('1', '۱', $outp);
		$outp = str_replace('2', '۲', $outp);
		$outp = str_replace('3', '۳', $outp);
		$outp = str_replace('4', '۴', $outp);
		$outp = str_replace('5', '۵', $outp);
		$outp = str_replace('6', '۶', $outp);
		$outp = str_replace('7', '۷', $outp);
		$outp = str_replace('8', '۸', $outp);
		$outp = str_replace('9', '۹', $outp);
//		$outp = perToEnNums($outp);
		return($outp);
	}
	function perToEnNums($inNum){
		$outp = $inNum;
		$outp = str_replace('۰', '0', $outp);
		$outp = str_replace('۱', '1', $outp);
		$outp = str_replace('۲', '2', $outp);
		$outp = str_replace('۳', '3', $outp);
		$outp = str_replace('۴', '4', $outp);
		$outp = str_replace('۵', '5', $outp);
		$outp = str_replace('۶', '6', $outp);
		$outp = str_replace('۷', '7', $outp);
		$outp = str_replace('۸', '8', $outp);
		$outp = str_replace('۹', '9', $outp);
		return($outp);
	}
?>
