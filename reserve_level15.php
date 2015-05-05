<?php
    include_once('include/config.php');
    include_once("include/pdate.php");
    if(!isset($_REQUEST['reserve_data']))
    {
        die('wrong input');
    }
    function generateOption($inp,$start,$selected=-1)
    {
        $ou='';
        for($i=$start;$i<=$inp;$i++)
        {
            $ou.='<option '.($i==$selected?'selected="selected"':'').' value="'.$i.'">'.$i.'</option>';
        }
        return($ou);
    }
    function generateField($list)
    {
        $ou='';
        for($i=0;$i<count($list);$i++)
        {
            
            $ou.='<tr>';
            $ou.='<td>'.($i+1).'</td>';
            $ou.='<td><input type="hidden" name=\'mosafer[age][]\' value="'.$list[$i]['age'].'" ></td>';
            $ou.='<td><input type="text"  name=\'mosafer[sex][]\' value="'.$list[$i]['sex'].'" ></td>';
            $ou.='<td><input type="text"  name=\'mosafer[name][]\' value="'.$list[$i]['name'].'" ></td>';
            $ou.='<td><input type="text"  name=\'mosafer[family][]\' value="'.$list[$i]['family'].'" ></td>';
            $ou.='<td><input type="text"  name=\'mosafer[code_melli][]\' value="'.$list[$i]['passport'].'" ></td>';
            $ou.='<td><input type="text"  name=\'mosafer[birthday_day][]\' value="'.$list[$i]['birthday_day'].'" ></td>';
            $ou.='<td><input type="text"  name=\'mosafer[birthday_month][]\' value="'.$list[$i]['birthday_month'].'" ></td>';
            $ou.='<td><input type="text"  name=\'mosafer[birthday_year][]\' value="'.$list[$i]['birthday_year'].'" ></td>';
            $ou.='</tr>';
        }
        return($ou);
    }
    function drawNames($list)
    {
        $out='';
        for($i=0;$i<count($list);$i++)
        {
            $out.='
                <tr>
                    <td>'.$i.'</td>
                    <td>'.$list[$i]['age'].'</td>
                    <td>'.$list[$i]['sex'].'</td>
                    <td>'.$list[$i]['name'].'</td>
                    <td>'.$list[$i]['family'].'</td>
                    <td>'.$list[$i]['passport'].'</td>
                    <td>'.$list[$i]['birthday_year'].'/'.$list[$i]['birthday_month'].'/'.$list[$i]['birthday_day'].'</td>
                </tr>';
        }
        return($out);
    }
         
    if(isset($_POST['mosafer']))
    {
        $j=count($_POST['mosafer']['age']);
        for($i=0;$i<$j;$i++)
        {
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
    
    $all = json_decode(str_replace('\\"','"',$_REQUEST['reserve_data']));
    $flight = $all->flight;
    //$ou = generateField($all->adult,getDate(),$age_select,'Adult');
    //$ou .= generateField($all->child,$tarikh,$age_select,'Child');
    //$ou .= generateField($all->inf,$tarikh,$age_select,'Inf');
    $ou = generateField($listMosafer);
    if(isset($_POST['submit'])){
        $ticket_ids = explode(',',$_REQUEST["ticket_id"]);
        foreach($ticket_ids as $i=>$ticket_id)
        {
            $q = "update `ticket` set `name` = '".$_POST['mosafer']['name'][$i]."', `family` = '".$_POST['mosafer']['family'][$i]."', `age` = '".$_POST['mosafer']['age'][$i]."', `sex` = '".$_POST['mosafer']['sex'][$i]."', `pass_id` = '$i', `birthday_year` = '".$_POST['mosafer']['birthday_year'][$i]."', `birthday_month` = '".$_POST['mosafer']['birthday_month'][$i]."', `birthday_day` = '".$_POST['mosafer']['birthday_day'][$i]."', `tarikh` = '".pdate("Y-m-d")."', `voucher_id` = '".$_POST['voucher']."', `aim` = '".$_POST['aim']."' where id = $ticket_id";
            $db->query($q);
        }
    }
    include_once('page/header.php');  
?>
<div style='display: none;' >
    <form id="frm1" action="reserve_level2.php" method="post" >
        <?php echo $ou; ?>
        <input type="hidden" name="submit" value="submit" >
        <input type="hidden" name="voucher" value="<?php echo $all->reserve_1->ticket[0]->voucher_id; ?>" >
        <input type="hidden" name="aim" value="<?php echo $all->reserve_1->ticket[0]->aim; ?>" >
        <input type="hidden" name="agency_site" value="<?php echo $flight->site; ?>" >
        <input type="hidden" name="ticket_id" value="<?php echo implode(',',$all->reserve_1->ticket_id); ?>" >
        <input type="hidden" name="reserve_data" value='<?php echo $_REQUEST['reserve_data']; ?>' >
        <input type="hidden" name="email" value="<?php echo $_REQUEST['email'] ?>" >
        <input type="hidden" name="mobile" value="<?php echo $_REQUEST['mobile'] ?>" >
        <button id="sub_btn">
            
        </button>
    </form>
</div>
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 col-lg-12 column">
                    <div class="row clearfix">
                        <!-- شروع باکس سمت راست-->
                        <div class="col-md-4 col-lg-4 col-xs-12 column pull-right">
                            <div class="row clearfix" style="padding-left:7px;margin-top: 12px;">
                                <div class="tabbable" id="tabs-207930">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">اطلاعات پرواز</h3>
                                        </div>
                                        <div class="panel-body" style="background-color: white;border: 1px solid #000;">
                                            <section class="s-form">
                                                <table class="table table-bordered table-responsive">
                                                <tbody>
                                                    <tr>
                                                        <td>مبدا</td>
                                                        <td><?php echo $flight->source_city; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>مقصد</td>
                                                        <td><?php echo $flight->des_city; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>نام ایرلاین</td>
                                                        <td><?php echo $flight->airline; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>تاریخ پرواز</td>
                                                        <td><?php echo $all->date; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ساعت پرواز</td>
                                                        <td><?php echo $flight->time; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>شماره پرواز</td>
                                                        <td><?php echo $flight->f_number; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
<div class="col-md-8 col-lg-8 col-xs-12 column" style="margin-top: 12px;">
    <div class="row clearfix" style="padding-left:20px;padding-right:7px;min-height:763px;">
        <div class="panel panel-default">
            <div class="panel-heading ph_bgcolor">
                <table class="table table-bordered table-responsive" style="margin:0px;padding:0px;border: none;background-color: none !important;">
                    <thead style="border: none;background-color: none !important;">
                        <tr style="border: none;background-color: none !important;">
                            <td style="border: none;background-color: none !important;">اطلاعات مسافران</td>
                            <td style="border: none;background-color: none !important;"></td>
                            <td class="red-box">زمان باقیمانده رزرو 05:00</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="panel-body pd_bgcolor">       
                <table class="table table-bordered table-responsive" style="margin:0px;padding:0px;margin-top: 3px;">
                        <tr>
                            <!--th class="Theader">&nbsp;ایرلاین&nbsp;/&nbsp;شماره&nbsp;پرواز&nbsp;/&nbsp;ساعت&nbsp;پرواز</t-->
                            <td>ردیف</td>
                            <td>سن</td>
                            <td>جنسیت</td>
                            <td>نام</td>
                            <td>نام خانوادگی</td>
                            <td>کد ملی</td>
                            <td>تاریخ تولد</td>
                        </tr>
                        <?php
                        echo drawNames($listMosafer);
                        ?>
                </table>
                <div class="row gc-margin gc-padding gc-div">
                    <div class="col-lg-6" >
                    تلفن همراه: 
                    <?php echo $_REQUEST['mobile']; ?>
                    </div>
                    <div class="col-lg-6" >
                    ایمیل: 
                    <?php echo $_REQUEST['email']; ?>
                    </div>
                </div>
                <div class="text-left">
                    <button class='btn btn-default' onclick="$('#sub_btn').click();">
                    تایید اطلاعات
                    </button>
                    <button class='btn btn-default' onclick="window.location='index.php'" >
                        بازگشت
                    </button>        
                </div>
            </div>
        </div>
    </div>
</div>

