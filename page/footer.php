
        <hr style="border-top:1px solid #000;margin-bottom: 1px;">
        <div class="row clearfix footer" >
            <div class="col-md-12 col-lg-12 column">
                    <div class="col-md-4 col-lg-4 column">
                        <!--p>Copyright &copy; 2015 Gohar Group - All rights reserved.</p-->
                    </div>
                    <div class="col-md-4 col-lg-4 column">
                        <p style="margin-top:5px;direction:ltr;"><a href="http://webgozar.com"><img src="img/8.PNG" alt="وب گزر" ></a>&nbsp;&nbsp;Copyright &copy; 2015 Gohar Group - All rights reserved.</p>
                    </div>
                    <div class="col-md-4 col-lg-4 column">
                        <!--p>Copyright &copy; 2015 Gohar Group - All rights reserved.</p-->
                    </div>
            </div>
        </div>
		
		<!-- شروع دستورات تاریخ جستجو -->
        <link rel="stylesheet" href="js/date1/jquery-ui.css">
        <!--script src="js/date1/jquery-ui.js"></script-->
        <script src="js/date1/bootstrap-datepicker.min.js"></script>
        <script src="js/date1/bootstrap-datepicker.fa.min.js"></script>
        <script>
		$(document).ready(function(e) {
            
			$(function() {
				$( "#datepicker1" ).datepicker({
                    showButtonPanel: true,
					defaultDate: "0w",
                    isRTL: true,
                    dateFormat: "yy/m/d",
					currentText: "امروز",
					closeText: "بستن",
					prevText: "ماه قبل",
					nextText: "ماه بعد",
					changeMonth: true,
					selectedDay: 1,
					numberOfMonths: 2,
                    minDate: 0,
					onClose: function( selectedDate ) {
						$( "#datepicker2" ).datepicker( "option", "minDate", selectedDate );
					}
				});
				$("#datepicker1btn").click(function() {
                    //event.preventDefault();
                    $("#datepicker1").focus();
                });
				/*$('#btn_datepicker1').click(function(){
					$('#datepicker1').datetimepicker('show');
				});*/
				//$( "#datepicker1" ).datepicker( "option", "minDate", Today );
				$( "#datepicker2" ).datepicker({
                    showButtonPanel: true,
					defaultDate: "0w",
                    isRTL: true,
                    dateFormat: "yy/m/d",
					currentText: "امروز",
					closeText: "بستن",
					prevText: "ماه قبل",
					nextText: "ماه بعد",
					changeMonth: true,
					numberOfMonths: 2,
                    minDate: 0,
					onClose: function( selectedDate ) {
						$( "#datepicker1" ).datepicker( "option", "maxDate", selectedDate );
						minDate: 1;
					}
				});
				$("#datepicker2btn").click(function() {
                    //event.preventDefault();
                    $("#datepicker2").focus();
                });
				/*$('#btn_datepicker2').click(function(){
					$('#datepicker2').datetimepicker('show');
				});*/
			});
        });
        </script>
		<link rel="stylesheet" href="css/price-range.css">
		<script language="javascript" src="js/price-range.js"></script>
		<script language="javascript" src="js/main.js"></script>
		<!-- اتمام دستورات تاریخ جستجو -->
    </body>
</html>