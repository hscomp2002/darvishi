<?php
    include_once('page/header.php');  
?>
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
                                            <style type="text/css">
                                                .rightalign{text-align: right;}
                                            </style>
                                            <table class="table table-bordered table-responsive" style="border: none;">
                                                <tbody>
                                                    <tr class="rightalign">
                                                        <td class="rightalign">مبدا</td>
                                                        <td class="rightalign">مشهد</td>
                                                    </tr>
                                                    <tr class="rightalign">
                                                        <td class="rightalign">مقصد</td>
                                                        <td class="rightalign">تهران</td>
                                                    </tr>
                                                    <tr class="rightalign">
                                                        <td class="rightalign">نام ایرلاین</td>
                                                        <td class="rightalign">گوهر</td>
                                                    </tr>
                                                    <tr class="rightalign">
                                                        <td class="rightalign">تاریخ پرواز</td>
                                                        <td class="rightalign">1/1/1394</td>
                                                    </tr>
                                                    <tr class="rightalign">
                                                        <td class="rightalign">روز پرواز</td>
                                                        <td class="rightalign">شنبه</td>
                                                    </tr>
                                                    <tr class="rightalign">
                                                        <td class="rightalign">ساعت پرواز</td>
                                                        <td class="rightalign">11:33</td>
                                                    </tr>
                                                    <tr class="rightalign">
                                                        <td class="rightalign">شماره پرواز</td>
                                                        <td class="rightalign">666</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- شروع باکس سمت چپ-->      
                        
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
            <form method="" name="" id="" accept="" action="">
                <table class="table table-bordered table-responsive" style="margin:0px;padding:0px;margin-top: 3px;">
                    <thead>
                        <tr>
                            <!--th class="Theader">&nbsp;ایرلاین&nbsp;/&nbsp;شماره&nbsp;پرواز&nbsp;/&nbsp;ساعت&nbsp;پرواز</t-->
                            <th>ردیف</th>
                            <th>سن</th>
                            <th>جنسیت</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>کد ملی</th>
                            <th>تاریخ تولد</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                                <td><?php echo 'adult'; ?></td>
                            <td>
                                <select name="sex">
                                    <option value="1">مرد</option>
                                    <option value="2">زن</option>
                                </select>
                            </td>
                            <td><input type="text" name="fname" id="fname" size="15" maxlength="15"></td>
                            <td><input type="text" name="lname" id="lname" size="15" maxlength="15"></td>
                            <td><input type="text" name="m_code" id="m_code" size="15" maxlength="15"></td>
                            <td>
                                <span>
                                <select name="day-born">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="1">5</option>
                                        <option value="1">6</option>
                                        <option value="1">7</option>
                                        <option value="1">8</option>
                                        <option value="1">9</option>
                                        <option value="1">10</option>
                                        <option value="1">11</option>
                                        <option value="1">12</option>
                                        <option value="1">13</option>
                                        <option value="1">14</option>
                                        <option value="1">15</option>
                                        <option value="1">16</option>
                                        <option value="1">17</option>
                                        <option value="1">18</option>
                                        <option value="1">19</option>
                                        <option value="1">20</option>
                                        <option value="1">21</option>
                                        <option value="1">22</option>
                                        <option value="1">23</option>
                                        <option value="1">24</option>
                                        <option value="1">25</option>
                                        <option value="1">26</option>
                                        <option value="1">27</option>
                                        <option value="1">28</option>
                                        <option value="1">29</option>
                                        <option value="1">30</option>
                                        <option value="1">31</option>
                                </select></span><span>
                                <select name="month-born">
                                        <option value="1">فروردین</option>
                                        <option value="2">اردیبهشت</option>
                                        <option value="3">خرداد</option>
                                        <option value="4">تیر</option>
                                        <option value="5">مرداد</option>
                                        <option value="6">شهریور</option>
                                        <option value="7">مهر</option>
                                        <option value="8">آبان</option>
                                        <option value="9">آذر</option>
                                        <option value="10">دی</option>
                                        <option value="1">بهمن</option>
                                        <option value="12">اسفند</option>
                                </select></span><span>
                                <select name="year-born">
                                    <optgroup label="1320">
                                        <option value="20">1320</option>
                                        <option value="21">1321</option>
                                        <option value="22">1322</option>
                                        <option value="23">1323</option>
                                        <option value="24">1324</option>
                                        <option value="25">1325</option>
                                        <option value="26">1326</option>
                                        <option value="27">1327</option>
                                        <option value="28">1328</option>
                                        <option value="29">1329</option>
                                    </optgroup>
                                    <optgroup label="1330">
                                        <option value="30">1330</option>
                                        <option value="31">1331</option>
                                        <option value="32">1332</option>
                                        <option value="33">1333</option>
                                        <option value="34">1334</option>
                                        <option value="35">1335</option>
                                        <option value="36">1336</option>
                                        <option value="37">1337</option>
                                        <option value="38">1338</option>
                                        <option value="39">1339</option>
                                    </optgroup>
                                </select>
                            </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered table-responsive" style="margin-top: 3px;">
                    <tr class="rightalign">
                        <td class="rightalign">
                            <span class="rightalign">تلفن همراه</span>
                            <span><input type="tel" name="phone" id="phone"></span>
                        </td>
                        <td class="rightalign">
                            <span class="rightalign">آدرس</span>
                            <span class="rightalign"><input type="text" name="address" id="address"></span>
                        </td>
                    </tr>
                    <tr class="rightalign">
                        <td class="rightalign">
                            <span  class="rightalign">پست الکترونیکی</span>
                            <span class="rightalign"><input type="email" name="email" id="email"></span>
                        </td>
                        <td class="rightalign">
                            <span>ملاحظات</span>
                            <span><input type="text" name="more" id="more"></span>
                        </td>
                    </tr>
                </table>
                <table class="table table-bordered table-responsive" style="border: 1px solid #000 !important;margin-top: 3px;">
                    <tbody style="border: 1px solid #000 !important;">
                        <tr style="border: 1px solid #000 !important;">
                            <td style="border: 1px solid #000 !important;">شرح</td>
                            <td style="border: 1px solid #000 !important;">تعداد</td>
                            <td style="border: 1px solid #000 !important;">قیمت واحد</td>
                            <td style="border: 1px solid #000 !important;">کمیسیون</td>
                            <td style="border: 1px solid #000 !important;">مجموع قیمت</td>
                        </tr> 
                        <tr style="border: 1px solid #000 !important;">
                            <td style="border: 1px solid #000 !important;">پرواز رفت</td>
                            <td style="border: 1px solid #000 !important;">1 نفر</td>
                            <td style="border: 1px solid #000 !important;">1,500,000 ریال</td>
                            <td style="border: 1px solid #000 !important;">10%</td>
                            <td style="border: 1px solid #000 !important;">1,500,000</td>
                        </tr>
                        <tr style="border: 1px solid #000 !important;">
                            <td style="border: 1px solid #000 !important;" colspan="3">جمع</td>
                            <td style="border: 1px solid #000 !important;"><input type="text" name="com" id="com"></td>
                            <td style="border: 1px solid #000 !important;"><input type="text" name="com" id="com"></td>
                        </tr>
                        <tr style="border: 1px solid #000 !important;">
                            <td style="border: 1px solid #000 !important;" colspan="4">قابل پرداخت</td>
                            <td style="border: 1px solid #000 !important;"><input type="text" name="com" id="com"></td>
                        </tr>
                        <tr style="border: 1px solid #000 !important;">
                            <td style="border: none !important;" colspan="4"></td>
                            <td style="border: none !important;"><button class="btn btn-success btn-left" style="margin-left: 3px;">لغو پرواز</button><button class="btn btn-success btn-left">ثبت پرواز</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
            </div>
        </div>
    </div>
</div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <!-- اتمام باکس سمت چپ-->  
                    </div>
                </div>
            </div>
        </div>  
                        
<?php
    include_once('page/footer.php');
?>