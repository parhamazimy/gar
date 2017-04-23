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
        padding: 0mm 3mm;
    }
    input,label{
        display: inline-block;
        width: 22%;
        border: none;
        text-align: center;
    }
    .b{
        width: 26% !important;
    }
    .s{
        width: 20% !important;
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
        width: 100%;
        min-height: 15mm;
        max-height: 16mm;
    }

</style>
<section class="page">
    <div class="ln header">
        <span>شماره : <?= $print->number ?></span><br>
        <span>تاریخ : <?= mds_date('Y/m/d',$print->inserttime) ?></span>
    </div>
    <div class="title ln">تشویق پرسنل وظیفه</div>
    <div class="s1 ln">
        <p  >مشخصات مقام پیشنهاد دهنده :</p>

        <label>نام و نام خانوادگی :</label>
        <input value="<?= $print->cadrename . ' '. $print->cadrefamily ?>">
        <label>مسئولیت :</label>
        <input value="<?= mas($print->access) ?>">
        <!--  line-->
        <label>درجه یا رتبه</label>
        <input value="<?= $print->cadrerating ?>">
        <label>جایگاه :</label>
        <input value="<?= jay($print->access) ?>">
        <!--  line-->
    </div>
    <div class="s1 ln">
        <p  >مشخصات فرد مورد تشویق :</p>

        <label>نام و نام خانوادگی :</label>
        <input value="<?=$print->name.' '.$print->family ?>">
        <label>نام پدر :</label>
        <input value="<?=$print->father ?>">
        <!--  line-->
        <label>شماره ملی</label>
        <input value="<?=$print->nationalcode ?>">
        <label>میزان تحصیلات :</label>
        <input value="<?=$print->education ?>">
        <!--  line-->
        <label>دین</label>
        <input value="<?=$print->religion ?>">
        <label>مذهب:</label>
        <input value="<?=$print->sect ?>">
        <!--  line-->
        <label class="b">تاریخ اعزام به خدمت:</label>
        <input class="s" value="<?=mds_date('Y/m/d',$print->timedispatch) ?>">
        <label class="b">تاریخ ورود به مجموعه:</label>
        <input class="s" value="<?=mds_date('Y/m/d',$print->timearrival) ?>">

        <!--  line-->
        <label>درجه</label>
        <input value="<?=$print->rating ?>">
        <label>وضعیت تاهل:</label>
        <input value="<?=$print->name ?>">

        <!--  line-->
        <label class="b">وضعیت سلامتی جسمانی:</label>
        <input class="s" value="<?=health($print->health) ?>">
        <label class="b">وضعیت سلامتی روانی :</label>
        <input class="s" value="<?=$print->mental ?>">
        <!--  line-->
        <label>وضعیت بومی</label>
        <input value="<?=boomi($print->boomi) ?>">
        <label>واحد خدمت:</label>
        <input value="<?=$print->serviceunit ?>">
        <!--  line-->
    </div>
    <div class="s1 ln">
        <p  >نوع عمل قابل تشویق :</p>
        <label>توضیحات:</label>
        <textarea><?=$print->action ?></textarea>
    </div>
    <div class="s1 ln">
        <p  >نوع تشویقی :</p>
        <label class="b">مرخصی تشویقی به مدت:</label>
        <input value="<?= $print->day?>">
        <label>روز</label>
    </div>
    <div class="s1 ln">
        <p>مواد استنادی آیین نامه انضباطی یا قانون :</p>
        <input value="<?=$print->rule ?>">
    </div>
    <div class="s1">
        <i class="r">
            <span>مهر و امضای</span>
            <span>پیشنهاد دهنده</span>
        </i>
        <i class="l">
            <span>مهر و امضای</span>
            <span>اجرا کننده</span>
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
            return "تشویق  ";
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
