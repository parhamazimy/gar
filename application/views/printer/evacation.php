<!DOCTYPE html>
<html lang="fa_IR" dir="rtl">
<head>
    <meta charset="UTF-8">
</head>
<body>
<style>
    @page {
        /* dimensions for the whole page */
        size: A5;
        margin: 0;
    }

    html {
        /* off-white, so body edge is visible in browser */
        height: 210mm;
        width: 148.5mm;
        margin: 0;
    }

    body {
        /* A5 dimensions */
        font-family: "B Lotus" !important;
        height: 210mm;
        width: 148.5mm;
        font-size: 1.1em;

        margin: 0;
        padding: 1mm;
    }
    .page{
        margin: 0px auto;
        border: 0.5mm solid black;
        width: 100%;
        height: 100%;
        position: relative;
    }
    .ln{
        border-bottom: 0.5mm solid black;
    }
    .header{
        position: relative;
        display: block;
        text-align: left;
    }
    .title{
        text-align: center;
        font-size: 22px;
    }
    .s1{
        padding: 4mm 3mm;
    }
    input,label{
        display: inline-block;
        width: 22%;
        border: none;
        text-align: center;
    }
    .b{
        width: 35% !important;
    }
    .s{
        width: 13% !important;
    }
    p{
        padding: 0mm;
        margin: 0mm 4mm 0mm 0mm;
        font-weight: bolder;
        font-size: 1.1em;

    }
    .r{
        margin: 2mm 15mm;
        text-align: center;
        float: right;
    }
    .l{
        margin: 2mm 15mm;
        text-align: center;
        float: left;
    }
    .r span{
        display: block;
    }
    .l span{
        display: block;
    }
    textarea{
        border: none;
        width: 90%;
        padding: 2mm 5mm;
        min-height: 25mm;
        max-height: 10mm;
    }
    .c{
        float: none;
        display: inline-block;
        margin: 2mm 9mm;
    }
    .c span{
        display: block;
    }
    .bb{
        width: 70% !important;
    }
    .dot{
        border-bottom: 1mm dotted black;
    }
    .mm{
        display: inline-block;
        width: 21%;
        margin-top: 2mm;
        margin-right: 4mm;
        text-align: center;
    }
    .mm span{
        text-align: center;
        display: block;
    }

</style>
<section class="page">
    <div class="ln header">
        <span>شماره : <?= $print->number ?></span><br>
        <span>تاریخ : <?= mds_date('Y/m/d',$print->inserttime) ?></span>
    </div>
    <div class="title ln">برگه مرخصی</div>
    <div class="s1 dot">

        <label class="b">بدین وسیله برادر وظیفه :</label>
        <input  value="<?= $print->name . ' '. $print->family ?>">
        <label class="s">فرزند :</label>
        <input class="s" value="<?= $print->father ?>">
        <!--  line-->
        <label class="b">دارای شماره شناسنامه :</label>
        <input value="<?= $print->birthcertificate ?>">
        <label class="s"> شماره ملی :</label>
        <input value="<?= $print->nationalcode ?>">
        <!--  line-->
        <label class="b">تاریخ اعزام به خدمت :</label>
        <input class="s" value="<?= mds_date('y/m/d',$print->timedispatch) ?>">
        <label class="b">تاریخ ورود به مجموعه :</label>
        <input class="s" value="<?= mds_date('y/m/d',$print->timearrival) ?>">
        <!--  line-->
        <label>با درجه :</label>
        <input value="<?= $print->rating ?>">
        <label>جمعی :</label>
        <input value="<?= '-' ?>مجاز است">
        <!--  line-->
        <label>از ساعت :</label>
        <input value="<?= mds_date('h:i',$print->times) ?>">
        <label>تاریخ :</label>
        <input value="<?= mds_date('y/m/d',$print->times) ?>">
        <!--  line-->
        <label>تا ساعت :</label>
        <input value="<?= mds_date('h:i',$print->timef) ?>">
        <label>تاریخ :</label>
        <input value="<?= mds_date('y/m/d',$print->timef)?>">
        <!--  line-->
        <label class="s">به مدت :</label>
        <input class="s" value="<?= $print->time ?>">
        <label class="bb" >روز از مرخصی <?=$print->condition?> استفاده نماید.</label>
        <!--  line-->
        <label class="b">علت درخواست مرخصی:</label>
        <textarea><?=$print->text?></textarea>
        <!--  line-->
        <i class="mm">
            <span>مهر و امضای</span>
            <span>بهدای </span>
        </i>
        <i class="mm">
            <span>مهر و امضای</span>
            <span>مسئول قسمت </span>
        </i>
        <i class="mm">
            <span>مهر و امضای</span>
            <span> گردان قرارگاه</span>
        </i>

        <i class="mm">
            <span>مهر و امضای</span>
            <span>نیروی انسانی </span>
        </i>

    </div>
    <div class="s1">
        <label class="b">بدین وسیله برادر وظیفه :</label>
        <input class="b" value="<?= $print->name . ' '. $print->family ?>">
        <label>مجاز است</label>

        <label>از ساعت :</label>
        <input value="<?= mds_date('h:i',$print->times) ?>">
        <label>تاریخ :</label>
        <input value="<?= mds_date('y/m/d',$print->times) ?>">
        <!--  line-->
        <label>تا ساعت :</label>
        <input value="<?= mds_date('h:i',$print->timef) ?>">
        <label>تاریخ :</label>
        <input value="<?= mds_date('y/m/d',$print->timef)?>">
        <!--  line-->
        <label class="s">به مدت :</label>
        <input class="s" value="<?= $print->time ?>">
        <label class="bb">روز از مرخصی <?= $print->condition ?> استفاده نماید.</label>
        <br>
        <i class="l">
            <span>مهر و امضای</span>
            <span>نیروی انسانی </span>
        </i>

    </div>


</section>



<script>
    window.print();
</script>
</body>
</html>
<?php
function jay($stat){
    if($stat == 2 or $stat == 1 ){
        return 'گردان';
    }else{
        return 'نیروی انسانی';
    }
}
function mas($stat){
    if($stat == 2 or $stat == 4 ){
        echo 'کادر';
    }else{
        echo 'وظیفه';
    }
}
function maried($rat){
    switch ($rat) {
        case "1":
            return "متاهل  ";
            break;

        default:
            return "مجرد";
    }
}
function health($rat){
    switch ($rat) {
        case "1":
            return "سالم  ";
            break;

        default:
            return "معاف از رزم";
    }
}
function boomi($rat){
    switch ($rat) {
        case "1":
            return "بومی  ";
            break;

        default:
            return "غیر بومی";
    }
}
function delaystat($rat){
    switch ($rat) {
        case "0":
            return "تنبیه  ";
            break;
        case "1":
            return "تنبیه  ";
            break;
        case "2":
            return "خلا و اضافه خدمت ناشی از خلا  ";
            break;

        default:
            return "غیر بومی";
    }
}
?>
