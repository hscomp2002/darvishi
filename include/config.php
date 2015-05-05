<?php
//session_start();
include('cons.php');
function query($sql){return $res= mysql_query((stripslashes($sql)));};
//put configuration codes such as database connection here
require_once('ez_sql/ez_sql_core.php');
require_once('ez_sql/ez_sql_mysql.php');
$db = new ezSQL_mysql($dbUserName,$dbPassword,$dbDBname,'localhost');
$db->query("SET NAMES 'utf8'");
date_default_timezone_set('Asia/Tehran');

?>