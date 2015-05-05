<?php
    include_once('page/header.php');
    $err = '';
    $is_bank = FALSE;
    $bank_body = '';
    if(isset($_SERVER ['QUERY_STRING']))
    {
        parse_str(base64_decode($_SERVER ['QUERY_STRING']));
        $is_bank = isset($bank_status);
        if($is_bank)
        {
            if($bank_status=='ok')
            {
                $hs_ou='<div class="alert alert-success" >
                        پرداخت با موفقیت انجام شد 
                        </div>
                        <div class="alert alert-success" >
                            شماره پیگیری : 
                            '.$bank_refrence.'
                        </div>
                        <div class="alert alert-success" >
                            شماره واچر : 
                            '.$bank_voucher_id.'
                        </div>
                        <div>
                            <a href="http://ticket.ansarbank.net/gohar/ticket_curl.php?voucher_id='.$bank_voucher_id.'" target="_blank"  class="btn btn-lg" "  >
                                جهت چاپ بلیط اینجا کلیک کنید
                            </a>
                            <!-- <button class="btn btn-lg" onclick="print_ticket(\''.$bank_voucher_id.'\');"  >
                                جهت چاپ بلیط اینجا کلیک کنید
                            </button>
                            -->
                        </div>
';
            }
            else
            {
                $hs_ou='<div class="alert alert-danger gc-80" >
                       تراکنش مالی ناموفق
                        <br/>
در صورت کسر مبلغ از حساب شما تا ۱۵ دقیقه دیگر به حساب شما   باز خواهد گشت.
                        <br/>
                        در صورت عدم بازگشت با پشتیبانی تماس بگیرید.
                        </div>
                        <div class="alert alert-danger" >
                            
                            '.$bank_msg.'
                        </div>
                        <div>
                            <button class="btn btn-info btn-lg" onclick=\'$("#bank_back").modal("hide");\' >
                                جستجوی مجدد
                            </button>
                        </div>
';
                        
            }    
            //$bank_body = "status = $bank_status,voucher_id = $bank_voucher_id,if status == 'ok' then refrence = $bank_refrence,if status != 'ok' then msg = $bank_msg";
            $bank_body = $hs_ou;
        }
    }
    if(isset($_REQUEST['fail']))
    {
        $err = 'شماره واچر '.$_REQUEST['voucher_id'].' در رزرو با خطای ذیل مواجه شد '."\\n".$_REQUEST['fail'];
    }
    function loadOption($adl=FALSE)
    {
        $ou='';
        $j=$adl?1:0;
        for($i=$j;$i<10;$i++)
        {
            $ou.='<option value="'.$i.'" >'.$i.'</option>';
        }
        return($ou);
    }
    
?>
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 col-lg-12 column">
                    <div class="row clearfix">
                        <!-- شروع باکس سمت راست-->
                        <div class="col-md-4 col-lg-4 col-xs-12 column pull-right">
                            <div class="row clearfix" style="padding-left:7px;margin-top: 12px;">
                                <div class="tabbable" id="tabs-207930">
                                    <section class="s-form">
                                    <ul class="nav nav-tabs nav-justified">
                                        <li class="active" id="space">
                                            <a href="#panel-952733" data-toggle="tab">جستجو پرواز</a>
                                        </li>
                                        <li id="space">
                                            <a href="#panel-2" data-toggle="tab">جستجو </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                    
                                        <!-- شروع جستجو پرواز -->
                                        
                                        <div class="tab-pane active" id="panel-952733">
                                            <form role="form" class="form-horizontal" name="flight" method="POST" action="index.php">
                                                <!--div class="form-group">
                                                    <div class="col-sm-1 col-lg-1"></div>
                                                    <div class="col-sm-10 col-lg-10">
                                                        <label class="radio-inline">یک طرفه<input type="radio" value="1" name="way" id="inlineRadio1"></label>
                                                        <label class="radio-inline">دو طرفه<input type="radio" value="2" name="way" id="inlineRadio2" checked></label>
                                                    </div>
                                                    <div class="col-sm-1 col-lg-1"></div>
                                                </div-->
                                                <div class="form-group" style="margin-top: 10px;">
                                                    <div class="col-sm-1 col-lg-1"></div>
<label for="inputEmail3" class="col-sm-2 col-lg-2 control-label">مبدا</label>                                                    
<div class="col-sm-8 col-lg-8">
                                                        <input type="text" id="autocomplete" autocomplete="on" class="form-control" placeholder="نام شهر مبدا خود را بنویسید" aria-describedby="basic-addon2">
                                                        <input type="hidden" name="source" id="source">
                                                    </div>
                                                    
                                                    <div class="col-sm-1 col-lg-1"></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-1 col-lg-1"></div>
<label for="inputEmail3" name="scity" class="col-sm-2 col-lg-2 control-label">مقصد</label>
                                                    <div class="col-sm-8 col-lg-8">
                                                        <input type="text" id="autocomplete1" autocomplete="on" class="form-control" placeholder="نام شهر مقصد خود را بویسید" aria-describedby="basic-addon2">
                                                        <input type="hidden" name="destination" id="destination">
                                                    </div>
                                                    
                                                    <div class="col-sm-1 col-lg-1"></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-1 col-lg-1"></div>
<label class="control-label col-sm-2 col-lg-2" for="datepicker1">از تاریخ</label>                                                    
<div class="col-sm-8 col-lg-8">
                                                        <div class="input-group">
<input type="text" name="date1" class="form-control" id="datepicker1" aria-describedby="inputGroupSuccess2Status">
                                                            <span class="input-group-btn" >
                                                                <button type="button" class="btn btn-default" id="datepicker1btn">
                                                                    <img src="img/date.PNG">
                                                                </button>
                                                            </span>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-1 col-lg-1"></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-1 col-lg-1"></div>
<label class="control-label col-sm-2 col-lg-2" for="datepicker2">تا تاریخ</label>                                                    
<div class="col-sm-8 col-lg-8">
                                                        <div class="input-group">
<input type="text" name="date2" class="form-control" id="datepicker2" aria-describedby="inputGroupSuccess2Status">
                                                            <span class="input-group-btn" >
                                                                <button type="button" class="btn btn-default" id="datepicker2btn">
                                                                    <img src="img/date.PNG" >
                                                                </button>
                                                            </span>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-1 col-lg-1"></div>
                                                </div>
                                                <script type="text/javascript" src="js/auto_search/jquery.autocomplete.js"></script>
                                                <script type="text/javascript" src="js/auto_search/jquery.mockjax.js"></script>
                                                <script type="text/javascript" src="js/auto_search/demo.js"></script>
                                                
                                                <!-- شروع جستجو پیشرفته -
                                                <div class="panel panel-default" id="delete_marginbottom">
                                                    <div class="panel-heading" style="margin-bottom:20px;">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                                                <span class="btn btn-default btn-block pull-right">
                                                                    جستجو پیشرفته
                                                                </span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <!-- برای غیر فعال بودن منو از دستور collapse باید استفاده شود -
                                                    <div id="womens" class="panel-collapse collapse" style="height: auto;">
                                                    
                                                    <!-- برای غیر فعال بودن منو از دستور in استفاده شود و در صورت نیاز کافی اخط زیر را فعال و خط بالا را غیر فعال کنید >
                                                    <div id="womens" class="panel-collapse in" style="height: auto;"->
                                                    
                                                        <div class="panel-body" id="delete_paddingbottom">
                                                            <ul id="delete_paddingright">
                                                                <p id="delete_all">بازه زمانی پرواز</p>
                                                                <div class="panel-body" id="delete_paddingbottom">
                                                                    <div class="slider slider-horizontal" style="width: 328px;margin-top:12px;">
                                                                        <!--div class="slider-track">
                                                                            <div class="slider-selection" style="left: 10%; width: 62.7622622622623%;"></div>
                                                                            <div style="left: 10%; width: 62.7622622622623%;"></div>
                                                                            <div class="slider-handle triangle left-triangle" style="left: 10%;"></div>
                                                                            <div class="round_right" style="left: 10%;"></div>
                                                                            <!--div class="slider-handle round_right" style="left: 10%;"></div>
                                                                        </div->
                                                                        <div class="tooltip top">
                                                                            <div class="tooltip-arrow"></div>
                                                                            <div class="tooltip-inner">00:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;00:24</div>
                                                                        </div>
                                                                        <input type="text" class="span2 tooltip-inner" data-slider-min="00" data-slider-max="24" data-slider-step="1" data-slider-value="[0,24]" id="sl2" name="time">
                                                                    </div><br>
                                                                    <span>ساعت 24:00</span><span style="margin-right:57%;">ساعت 00:00</span>
                                                                </div>
                                                            </ul><hr>
                                                            <p style="font-family:naskh;">انتخاب شرکت هواپیمایی</p>
                                                            <div class="form-group">
                                                                <div class="col-xs-6 col-md-6 col-lg-6 pull-right">
                                                                    <label class="radio-inline">
                                                                        <input type="checkbox" name="mahan" id="inlinecheckbox1" value="mahan" checked>
                                                                        &nbsp;&nbsp;ماهان&nbsp;&nbsp;
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="checkbox" name="iran_air" id="inlinecheckbox1" value="iran_air" checked>
                                                                        &nbsp;&nbsp;ایران ایر تور&nbsp;&nbsp;
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="checkbox" name="aseman" id="inlinecheckbox1" value="aseman" checked>
                                                                        &nbsp;&nbsp;آسمان&nbsp;&nbsp;
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="checkbox" name="ata" id="inlinecheckbox1" value="ata" checked>
                                                                        &nbsp;&nbsp;آتا&nbsp;&nbsp;
                                                                    </label>
                                                                </div>
                                                                <div class="col-xs-6 col-md-6 col-lg-6 pull-right">
                                                                    <label class="radio-inline">
                                                                        <input type="checkbox" name="gheshm" id="inlinecheckbox1" value="gheshm" checked>
                                                                        &nbsp;&nbsp;قشم ایر&nbsp;&nbsp;
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="checkbox" name="kish" id="inlinecheckbox1" value="kish" checked>
                                                                        &nbsp;&nbsp;کیش ایر&nbsp;&nbsp;
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="checkbox" name="zagros" id="inlinecheckbox1" value="zagros" checked>
                                                                        &nbsp;&nbsp;زاگرس&nbsp;&nbsp;
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="checkbox" name="atrak" id="inlinecheckbox1" value="atrak" checked>
                                                                        &nbsp;&nbsp;اترک&nbsp;&nbsp;
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="f_number" id="f_number" class="form-control" placeholder="شماره پرواز">
                                                                </div>
                                                                <label class="col-sm-3 control-label">شماره پرواز</label>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <script type="text/javascript">
                                                        var countries = {
                                                            <?php /*
                                                                $cts=$db->get_results("select fa_name,en_name,yata from city");
                                                                $m=0;
                                                                foreach($cts as $ct)
                                                                {    
                                                                    if($m++!=0)echo ',';
                                                                        echo '"'.$ct->yata.'": "'.$ct->fa_name.' / '.$ct->yata.' / '.$ct->en_name.'"';
                                                                }   */
                                                            ?>
                                                        }
                                                        function validate(){
                                                            if($('#source').val()==''){alert('شهر مبدا را انتخاب کنید');return false;}
                                                            if($('#destination').val()==''){alert('شهر مقصد را انتخاب کنید');return false;}
                                                            if($('#datepicker1').val()==''){alert('تاریخ شروع را انتخاب کنید');return false;}
                                                            if($('#datepicker2').val()==''){alert('تاریخ پایان را انتخاب کنید');return false;}
                                                        }
                                                    </script>
                                                    <div class="form-group">
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-10">
                                                            <button type="submit" name="submit" value="submit" class="btn btn-success btn-block">جستجو</button>
                                                            <p class="search-text">دکمه جستجو را به سمت چپ بکشید</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- اتمام جستجو پیشرفته -->
                                                    <script type="text/javascript">
                                                        var countries = {
                                                            <?php 
                                                                $cts=$db->get_results("select fa_name,en_name,yata from city");
                                                                $m=0;
                                                                foreach($cts as $ct)
                                                                {    
                                                                    if($m++!=0)echo ',';
                                                                        echo '"'.$ct->yata.'": "'.$ct->fa_name.' / '.$ct->yata.' / '.$ct->en_name.'"';
                                                                }   
                                                            ?>
                                                        };
                                                        var err = "<?php echo $err; ?>";
                                                        var is_bank = <?php echo (($is_bank)?'true':'false'); ?>;
                                                        $(document).ready(function(){
                                                            if(is_bank)
                                                                showBankModal();
                                                            if($.trim(err)!=='')
                                                                alert(err);
                                                        });
                                                        function showBankModal()
                                                        {
                                                            $("#bank_back").modal("show");
                                                        }
                                                        function validate(){
                                                            if($('#source').val()==''){alert('شهر مبدا را انتخاب کنید');return false;}
                                                            if($('#destination').val()==''){alert('شهر مقصد را انتخاب کنید');return false;}
                                                            if($('#datepicker1').val()==''){alert('تاریخ شروع را انتخاب کنید');return false;}
                                                            if($('#datepicker2').val()==''){alert('تاریخ پایان را انتخاب کنید');return false;}
                                                        }
                                                    </script>
                                                    <div class="form-group">        
                                                        <div class="col-sm-12">
                                                            <button type="submit" name="submit" value="submit" class="btn btn-success btn-block" onClick="return validate()">جستجو</button>
                                                            <p class="search-text">دکمه جستجو را به سمت چپ بکشید</p>
                                                            
                                                            
                                                            
                                                             <!--link rel="stylesheet" href="include/search_btn/jquery/QapTcha.jquery.css" type="text/css" />
                                                            
                                                            <div class="QapTcha"></div>
                                                            <script type="text/javascript">
                                                                $(document).ready(function(){
                                                                    $('.QapTcha').QapTcha({
                                                                        disabledSubmit:true,
                                                                        autoRevert:true,
                                                                        autoSubmit:true
                                                                    });
                                                                });
                                                            </script>
                                                            
                                                            <script type="text/javascript" src="include/search_btn/jquery/jquery-ui.js"></script>
                                                            <script type="text/javascript" src="include/search_btn/jquery/jquery.ui.touch.js"></script>
                                                            <script type="text/javascript" src="include/search_btn/jquery/QapTcha.jquery.js"></script-->
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                
                                                
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="panel-2">
                                            <div style="margin-top: 10px;" >
                                                <input class="form-control" id="s_voucher_id" placeholder="شماره واچر را وارد کنید" >
                                            </div>
                                            <div class="gc-padding" id="khoon" ></div>
                                            <div >
                                                <button class="btn btn-success btn-block" onclick="search_ticket();" >جستجو</button>
                                            </div>    
                                        </div>
                                        <!-- اتمام جستجو پرواز -->
                                        
                                    </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <!-- شروع باکس سمت چپ-->
                        <!--  modal  start-->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="black-modal-content" >
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">
                                    لطفا تعداد مسافران خود را انتخاب نمایید:
                                </h4>
                              </div>
                              <div class="modal-body" >
                                    <div>
                                        <div class="row gc-padding gc-margin">
                                            <div class="col-sm-3" >
                                                برزگسال (<۱۲)
                                            </div>
                                            <div class="col-sm-3">
                                                <select id="adult" >
                                                    <?php echo loadOption(TRUE); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row gc-padding gc-margin">
                                            <div class="col-sm-3">
                                                کودک (۲-۱۲)
                                            </div>
                                            <div class="col-sm-3">
                                                <select id="child" >
                                                    <?php echo loadOption(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row gc-padding gc-margin">
                                            <div class="col-sm-3" >
                                               نوزاد (۰-۲)
                                            </div>
                                            <div class="col-sm-3" >
                                                <select id="inf" >
                                                    <?php echo loadOption(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" id="sabt_reserve" class="btn btn-default" onclick="reserve_1();" >رزرو پرواز</button>
                                  <span id="khoon" ></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="bank_back" tabindex="-1" role="dialog" aria-labelledby="bank_backLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content" style="width:800px;left:25%">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">
                                   بازگشت از بانک
                                </h4>
                              </div>
                              <div class="modal-body" id="bank_back_body" >
                                    <?php
                                        echo $bank_body;
                                    ?>
                              </div>
                              <div class="modal-footer">
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--  modal  end-->
                        <form id="frm1" action="info.php" method="post" >
                            <input type="hidden" name="reserve_data" id="reserve_data" >
                        </form>
                        <?php
                            if (isset($_POST['submit']))
                            {
                                include_once('page/search.php');
                            }
                            else{
                                include_once('page/content.php');
                                
                            }
                        ?>
                        
                        
                        
                        
                        <!-- اتمام باکس سمت چپ-->  
                    </div>
                </div>
            </div>
        </div>  
                        
<?php
    include_once('page/slider.php');
    include_once('page/footer.php');
?>