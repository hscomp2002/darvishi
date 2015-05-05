function openAdult()
{
    $('#myModal').modal('show');
}
function closeAdult(){
    $('#myModal').modal('hide');
}
function reserve_1()
{
    var p = {
        "agency":((typeof flight_to_reserve.id_agency !== 'undefined')?flight_to_reserve.id_agency:flight_to_reserve.id_gohar),
        "flight" :((typeof flight_to_reserve.id_flight !== 'undefined')?flight_to_reserve.id_flight:flight_to_reserve.tbl_flight_id),
        "ncap":flight_to_reserve.nCap,
        "adult":$("#adult").val(),
        "child":$("#child").val(),
        "inf":$("#inf").val(),
        "export":"json",
        "submit":"submit"

    };
    console.log(p);
    $("#khoon").html('<img src="img/status_fb.gif" />');
    $("#sabt_reserve").prop("disabled",true);
    $.post('reserve_level1.php',p,function(result){
        console.log(result);
        var res_arr = JSON.parse(result);
        var res = res_arr.ticket[0];
        console.log(res_arr);
        if(parseInt(res.status,10)===1)
        {
            //window.location = "info.php?voucher_id="+res.voucher_id+"&total="+res.total+"&aim="+res.aim+"&adult="+$("#adult").val()+"&child="+$("#child").val()+"&inf="+$("#inf").val()+"&";
            var reserve_data_1 = {
                "flight" : flight_to_reserve,
                "adult" : $("#adult").val(),
                "child": $("#child").val(),
                "inf": $("#inf").val(),
                "reserve_1" : res_arr,
                "date" : flights_index
            };
            $("#reserve_data").val(JSON.stringify(reserve_data_1));
            $("#frm1").submit();
        }
        else
        {
            $("#khoon").html('');
            $("#sabt_reserve").prop("disabled",false);
            alert('در رزرو خطایی رخ داد لطفا مجددا سعی نمایید');
            closeAdult();
        }
    }).fail(function(){
        $("#khoon").html('');
        $("#sabt_reserve").prop("disabled",false);
        alert('در ارتباط با سرور مشکلی پیش آمد ، لطفت مجددا سعی نمایید');
    });
}
function print_ticket(voucher_id)
{
    obj={"voucher_id":voucher_id};
	var ifr = "<iframe style='width:100%;height:15cm;'  name='ifr'  id='ifr' src='http://stand.darvishibooking.ir/ticket_curl.php?voucher_id="+voucher_id+"' ></iframe>";
	$("#bank_back_body").html(ifr);
	window.frames['ifr'].focus();
	window.frames['ifr'].print();
	$("#bank_back").modal("hide");
/*
    $.get("ticket_curl.php",obj,function(result){
        $("#bank_back_body").html(result);
		prin();
   });
*/
}
function prin()
{
        var pageNo = 'چاپ بلیط الکترونیک';
        var headElements =  '<meta charset="utf-8" >,<meta http-equiv="X-UA-Compatible" content="IE=edge" >' ;
        var options = { mode : 'popup', popClose :true, extraCss : '', retainAttr : ["class", "id", "style", "on"], extraHead : headElements ,popHt: 500,popWd: 700,popTitle:pageNo};
        $("#ifr").printArea(options);

}
function search_ticket()
{
    var v_id = $("#s_voucher_id").val();
    if(v_id==='')
    {
        alert('شماره واچر وارد نشده است');
        return false;
    }    
    var ob={
        'check_voucher':v_id
    };
    $("#khoon").html("<img src='img/status_fb.gif' >");
    $.get("ticket_curl.php",ob,function(res){
        if(res==='1')
        {
            window.location = 'ticket_curl.php?voucher_id='+v_id;
        }
        else
        {
            $("#khoon").html("<div class='alert alert-danger' >شماره واچر وارد شده موجود نیست</div>");
        }    
    });
}
