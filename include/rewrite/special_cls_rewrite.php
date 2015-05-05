<?php
	class rewrite
	{
		public function address()
		{
			$raw_address = $_SERVER['REQUEST_URI'];
			if($raw_address == "/" || $raw_address == "")
				return array("home" , array());
			else
			{
				//Clean address from slash
				$page_address = strtolower($raw_address);
				$page_address = substr($page_address, 1, strlen($page_address) - 1);				
				if(substr($page_address, strlen($page_address) - 1, 1) == "/")
					$page_address = substr($page_address, 0, strlen($page_address) - 1);
				//End of cleaning
				
				if (strpos($page_address ,'/') !== false) //Multi part address like /academy/listening...
				{
					$page_name = "";
					$other_parts = array();
					$address_parts_arr = explode("/", $page_address);
					$address_parts_arr[0] = str_replace("%20", "", $address_parts_arr[0]);
					$address_parts_arr[0] = trim($address_parts_arr[0]);
					if($address_parts_arr[0] != "")
						$page_name = $address_parts_arr[0];
					else
						return array("404_page" , array());
					
					unset($address_parts_arr[0]);
					for($i = 1; $i <= count($address_parts_arr); $i++)
					{
						$address_parts_arr[$i] = str_replace("%20", "", $address_parts_arr[$i]);
						$address_parts_arr[$i] = trim($address_parts_arr[$i]);
						if($address_parts_arr[$i] != "")
							array_push($other_parts, $address_parts_arr[$i]);
					}
					return array($page_name, $other_parts);
				}
				else
					return array($page_address , array()); //Single part address like /weekly-lessons
			}
		}
	}
?>