@extends('admin.masteradmin')
@section('css')
    <link rel="stylesheet" href="{{$root}}public/css/jspc-gray.css">
@endsection
@section('content')

    <div class="page-header t#455a64" style="color: rgb(69, 90, 100);">
        <h2 class="page-title">ثبت نام جدید</h2>
        <ol class="breadcrumb">
            <li><a href="{{base_url('admin')}}.html">پنل ادمین</a></li>
            <li><span>ثبت نام جدید</span></li>
        </ol>
    </div>
    <!-- content -->
    <table id="content_table">
        <tr class="row1">
            <td id="column0" class="connectcolumn" colspan="2">

                <!-- Popover -->
                <div class="panel" id="popover">
                    <div class="panel-heading b#dfffc6">
                        <i class="fa fa-plus-circle sort-hand"></i>   ثبت کاربر

                        <div class="pan-btn expand min"></div>
                    </div>
                    <div class="panel-body text-center">
                        @if(!empty($message))
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>توجه!</strong>{!! $message !!}
                            </div>
                        @endif
                        {!! form_open_multipart('admin/register','class="form-horizontal"') !!}
                        <div class="form-group ">

                            <label class="col-sm-2  control-label"> کد ملی</label>
                            <div class="col-sm-4">
                                <input type="number" name="nationalcode" class="form-control"  placeholder=" کد ملی"  required>
                            </div>
                            <label class="col-sm-2 text-right  control-label">رمز عبور</label>
                            <div class="col-sm-4">
                                <input name="password" type="text" class="form-control"  placeholder="رمز عبور"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">نام</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name" placeholder="نام"  required>
                            </div>
                            <label class="col-sm-2  control-label">نام خانوادگی </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="family" placeholder="نام خانوادگی"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">نام پدر</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="father"  placeholder="نام پدر"  required>
                            </div>
                            <label class="col-sm-2  control-label">دین </label>
                            <div class="col-sm-4">
                                <input type="text" name="religion" class="form-control"  placeholder="دین"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">درجه</label>
                            <div class="col-sm-4">
                                <input type="text" name="rating" class="form-control"  placeholder="درجه"  required>
                            </div>
                            <label class="col-sm-2  control-label">شماره شناسنامه </label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="birthcertificate"  placeholder="نام خانوادگی"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">مدرک تحصیلی</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="education" placeholder="مدرک تحصیلی"  required>
                            </div>
                            <label class="col-sm-2  control-label">رشته</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="fieldofStudy"  placeholder="رشته"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">محل صدور شناسنامه</label>
                            <div class="col-sm-4">
                                <input type="text" name="registercertificate" class="form-control"  placeholder="محل صدور شناسنامه"  required>
                            </div>
                            <label class="col-sm-2  control-label">تعداد افراد خانواده</label>
                            <div class="col-sm-4">
                                <input name="familyno" type="number" class="form-control"  placeholder="تعداد افراد خانواده"   required>
                            </div>

                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">شماره تلفن</label>
                            <div class="col-sm-4">
                                <input name="tell" type="text" class="form-control"  placeholder="شماره تلفن"   required>
                            </div>
                            <label class="col-sm-2  control-label">موبایل </label>
                            <div class="col-sm-4">
                                <input name="mob" type="number" class="form-control"  placeholder="موبایل"   required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">  آدرس</label>
                            <div class="col-sm-4">
                                <input name="adress" type="text" class="form-control"  placeholder="آدرس"   required>
                            </div>
                            <label class="col-sm-2  control-label">موبایل آشنا</label>
                            <div class="col-sm-4">
                                <input name="familarmob" type="number" class="form-control"  placeholder="موبایل آشنا"   required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">  آدرس آشنا</label>
                            <div class="col-sm-4">
                                <input type="text" name="familiarlocation" class="form-control"  placeholder="  آدرس آشنا"   required>
                            </div>
                            <label class="col-sm-2  control-label">تلفن آشنا</label>
                            <div class="col-sm-4">
                                <input name="familartell" type="text" class="form-control"  placeholder="تلفن آشنا"   required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">شغل پدر</label>
                            <div class="col-sm-4">
                                <input name="fatherwork" type="text" class="form-control"  placeholder="شغل پدر"   required>
                            </div>
                            <label class="col-sm-2  control-label">شغل مادر</label>
                            <div class="col-sm-4">
                                <input name="motherwork" type="text" class="form-control"  placeholder="شغل مادر"   required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">تعداد خواهر</label>
                            <div class="col-sm-4">
                                <input name="sister" type="number" class="form-control"  placeholder="تعداد خواهر"   required>
                            </div>
                            <label class="col-sm-2  control-label">تعداد برادر</label>
                            <div class="col-sm-4">
                                <input type="number" name="brother" class="form-control"  placeholder="تعداد برادر"   required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label" >وضعیت سلامتی</label>
                            <div class="col-sm-4">
                                <select name="health" class="form-control">
                                    <option value="1">سالم</option>
                                    <option value="0">معاف از رزم</option>
                                </select>
                            </div>
                            <label class="col-sm-2  control-label">وضعیت تاهل</label>
                            <div class="col-sm-4">
                                <select name="married" class="form-control">
                                    <option value="0">مجرد</option>
                                    <option value="1">متاهل</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-sm-2  control-label">گروه خونی</label>
                            <div class="col-sm-4">
                                <input name="blood" type="text" class="form-control"  placeholder="گروه خونی"  required>
                            </div>
                            <label class="col-sm-2  control-label">رنگ مو</label>
                            <div class="col-sm-4">
                                <input type="text" name="hair" class="form-control"  placeholder="رنگ مو"   required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">قد</label>
                            <div class="col-sm-4">
                                <input name="stature" type="number" class="form-control"  placeholder="قد"   required>
                            </div>
                            <label class="col-sm-2  control-label">وزن</label>
                            <div class="col-sm-4">
                                <input type="number" name="weight" class="form-control"  placeholder="وزن"   required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label" > رنگ چشم</label>
                            <div class="col-sm-4">
                                <input name="eye" type="text" class="form-control"  placeholder="رنگ چشم"   required>
                            </div>
                            <label class="col-sm-2  control-label" > بومی</label>
                            <div class="col-sm-4">
                               <select name="boomi" class="form-control">
                                   <option value="0">غیر بومی</option>
                                   <option value="1"> بومی</option>
                               </select>
                            </div>

                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label" >تخصص</label>
                            <div class="col-sm-4">
                                <input name="Expertise" type="text" class="form-control"  placeholder=" تخصص"   required>
                            </div>
                            <label class="col-sm-2  control-label" > شغل قبل از خدمت</label>
                            <div class="col-sm-4">
                                <input name="work" type="text" class="form-control"  placeholder="  شغل قبل از خدمت"   required>
                            </div>

                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label" >تصویر</label>
                            <div class="col-sm-10">
                                <input required="" name="userfile" type="file" class="form-control form-control-file">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label" >پست</label>
                            <div class="col-sm-4">
                                <select id="change" name="access" class="form-control">
                                    <option value="1">وظیفه گردان قرار گاه</option>
                                    <option selected value="2"> کادر گردان قرار گاه</option>
                                    <option value="3">وظیفه نیروی انسانی</option>
                                    <option value="4">کادر نیروی انسانی</option>
                                </select>
                            </div>
                            <label class="col-sm-2  control-label" > کد پستی</label>
                            <div class="col-sm-4">
                                <input name="postalcode" type="number" class="form-control"  placeholder="  کد پستی"   required>
                            </div>


                        </div>
                       <section id="show">
                           <div class="form-group ">
                               <label class="col-sm-2  control-label">تاریخ اعزام به خدمت </label>
                               <div class="col-sm-4">
                               <input readonly placeholder="تاریخ " type="text" id="pcal1" class="pdate full-width has-padding has-border" name="timedispatch">
                               </div>
                               <label class="col-sm-2  control-label">تاریخ ورود به مجموعه </label>
                               <div class="col-sm-4">
                                   <input readonly placeholder="تاریخ " type="text" id="pcal2" class="pdate full-width has-padding has-border" name="timearrival">
                               </div>
                           </div>
                           <div class="form-group ">
                               <label class="col-sm-2  control-label">تاریخ خاتمه خدمت قانونی</label>
                               <div class="col-sm-4">
                                   <input readonly placeholder="تاریخ " type="text" id="pcal3" class="pdate full-width has-padding has-border" name="timefinish">
                               </div>
                               <label class="col-sm-3  control-label">میزان کسری خدمت تأییدشده  </label>
                               <div class="col-sm-3">
                                   <input   placeholder="بر حسب روز" type="number"  class="form-control" name="deficit">
                               </div>
                           </div>
                       </section>

                        <div class="form-group ">
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-block btn-primary pressure waves-effect" type="submit" ><i class="fa fa-pencil-square-o "></i> ثبت نام </button>
                            </div>

                        </div>
                        {!! form_close() !!}
                    </div>
                </div>
                <!-- /End Popover -->

            </td>
        </tr>
    </table>
    <!-- /End content -->
@endsection
@section('js')
    <script src="{{$root}}public/js/js-persian-cal.min.js"></script>
    <script>

        var objCal1 = new AMIB.persianCalendar( 'pcal1',{
            extraInputID: 'pcal1',
            extraInputFormat: 'yyyy/mm/dd',
            initialDate: '1396/02/01'
        } );
        var objCal2 = new AMIB.persianCalendar( 'pcal2',{
            extraInputID: 'pcal2',
            extraInputFormat: 'yyyy/mm/dd',
            initialDate: '1396/02/01'
        } );
        var objCal3 = new AMIB.persianCalendar( 'pcal3',{
            extraInputID: 'pcal3',
            extraInputFormat: 'yyyy/mm/dd',
            initialDate: '1396/02/01'
        } );
        $('document').ready(function () {
            $('#show').hide();
            $("input[name='deficit']").val();
            $("input[name='timedispatch']").val('0');
            $("input[name='timearrival']").val('0');
            $("input[name='timefinish']").val('0');
            $('#change').change(function () {
                var val = $(this).val();
                if(val == 1 || val == 3){
                    $('#show').show('250');
                }else{
                    $('#show').hide('250');
                    $("input[name='deficit']").val();
                    $("input[name='timedispatch']").val('0');
                    $("input[name='timearrival']").val('0');
                    $("input[name='timefinish']").val('0');
                }
            });
        });
    </script>
@endsection
