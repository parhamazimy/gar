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
    .top{
        border-bottom: 1px solid black;
    }
    .top h3{
        margin-right: 1cm;
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
    <div class="top">
        <h3>مشخصات مقام پیشنهاد دهنده:</h3>
        <label >نام </label>
        <input type="text" value="<?= $print->namecadre  ?>">
        <label >نام خانوادگی </label>
        <input type="text" value="<?= $print->familycadre  ?> ">
        <label >کد پرسنلی </label>
        <input type="text" value="<?= $print->vacationsid  ?> ">
    </div>
    <div class="title">
        <h2><?php
        if($print->status == 0) echo "برگه تشویقی";
        if($print->status == 1) echo "برگه تنبیهی";
        if($print->status == 2) echo "برگه خلا و اضافه خدمت ناشی از خلا";
            ?></h2>
    </div>
    <div class="contain">
       <h3>مشخصات فرد مورد <?php if($print->status == 0) echo "تشویق";else echo "تنبیه"; ?> :</h3>

        <label >نام </label>
        <input type="text" value="<?= $print->name  ?>">
        <label >نام خانوادگی </label>
        <input type="text" value="<?= $print->family  ?> ">

        <label >کد ملی </label>
        <input type="text" value="<?= $print->nationalcode  ?>">
        <label >شناسنامه</label>
        <input type="text" value="<?= $print->birthcertificate  ?> ">

        <label >نام پدر </label>
        <input type="text" value="<?= $print->father  ?>">
        <label >تحصیلات </label>
        <input type="text" value="<?= $print->education  ?> ">

        <label >رشته </label>
        <input type="text" value="<?= $print->fieldofStudy  ?>">
        <label >تاریخ اعزام به خدمت </label>
        <input type="text" value="<?= mds_date('y/m/d',$print->timedispatch)  ?> ">

        <label >تاریخ ورود </label>
        <input type="text" value="<?= mds_date('y/m/d',$print->timearrival)  ?>">
        <label >تاهل</label>
        <input type="text" value="<?php if($print->married == 1) {echo "متاهل";}else{echo "مجرد";}  ?> ">

        <label >وضعیت سلامتی </label>
        <input type="text" value="<?php if($print->health == 1) {echo "سالم";}else{echo "معاف از رزم";}  ?>">
        <label >واحد خدمت </label>
        <input type="text" value="<?php if($print->access == 1) {echo "انسانی";}else{echo "گردان";}  ?> ">


    </div>
    <div style="border-bottom: 1px solid black;border-top: 1px solid black;  padding: 1cm;
        font-size: 18px;">
        <h3>نوع عمل :</h3>
        <?php
        $i = 3;
        if($print->status == 2){
            $i = 1;
            ?>
            <label >غیبت از تاریخ </label>
            <input type="text" value="<?= $print->dates  ?>">
            <label >تا تاریخ</label>
            <input type="text" value="<?= $print->datef  ?>">
            <label >توضیحات </label>
        <?php
        }
        ?>
        <textarea style="display: block;width: 100%;border: none;min-height: <?=$i?>cm">
<?= $print->description   ?>
        </textarea>
    </div>
    <div style="border-bottom: 1px solid black">
        <h3  style="margin-right: 1cm">نوع <?php if($print->status == 0) echo "تشویق";else echo "تنبیه"; ?> :</h3>
        <?php if($print->status == 2){?>
            <label >خلا به مدت</label>
            <input type="text" value="<?= $print->dalaytime  ?>">
            <label >روز و اضافه خدمت به مدت</label>
            <input type="text" value="<?= $print->time  ?> روز">
            <?php
        }else{?>
            <label ><?php if($print->status == 0) echo "مرخصی تشویقی";else echo "اضافه خدمت"; ?> به مدت  </label>
            <input type="text" value="<?= $print->time  ?>">
            <label >روز </label>
           <?php
        }
        ?>

    </div>
    <i style="float: right !important;margin-right: 1cm">مهر و امضای <br>پیشنهاد دهنده</i>
    <i style="margin-left: 1cm">مهر و امضای <br> اجرا کننده</i>


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