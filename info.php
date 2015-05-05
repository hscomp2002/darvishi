<?php
    include_once('page/header.php');
    include_once ('include/gcom.php');
    $GLOBALS['cont']=0;
    function generateOption($inp,$start,$order,$selected=-1)
    {
        $ou='';
	if($order == 1)
	{
		for($i=$start;$i<=$inp;$i++)
		{
		    $ou.='<option '.($i==$selected?'selected="selected"':'').' value="'.$i.'">'.$i.'</option>';
		}
	}
	else
	{
		for($i=$inp;$i>$start;$i--)
		{
		    $ou.='<option '.($i==$selected?'selected="selected"':'').' value="'.$i.'">'.$i.'</option>';
		}
	}
        return($ou);
    }
    function generateField($inp,$tarikh,$age_select,$age)
    {
        $ou='';
        for($i=0;$i<$inp;$i++)
        {
            $ou.='<tr>';
            $ou.='<td>'.($GLOBALS['cont']+1).'</td>';
            $ou.='<td>'.$age.'<input type="hidden" name=\'mosafer[age][]\' value="'.$age.'" ></td>';
            $ou.='<td><select id="'.$age.'_age_'.$i.'" name=\'mosafer[sex][]\' >'.$age_select.'</select></td>';
            $ou.='<td><input placeholder="نام" class="zoor" type="text" id="'.$age.'_fname_'.$i.'" name=\'mosafer[name][]\' ></td>';
            $ou.='<td><input placeholder="نام خانوادگی" class="zoor" type="text" id="'.$age.'_lname_'.$i.'" name=\'mosafer[family][]\' ></td>';
            $ou.='<td><input placeholder="کد ملی" class="zoor" type="text" id="'.$age.'_melli_'.$i.'" name=\'mosafer[code_melli][]\' ></td>';
            $ou.='<td'.(($age=='Inf')?' class="inf-birthdate inf-'.$i.'"':'').'>'.$tarikh.'</td>';
            $ou.='</tr>';
            $GLOBALS['cont']++;
        }
        return($ou);
    }
    //var_dump($_REQUEST['reserve_data']);
    $all = json_decode(str_replace('\\"','"',$_REQUEST['reserve_data']));
    $flight = $all->flight;
    //var_dump($all->reserve_1->ticket[0]);
    $age_select ='<option value="1">
                    مرد
                </option>
                <option value="0">
                    زن
                </option>';
    $tarikh='
        <select name=\'mosafer[birthday_day][]\'>
            <option value="-1" >روز</option>
            '.generateOption(31,1,1).'
        </select>
        <select name=\'mosafer[birthday_month][]\' >
            <option value="-1" >ماه</option>
            '.generateOption(12,1,1).'
        </select>
        <select name=\'mosafer[birthday_year][]\' >
            <option value="-1" >سال</option>
            <'.generateOption(1394,1300,-1).'
        </select> 
            ';
    $itarikh='
        <select class="inf-day" name=\'mosafer[birthday_day][]\' >
            <option value="-1" >روز</option>
            '.generateOption(31,1,1).'
        </select>
        <select class="inf-month" name=\'mosafer[birthday_month][]\' >
            <option value="-1" >ماه</option>
            '.generateOption(12,1,1).'
        </select>
        <select class="inf-year" name=\'mosafer[birthday_year][]\' >
            <option value="-1" >سال</option>
            <'.generateOption(1394,1391,-1).'
        </select> 
            ';
    $ou = generateField($all->adult,$tarikh,$age_select,'Adult');
    $ou .= generateField($all->child,$tarikh,$age_select,'Child');
    $ou .= generateField($all->inf,$itarikh,$age_select,'Inf');
    //$adl = generateField($all->child,$tarikh,$age_select,'Child');
    //var_dump($all);
?>
<div class="container">
    <div class="col-lg-2 gc-border gc-gray gc-margin gc-padding" >
        اطلاعات پرواز
    </div>
    <div class="col-lg-9 gc-border gc-gray gc-margin gc-padding" >
        اطلاعات مسافران
    </div>
    <div class="col-lg-2 gc-border gc-margin gc-padding" >
        <div class="gc-padding" >
            مبدا:
            <?php echo $flight->source_city; ?>
        </div>
        <div class="gc-padding" >
            مقصد:
            <?php echo $flight->des_city; ?>
        </div>
        <div class="gc-padding" >
            نام ایرلاین:
            <?php echo $flight->airline; ?>
        </div>
        <div class="gc-padding" >
            تاریخ پرواز:
            <span dir="ltr">
            <?php echo $all->date; ?>
            </span>    
        </div>
        <div class="gc-padding" >
            ساعت پرواز:
            <?php echo $flight->time; ?>
        </div>
        <div class="gc-padding" >
            شماره پرواز:
            <?php echo $flight->f_number; ?>
        </div>
    </div>
    <div class="col-lg-9 gc-border gc-margin gc-padding" >
        <form method="post" action="reserve_level15.php" id="form132" >
        <table class="table table-bordered gc-table">
            <tr>
                <th>
                    ردیف
                </th>
                <th>
                    سن
                </th>
                <th>
                    جنسیت
                </th>
                <th>
                    نام <span style="color:red;">*</span>reserve_
                </th>
                <th>
                    نام خانوادگی  <span style="color:red;">*</span>

                </th>
                <th>
                    کدملی <span style="color:red;">*</span>

                </th>
                <th>
                    تاریخ تولد <span style="color:red;">*</span>

                </th>
            </tr>
            <?php
                echo $ou;
            ?>
        </table>
            <input type="hidden" name="submit" value="submit" >
            <input type="hidden" name="voucher" value="<?php echo $all->reserve_1->ticket[0]->voucher_id; ?>" >
            <input type="hidden" name="aim" value="<?php echo $all->reserve_1->ticket[0]->aim; ?>" >
            <input type="hidden" name="agency_site" value="<?php echo $flight->site; ?>" >
            <input type="hidden" name="ticket_id" value="<?php echo implode(',',$all->reserve_1->ticket_id); ?>" >
            <input type="hidden" name="reserve_data" value='<?php echo str_replace('\"','"',$_REQUEST['reserve_data']); ?>' >
            <div class="row gc-margin">
                <div class="col-lg-6" >
                تلفن همراه: 
                <input name="mobile" type="text" class="mobile zoor"  >
                </div>
                <div class="col-lg-6" >
                ایمیل: 
                <input name="email" type="text"  >
                </div>
            </div>
            <div class="gc-margin">
                <div class="row gc-margin gc-padding">
                    <div class="col-lg-4">
                        مبلغ کل:
                        <?php echo monize($all->reserve_1->ticket[0]->total+$all->reserve_1->ticket[0]->offer); ?>
                         ریال
                    </div>
                    <div class="col-lg-4">
                        تخفیف :
                        <?php echo monize($all->reserve_1->ticket[0]->offer); ?>
                         ریال
                    </div>
                    <div class="col-lg-4">
                        مبلغ قابل پرداخت:
                        <?php echo monize($all->reserve_1->ticket[0]->total); ?>
                         ریال
                    </div>
                </div>    
                <a class="btn btn-default" onclick="sendInfo();" >
                    ثبت پرواز
                </a>
                <a class="btn btn-default" href="index.php"  >لغو پرواز</a>
            </div>
            <button id="submitter" style="display: none;">A</button>
        </form>
    </div>
</div>
<script>
	var today_s = '<?php echo $all->date; ?>';
	function sendInfo()
	{
            var ok = true;
            $(".zoor").removeClass('gc-border-red');
            $.each($(".zoor"),function(id,field){
                    if($(field).val()==='')
                    {
                            //alert('لطفا فیلد '+$(field).prop('placeholder')+' را وارد کنید');
                            $(field).addClass('gc-border-red');
                            ok = false;
                            //return(false);
                    }
            });
            var bool = getInfDates();
            if(ok === false)
                alert('لطفا فیلد '+'های قرمز را'+' را وارد کنید');
            console.log('bool',bool);
            if(!bool)
            {
                alert('سن نوزاد می بایست کمتر از ۲ سال باشد');
            }
            else if(ok === true)
                    $("#submitter").click();
                    
	}
	function getInfDates()
	{
            var inf_dates = [];
            $(".inf-birthdate").removeClass("gc-border-red");
            $(".inf-birthdate").each(function(id,feild){
                var i = $(feild).prop("className").trim(' ')[1].trim('-')[1];
                var day = $(feild).find("select.inf-day").val();
                var month = $(feild).find("select.inf-month").val();
                var year = $(feild).find("select.inf-year").val();
                inf_dates.push({
                        "td" : $(feild),
                        "year" : year,
                        "month" : month,
                        "day" : day
                });
            });
            console.log(inf_dates);
            return(validateInfDates(inf_dates));
	}
        var sag;
        function validateInfDates(inf_dates)
        {
            var out = true;
            var today_tmp = JalaliDate1.jalaliToGregorian(today_s.split('-')[0],today_s.split('-')[1],today_s.split('-')[2]);
            var td = new Date(today_tmp[0],today_tmp[1],today_tmp[2]);
            for(i in inf_dates)
            {
                var tmp_d = JalaliDate1.jalaliToGregorian(inf_dates[i].year,inf_dates[i].month,inf_dates[i].day);
                var date1 = new Date(tmp_d[0],tmp_d[1],tmp_d[2]);
                var day_dif = Math.floor((td - date1) / (1000*60*60*24));
                if(day_dif > 2*365)
                {
                    inf_dates[i].td.addClass("gc-border-red");
 
                    out = false;
                }
            }
            return (out);
        }
</script>   
<?php
    include_once('page/footer.php');
?>
