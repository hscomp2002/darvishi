<?php
    include_once("include/pdate.php");
    $mm_citys = array('MHD','KIH','GSM','TBZ','IFN','SYZ','AWZ');
    $q_s=" source_yata='THR'";
    $q_d=" and des_yata in ('".implode("','",$mm_citys)."')";

    $q_d1=" and `date`>='".pdate("Y-m-d")."' and `time` > '".date("H:i")."'";
    //$q_d2=" and `date`<=''";
    $q_d2 = ' and id_gohar in ('.  implode(',', $allowedAgency).')';

    //$q="select date,airline,f_number,time,name_travel_agancy,capacity1,price1,des_yata from travel_ticket where $q_s $q_d $q_d1 $q_d2     order by `date`,price1 ASC";
    $q="select * from travel_ticket where $q_s $q_d $q_d1 $q_d2     order by `date`,price1 ASC";
    $mm_rows=$db->get_results($q);
    $mm_out = '';
    $mm_data = array();
    foreach($mm_citys as $cit)
    {
        for($i = 0;$i < count($mm_rows);$i++)
        {
            if(!isset($mm_data[$cit]) && $mm_rows[$i]->des_yata==$cit)
            {
                $mm_data[$cit] = $mm_rows[$i];
               // $mm_data[$cit]->site = "http://airline724.ir";
            }
        }
    }
    //var_dump($mm_data);
?>




        <div class="row clearfix" style="border:1px solid #181613;margin-top: 10px;">
            <div class="container">
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="row clearfix" style="margin-top: 10px;">




			<div class="col-sm-3 col-xs-4 col-br-25" id="div_1">
                            <div class="thumbnail" id="f_box">
                                <!--img alt="300x200" src="img/01 copy.png" class="img-responsive img-rounded"-->
                                <div class="caption f_box" style="margin-bottom: 5px;">
                                    <h4 class="city-name" style="text-align: center;"></h4>
                                    <p class="flight_date"  style="text-align: center;"></p>
                                    <p class="price" style="text-align: center;"></p>
                                </div>
                                <a class="btn btn-default btn-block" role="button" onclick="kharid_arzan(1);">خرید</a>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-4 col-br-25" id="div_2">
                            <div class="thumbnail" id="f_box">
                                <!--img alt="300x200" src="img/01 copy.png" class="img-responsive img-rounded"-->
                                <div class="caption f_box" style="margin-bottom: 5px;">
                                    <h4 class="city-name" style="text-align: center;"></h4>
                                    <p class="flight_date"  style="text-align: center;"></p>
                                    <p class="price" style="text-align: center;"></p>
                                </div>
                               <a class="btn btn-default btn-block" role="button" onclick="kharid_arzan(2);">خرید</a>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-4 col-br-25" id="div_3">
                            <div class="thumbnail" id="f_box">
                                <!--img alt="300x200" src="img/01 copy.png" class="img-responsive img-rounded"-->
                                <div class="caption f_box" style="margin-bottom: 5px;">
                                    <h4 class="city-name" style="text-align: center;"></h4>
                                    <p class="flight_date"  style="text-align: center;"></p>
                                    <p class="price" style="text-align: center;"></p>
                                </div>
                               <a class="btn btn-default btn-block" role="button" onclick="kharid_arzan(3);">خرید</a>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-4 col-br-25" id="div_4">
                            <div class="thumbnail" id="f_box">
                                <!--img alt="300x200" src="img/01 copy.png" class="img-responsive img-rounded"-->
                                <div class="caption f_box" style="margin-bottom: 5px;">
                                    <h4 class="city-name" style="text-align: center;"></h4>
                                    <p class="flight_date"  style="text-align: center;"></p>
                                    <p class="price" style="text-align: center;"></p>
                                </div>
                               <a class="btn btn-default btn-block" role="button" onclick="kharid_arzan(4);">خرید</a>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-4  col-br-25" id="div_5">
                            <div class="thumbnail" id="f_box">
                                <!--img alt="300x200" src="img/01 copy.png" class="img-responsive img-rounded"-->
                                <div class="caption f_box" style="margin-bottom: 5px;">
                                    <h4 class="city-name" style="text-align: center;"></h4>
                                    <p class="flight_date"  style="text-align: center;"></p>
                                    <p class="price" style="text-align: center;"></p>
                                </div>
                               <a class="btn btn-default btn-block" role="button" onclick="kharid_arzan(5);">خرید</a>
                            </div>
                        </div>












                    </div>
                </div>
            </div>
        </div>
<script>
    var mm_data = <?php echo json_encode($mm_data); ?>;
    var i = 1;
    for(des in mm_data)
    {
        if($("#div_"+i).length>0 && parseInt(mm_data[des].price1,10)>0)
        {
            $("#div_"+i).find(".city-name").html(mm_data[des].source_city+' به '+mm_data[des].des_city);
            $("#div_"+i).find(".date").html(mm_data[des].date);
            $("#div_"+i).find(".price").html(mm_data[des].price1);
        }
        i++;
    }
    function kharid_arzan(id)
    {
        var i = 1;
        for(des in mm_data)
        {
            if(id === i)
            {
                flight_to_reserve = mm_data[des];
                openAdult();
            }
            i++;
        }
    }
</script>
