<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script type="text/javascript">
  //  function printPage(){
            window.print();
   //     }
</script>

<style type="text/css">
    #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

.date{
    font-size: 16pt;
    font-weight: bold;
    direction:rtl;
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>
<!--Author      : @arboshiki-->
<div id="invoice" style="min-height: 1200px;">

    <div class="invoice overflow-auto">
        <div style="min-width: 600px;">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="img/a.png" data-holder-rendered="true" height="140" style="padding-left: 10%;">
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a style="font-size: 30pt;" target="_blank" href="#">
                            علم دار
                            </a>
                        </h2>
                        <div style="font-size: 24pt;">للتجهيز والشحن من الصين</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light"></div>
                        <h2 class="to"></h2>
                        <div class="address"></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">فاتورة حساب  </h1>
                        <div class="date">اسم المجهز : {{$claint->user->name}}</div>
                        <div class="date">رقم هاتف الموظف : {{$claint->user->phone}}</div>
                        <div class="date">رقم الطلبية : {{$claint->id}}</div>
                        <div class="date">اسم الزبون : {{$claint->name}}</div>
                        <div class="date">رقم هاتف الزبون : {{$claint->phone}}</div>
                        <div class="date">العنوان : {{$claint->address}} </div>
                        <div class="date">اقرب نقطة دالة  : {{$claint->point}}</div>
                        <div class="date">الملاحظات : {{$claint->notes}}</div>
                        <div class="date">التاريخ : {{date("m-d-yy")}}</div>
                    </div>
                </div>
                <table style="direction: rtl;">
                    <thead>
                        <tr>
                            <th style="text-align: center;">التسلسل</th>
                            <th style="text-align: center;">المنتج</th>
                            <th style="text-align: center;">السعر</th>
                            <th style="text-align: center;">العدد</th>
                            <th style="text-align: center;">المجموع</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $total = 0;
                            $len   = count($claint->total);
                            $item  = $claint->item();
                        @endphp

                            @for($i=0;$i<$len;$i++)
                                @php 
                                    $col = $claint->total[$i] * $claint->count[$i];
                                    $total+=$col;
                                @endphp
                                <tr>
                                    <td style="text-align: center;" class="no">{{$i+1}}</td>
                                    <td style="text-align: center;" style="text-align: center;">{{$item[$i]}}</td>
                                    <td style="text-align: center;" class="unit">{{$claint->total[$i]}}</td>
                                    <td style="text-align: center;" class="qty">{{$claint->count[$i]}}</td>
                                    <td style="text-align: center;" class="total">{{$col}}</td>
                                </tr>
                           @endfor 
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">المجموع</td>
                            <td>{{$total}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">سعر التوصيل</td>
                            <td>{{$claint->del_count}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">السعر مع التوصيل</td>
                            <td>{{$total + $claint->del_count}}</td>
                        </tr>
                    </tfoot>
                </table>
                <div style="height: 120px;"></div>
                <footer style=" direction: rtl;">
                    <div style="display: sticky;">
                        <div style="margin-right:4%;font-size: 16pt;text-align: right;color: black !important;" class="notice">عنوان الشركة  المنصور الاميرات  عمارة نبع بغداد مجاور حقائب مارينا</div>
                        <div style="text-align: left;margin-top: -1%;color: red !important; font-size: 16pt;"> رقم المتابعه   
                            <br>
                            07740563860<br>07731716424
                        </div>
                        <div style="margin-right:4%; margin-top:2%; font-size: 16pt;text-align: right;color: black !important;" class="notice">powred by <a href="https://creative-projects.co/"> Creative Projects</a></div>
                    </div>
                </footer>
            </main>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('input').blur(function(){
        //3sec after the user leaves the input, printPage will fire
        doPrintPage = setTimeout('printPage();', 3000);
    });
    $('input').focus(function(){
        //But if another input gains focus printPage won't fire
        clearTimeout(doPrintPage);
    });
});
</script>