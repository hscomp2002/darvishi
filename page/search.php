<?php
	function curPDate($inp)
	{
		$out = $inp;
		$tmp = explode('-',$inp);
		if((int)$tmp[1]<10)
			$tmp[1] = "0".$tmp[1];
		if((int)$tmp[2]<10)
                        $tmp[2] = "0".$tmp[2];
		$out = implode('-',$tmp);
		return($out);
	}
		//if (empty($_POST['way']))
		//	$way = 2;
		//else
		//	$way = $_POST['way'];
	$source = $_POST['source'];
	$destination = $_POST['destination'];
	$date1 = $_POST['date1'];
	$date2 = $_POST['date2'];
	//$time = $_POST['time'];
	//if (isset($_POST['f_number']) and empty($_POST['f_number']))
	//	$f_number = '724';
	//if (isset($_POST['f_number']) and !empty($_POST['f_number']))
	//	$f_number = $_POST['f_number'];
	//$airline = array($_POST['air_line']);
?>
								<!-- شروع باکس سمت چپ-->
                        <div class="col-md-8 col-xs-12 column pull-right">
                            <div class="row clearfix" style="padding-left:20px;padding-right:7px;margin-top: 10px;min-height:681px;">
								<div class="panel panel-default">
									
									<?php /*?>	<div class="col-sm-6"><em class="panel-body1">مرتب سازی براساس : 
											<select style="background-color:#dedede;min-width:50%;">
												<option value="1">قیمت</option>
												<option value="2">یک طرفه</option>
												<option value="3">دو طرفه</option>
												<option value="4">تاریخ</option>
											</select>
										</em></div><?php */?>
										
											<?php
$q_d=" source_yata='$_POST[source]'";
$q_s=" des_yata='$_POST[destination]'";

$q_d1=" `date`>='".curPDate(str_replace('/','-',$_POST['date1']))."' and time > '".date("H:i")."'";
$q_d2=" `date`<='".curPDate(str_replace('/','-',$_POST['date2']))."'";

$q="select date,airline,f_number,time,name_travel_agancy,capacity1,price1,id_gohar id_agency,tbl_flight_id id_flight,nCap,des_city,source_city,`date`,site    from travel_ticket where id_gohar in (".  implode(',', $allowedAgency).") and $q_s and $q_d and $q_d1 and $q_d2  order by `date`,price1 ASC   ";
$rows=$db->get_results($q);


$flights = array();
$flights='';
if($rows)
foreach($rows as $rw){
	if(!isset($flights[$rw->date]))
		$flights[$rw->date] = array();
	
	$flights[$rw->date][] = array(
            "airline" => $rw->airline,
            "f_number" => $rw->f_number,
            "time" => $rw->time,
            "name_travel_agancy" => $rw->name_travel_agancy,
            "capacity1" => $rw->capacity1,
            "price1" => (int)$rw->price1,
            "id_agency" => (int)$rw->id_agency,
            "date" => (int)$rw->date,
            "source_city" => (int)$rw->source_city,
            "des_city" => (int)$rw->des_city,
            "id_flight" => (int)$rw->id_flight,
            "nCap" => (int)$rw->nCap,
			"source_city" => $rw->source_city,
			"des_city" => $rw->des_city,
			"site" => 'airline724.ir'//$rw->site
			 
			
			
	);
}	
	
	
//var_dump($flights);

														






											?> 
									<div class="panel-heading">مسیر پروازی : 
										<?php
											if (isset($_POST['source']) && isset($_POST['destination']))
												//if ($way == '1')
												echo '<span id="selction-ajax">'.$source.'</span> به <span id="selction-ajax">'.$destination.'</span>';
												//if ($way == '2')
												//	echo '<span>'.$source.'</span> به <span>'.$destination.'</span> / ';
												//	echo '<span>'.$destination.'</span> به <span>'.$source.'</span>';
										?>
                                        
                                        <span style="float:left"><?php 
										if($num=$db->num_rows)
										echo $db->num_rows.' پرواز یافت شد';
										else 
										echo 'موردی یافت نشد';
										?>	</span>
									</div>
									<div class="panel-body pd_bgcolor" style="padding:1px;margin:1px;">	
									</div>
									
									<div class="panel-body pd_bgcolor" style="margin:0px;padding:0px;">
										<?php if($num){?>
										<script>
var flights = <?php echo json_encode($flights); ?>;
var flights_index='';
var current=0;
function chng(row){
	
    if( current==0 || current!=row )
    {$('.all').hide();
    current=row;

    }
    $('.tr'+row).toggle(500);

    if($('#img'+row).attr('src')=='img/up.png')
    $('#img'+row).attr('src','img/down.png');
    else
    $('#img'+row).attr('src','img/up.png');

}
function kharid(fl,index){
    //console.log(flights[fl][index]);
    flights_index=fl;
    flight_to_reserve = flights[fl][index];

    openAdult();
}
</script>
                                    	<table class="table table-bordered table-responsive">
										
											<?php
											
											
											
											$cl=1;
											foreach($flights as $fl=>$val){
													
													?>
                                                    <tr  style="background-image:url('img/trbg.jpg');cursor:pointer;"
													onclick="chng(<?php echo $cl?>)"
													>
                                                    <td  style="background-image:url('img/trbg.jpg');border:none">تاریخ</td>
													<?php
														 echo '<td style="background-image:url(\'img/trbg.jpg\');direction:ltr;border:none" colspan="2">'.$fl.'</td>';
														 echo '<td style="background-image:url(\'img/trbg.jpg\');cursor:pointer;;border:none">کمترین قیمت </td>
														 <td style="background-image:url(\'img/trbg.jpg\');border:none"> '.number_format($val[0]['price1']).'</td>';	

													echo '<td style="background-image:url(\'img/trbg.jpg\');border:none" colspan="4" align="left"><img src="img/down.png" id="img'.$cl.'" /></td></tr>
													
													';
											$mcl=0;
											$fr=0;
											foreach($val as $mm_index=>$rw)
											{
												
												if($fr++==0)
												echo '
												<tr style="display:none" class="all tr'.$cl.'">
													<th style="text-align:right;border-left:none;" >ایرلاین</th> 
                                                    <th style="text-align:center;border-right:none;border-left:none;"> شماره پرواز</th>
													<th style="text-align:center;border-right:none;">ساعت</th>
                                                    <th style="text-align:right;border-left:none;">تامین کننده</th>
                                                    <th style="text-align:center;border-right:none;">ظرفیت</th>
													<th style="text-align:center;" colspan="2">قیمت</th>
												</tr>
											';
												
												
														
											$bcl='';
											if($mcl++ % 2 ==0)
												$bcl=';background-color:#f6f6f6';
											echo '<tr style="display:none'.$bcl.'" class="all tr'.$cl.'">';

															echo '<td align="right"  style="border-left:none">'.$rw['airline'].'</td>';
															echo '<td align="center"  style="border-right:none;border-left:none">'.$rw['f_number'].'</td>';
															echo '<td align="center" style="border-right:none">'.$rw['time'].'</td>';
															echo '<td align="right" style="border-left:none">'.$rw['name_travel_agancy'].'</td>';
															echo '<td align="center" style="border-right:none;color:#F00">'.$rw['capacity1'].'</td>';
															echo '<td align="center" style=";border-left:none">'.number_format($rw['price1']).'</td>';
															echo '<td align="right" style="border-right:none;width:85px"><button class="btn btn-success" onclick="kharid(\''.$fl.'\','.$mm_index.');">&nbsp;خرید&nbsp;</button></td>';
															
														
													echo '</tr>';
											}
											$cl++;
											}
														
												?>
											
										</table>
                                        <?php } ?>
									</div>
								</div>
                            </div>
                        </div>
                        <!-- اتمام باکس سمت چپ-->
