<?php
    // start jquery button for search
    //session_start();
    if(isset($_POST['changeOption']))
    {
        $disabledSubmit = $_POST['disabledSubmit'];
        if($disabledSubmit == 1) $js = 'disabledSubmit:true';
        else $js = 'disabledSubmit:false';
        
        $autoRevert = $_POST['autoRevert'];
        if($autoRevert == 1) $js .= ',autoRevert:true';
        else $js .= ',autoRevert:false';
        
        $autoSubmit = $_POST['autoSubmit'];
        if($autoSubmit == 1) $js .= ',autoSubmit:true';
        else $js .= ',autoSubmit:false';
    }
    else
    {
        $disabledSubmit = 2;
        $autoRevert = 1;
        $autoSubmit = 2;
        $js = 'disabledSubmit:false,autoRevert:true,autoSubmit:false';
    }
    // end jquery button for search
    error_reporting(E_ALL);ini_set('display_errors', 1);
    include_once('include/config.php');
    //include('color_config.php');
?>
<!DOCTYPE html>
<html lang="fa-IR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="سیستم رزرواسیون گوهر">
        <meta name="author" content="گوهر فناور">
        <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css">
        <link rel="stylesheet/less" href="less/responsive.less" type="text/css"-->
        <!--append ‘#!watch’ to the browser URL, then refresh the page. -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-rtl.min.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/gcom.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="img/favicon.png">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <![endif]-->
        <!-- Fav and touch icons -->
        <script src="js/less-1.3.3.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
		<script src="js/print/jquery.PrintArea.js" ></script>
		<script type="text/javascript" src="js/jalali.js"></script>
        <script>
            var flight_to_reserve;
        </script>
        <script src="js/gcom.js" ></script>
        <title>گوهر&nbsp;724</title>
    </head>
    <body>
        <div class="row clearfix header">
            <div class="col-md-12 col-lg-12 col-xs-12 column">
                <div class="row clearfix" style="margin-top:7px;">
                	<div class="container" style="background-color:#060606;">
                        <div class="row clearfix">
		                    <div class="col-md-12 col-lg-12 col-xs-12 column">
                                <!-- شروع ماژول سمت چپ -->
                                <div class="col-md-1 col-lg-1 column"></div>
                                <div class="col-md-10 col-lg-10 col-xs-12 col-sm-12 column">
                                
                                    <img alt="" src="img/2.PNG" class="img-responsive ">
                                </div>
                                <div class="col-md-1 col-lg-1 column"></div>
                                <!--div class="col-md-3 col-lg-3 col-xs-12 col-sm-6 column">
                                    <img alt="" src="img/2.PNG" class="img-responsive pull-left">
                                </div>
                                <!-- اتمام ماژول سمت چپ -->
                                <!-- شروع ماژول سمت وسط --
                                <div class="col-md-6 col-lg-6  col-xs-12  col-sm-6"></div>
                                <!-- اتمام ماژول سمت وسط --
                                <!-- شروع ماژول سمت راست --
                                <div class="col-md-3 col-lg-3 col-xs-12 col-sm-6 column">
                                    <img alt="140x140" src="img/1.PNG" class="img-responsive pull-right">
                                </div>
                                <!-- اتمام ماژول سمت راست -->
                                
							</div>
                        </div>
                        <div class="row clearfix" style="border-bottom: 1px solid white;margin-bottom: 2px;">
		                    <div class="col-md-12 col-lg-12 col-xs-12 column">
                        <!-- شروع نمایش ساعت و تاریخ -->
                        <div class="row clearfix">
                                <div class="col-md-3 col-lg-3 col-xs-12 column" style="margin-bottom: -2px;">
                                    <div class="date"><p>
									<?php
                                    	include_once('include/pdate.php');
										echo pdate('Y , l  , d ,F').'&nbsp;|&nbsp;ساعت&nbsp;<span id="clock"></span>';
									?>
									<script type="text/javascript">
										function showClock() {
										var d = new Date();
										var h = d.getHours();
										var m = d.getMinutes();
										var s = d.getSeconds();
										if(m<10){ m = "0"+m; }
										if(s<10){ s = "0"+s; }
										document.getElementById("clock").innerHTML = s+" : "+m+" : "+h;
										t=setTimeout('showClock()',100);
										}
										t=setTimeout('showClock()',0);
                                    </script>
                                    </p></div>
                                </div>
                                </div>
                        <!-- اتمام نمایش ساعت و تاریخ -->
                        <!-- شروع منو بالا -->         <div class="row clearfix">
                                <div class="col-md-9 col-lg-9 col-xs-12 column" >
                                    <!--nav class="navbar navbar-default" role="navigation" style="float:right;">
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <p style="margin-right:35px;margin-top:-20px;margin-bottom:0px;">&nbsp;صفحه&nbsp;اصلی&nbsp;</p>
                                            </button>
                                        </div>
                                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                            <ul class="nav navbar-nav navbar-right">
                                                <li class="active">
                                                    <a href="index.php">صفحه اصلی</a>
                                                </li>
                                                <li>
                                                    <a href="#">اطلاعات آژانس ها</a>
                                                </li>
                                                <li>
                                                    <a href="#">دانلود گوهر</a>
                                                </li>
                                                <li>
                                                    <a href="#">گردشگری</a>
                                                </li>
                                                <li>
                                                    <a href="#">درباره ما</a>
                                                </li>
                                                <li>
                                                    <a href="#">ارتباط با ما</a>
                                                </li>
                                                <!--li class="dropdown">
                                                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">منو و زیر منو&nbsp;&nbsp;<strong class="caret"></strong></a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="#">Action</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Another action</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Something else here</a>
                                                        </li>
                                                        <li class="divider">
                                                        </li>
                                                        <li>
                                                            <a href="#">Separated link</a>
                                                        </li>
                                                        <li class="divider">
                                                        </li>
                                                        <li>
                                                            <a href="#">One more separated link</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav-->
                                </div>
                                </div>
                        <!-- اتمام منو بالا -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
