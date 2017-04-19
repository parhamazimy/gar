<!DOCTYPE html>
<html lang="fa_IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>برگه</title>
</head>
<body>
<style>
    .book{
        width:21cm; height:29.7cm;
        border:1px solid black;
        position: relative;
        margin: 0px auto;
    }
    .header{
        border-bottom: 1px solid black;
        text-align: right;
    }
    .header h1{
        margin-right: 2cm;
    }
    .header i{
        margin-top: 0cm;
        float: left;
    }
    .header i span{
        margin-left: 1cm;
        float: left;
    }
    .title{
        text-align: center;
        border-bottom: 1px solid black;
    }
    .contain,.footer{
        padding: 1cm;
        font-size: 18px;
    }
    span,label{
        margin-bottom: 0.5cm;
    }
    .contain span{
        display: inline-block;
        width: 31.33%;
        text-align: center
    }
    label{
        display: inline-block;
        width: 25%;
        text-align: center;
    }
    input{
        display: inline-block;
        width: 23%;
        text-align: center;
        border: none;
        font-weight: bolder;
    }
    .footer{
        border-top: 1px dashed black;
    }
    i{
        margin-top: 1cm;
        float: left;
    }


</style>
<div class="book">
    <div class="header">
        <i>
            <span>شماره :<?= $print->id?></span><br>
            <span>تاریخ :<?=mds_date('y/m/d') ?></span>
        </i>
        <h1>بسمه تعالی</h1>
    </div>
    <div class="title">
        <h2>برگه مرخصی</h2>
    </div>
    <div class="contain">
        <label >بدین وسیله برادر وظیفه </label>
        <input type="text" value="<?= $print->name . $print->family  ?>">
        <label >فرزند </label>
        <input type="text" value="<?= $print->father  ?> ">

        <label >دارای شماره شناسنامه</label>
        <input type="text" value="<?= $print->birthcertificate   ?>">
        <label >و شماره ملی</label>
        <input type="text" value="<?= $print->nationalcode   ?> ">

        <label >با درجه </label>
        <input type="text" value="<?= $print->rating   ?>">
        <label >مجاز است </label>
        <input type="text" value="">

        <label >از ساعت</label>
        <input type="text" value="<?= mds_date('h',$print->times)  ?>">
        <label >تاریخ</label>
        <input type="text" value="<?= mds_date('y/m/d',$print->times)  ?>">

        <label >تا ساعت</label>
        <input type="text" value="<?= mds_date('h',$print->timef)  ?>">
        <label >تا تاریخ</label>
        <input type="text" value="<?= mds_date('y/m/d',$print->timef)  ?>">

        <label >به مدت</label>
        <input type="text" value="<?php echo round(($print->timef - $print->times)/(60*60*60)) ?>">
        <label >روز</label>
        <input type="text" value="از مرخصی  <?php status($print->status); ?>  استفاده کند.   ">

        <label style="display: block" >علت مرخصی :</label>
        <textarea style="display: block;width: 100%;border: none;min-height: 5cm">
<?= $print->description   ?>
        </textarea>
        <span>مهر و امضای <br> مسئول قسمت</span>
        <span>مهر و امضای <br> مسئول قسمت</span>
        <span>مهر و امضای <br> مسئول قسمت</span>

    </div>
    <div class="footer">
        <label >بدین وسیله برادر وظیفه </label>
        <input type="text" value="<?= $print->name . $print->family  ?>">
        <label >مجاز است </label>
        <input type="text" value=" ">

        <label >از ساعت</label>
        <input type="text" value="<?= mds_date('h',$print->times)  ?>">
        <label >تاریخ</label>
        <input type="text" value="<?= mds_date('y/m/d',$print->times)  ?>">

        <label >تا ساعت</label>
        <input type="text" value="<?= mds_date('h',$print->timef)  ?>">
        <label >تا تاریخ</label>
        <input type="text" value="<?= mds_date('y/m/d',$print->times)  ?>">

        <label >به مدت</label>
        <input type="text" value="<?php echo round(($print->timef - $print->times)/(60*60*60)) ?>">
        <label >روز</label>
        <input type="text" value="از دژبانی خارج گردد.">
        <i>مهر و امضای <br>نیروی انسانی</i>

    </div>


</div>
<script>
    window.print();
</script>
</body>
</html>
<?php
function status($val){
    if($val == 0){
        echo "ساعتی";
    }elseif($val=1){
        echo "تشویقی";
    }elseif($val=1){
        echo "استحقاقی";
    }elseif($val=1){
        echo "استعلاجی";
    }elseif($val=1){
        echo "استراحتی";
    }
}
?>