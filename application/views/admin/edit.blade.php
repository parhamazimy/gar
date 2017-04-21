@extends('admin.masteradmin')
@section('css')
    <link rel="stylesheet" href="{{$root}}public/css/jspc-gray.css">
@endsection
@section('content')

    <div class="page-header t#455a64" style="color: rgb(69, 90, 100);">
        <h2 class="page-title">ویرایش کاربر</h2>
        <ol class="breadcrumb">
            <li><a href="{{base_url('admin')}}.html">پنل ادمین</a></li>
            <li><a href="{{base_url('admin/users')}}.html">کاربران</a></li>
            <li><span>ویرایش کاربر</span></li>
        </ol>
    </div>
    <!-- content -->
    <table id="content_table">
        <tr class="row1">
            <td id="column0" class="connectcolumn" colspan="2">

                <!-- Popover -->
                <div class="panel" id="popover">
                    <div class="panel-heading b#dfffc6">
                        <i class="fa fa-pencil-square sort-hand"></i>   ویرایش کاربر

                        <div class="pan-btn expand min"></div>
                    </div>
                    <div class="panel-body text-center">
                        @if(!empty($message))
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>توجه!</strong>{!! $message !!}
                            </div>
                        @endif
                        {!! form_open_multipart('admin/edit','class="form-horizontal"') !!}
                        <div class="form-group ">
                            <input type="hidden" name="editid" value="{{$user->id}}">

                            <label class="col-sm-2  control-label"> کد ملی</label>
                            <div class="col-sm-4">
                                <input type="number" value="{{$user->nationalcode}}" class="form-control"  placeholder=" کد ملی" disabled  required>
                            </div>
                            <label class="col-sm-2 text-right  control-label">رمز عبور</label>
                            <div class="col-sm-4">
                                <input name="password" value="{{$user->password}}" type="text" class="form-control"  placeholder="رمز عبور"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">نام</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$user->name}}" class="form-control" name="name" placeholder="نام"  required>
                            </div>
                            <label class="col-sm-2  control-label">نام خانوادگی </label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$user->family}}" class="form-control" name="family" placeholder="نام خانوادگی"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">نام پدر</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$user->father}}" class="form-control" name="father"  placeholder="نام پدر"  required>
                            </div>
                            <label class="col-sm-2  control-label">تاریخ ورود به مجموعه </label>
                            <div class="col-sm-4">
                                @if($user->timearrival == 0)
                                    <input value="0" readonly placeholder="تاریخ " type="text" id="pcal2" class="pdate full-width has-padding has-border" name="timearrival">
                                @else
                                    <input readonly placeholder="تاریخ " value="{{mds_date('y/m/d',$user->timearrival)}}" type="text" id="pcal2" class="pdate full-width has-padding has-border" name="timearrival">
                                @endif
                            </div>

                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">درجه</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$user->rating}}" name="rating" class="form-control"  placeholder="درجه"  required>
                            </div>
                            <label class="col-sm-2  control-label">شماره شناسنامه </label>
                            <div class="col-sm-4">
                                <input type="number" value="{{$user->birthcertificate}}" class="form-control" name="birthcertificate"  placeholder="شماره شناسنامه"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">مدرک تحصیلی</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$user->education}}" class="form-control"  name="education" placeholder="مدرک تحصیلی"  required>
                            </div>
                            <label class="col-sm-2  control-label">رشته</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$user->fieldofStudy}}" class="form-control" name="fieldofStudy"  placeholder="رشته"  required>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-sm-2  control-label">شماره تلفن</label>
                            <div class="col-sm-4">
                                <input name="tell" value="{{$user->tell}}" type="text" class="form-control"  placeholder="شماره تلفن"   required>
                            </div>
                            <label class="col-sm-2  control-label">موبایل </label>
                            <div class="col-sm-4">
                                <input name="mob" value="{{$user->mob}}" type="number" class="form-control"  placeholder="موبایل"   required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">  آدرس</label>
                            <div class="col-sm-4">
                                <input name="adress" value="{{$user->adress}}" type="text" class="form-control"  placeholder="آدرس"   required>
                            </div>
                            <label class="col-sm-2  control-label">موبایل آشنا</label>
                            <div class="col-sm-4">
                                <input name="familarmob" value="{{$user->familarmob}}" type="number" class="form-control"  placeholder="موبایل آشنا"   required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">  آدرس آشنا</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$user->familiarlocation}}" name="familiarlocation" class="form-control"  placeholder="  آدرس آشنا"   required>
                            </div>
                            <label class="col-sm-2  control-label">تلفن آشنا</label>
                            <div class="col-sm-4">
                                <input name="familartell" value="{{$user->familartell}}" type="text" class="form-control"  placeholder="تلفن آشنا"   required>
                            </div>
                        </div>



                        <div class="form-group ">
                            <label class="col-sm-2  control-label" >پست</label>
                            <div class="col-sm-4">
                                <select id="change" name="access" class="form-control">
                                    @if($user->access == 1)
                                        <option value="1">وظیفه گردان قرار گاه</option>
                                    @elseif($user->access == 2)
                                        <option selected value="2"> کادر گردان قرار گاه</option>
                                    @elseif($user->access == 3)
                                        <option value="3">وظیفه نیروی انسانی</option>
                                    @elseif($user->access == 4)
                                        <option value="4">کادر نیروی انسانی</option>
                                    @endif
                                    <option value="1">وظیفه گردان قرار گاه</option>
                                    <option selected value="2"> کادر گردان قرار گاه</option>
                                    <option value="3">وظیفه نیروی انسانی</option>
                                    <option value="4">کادر نیروی انسانی</option>
                                </select>
                            </div>
                            <label class="col-sm-2  control-label" > کد پستی</label>
                            <div class="col-sm-4">
                                <input name="postalcode" value="{{$user->postalcode}}" type="number" class="form-control"  placeholder="  کد پستی"   required>
                            </div>


                        </div>


                        <div class="form-group ">
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-block btn-primary pressure waves-effect" type="submit" ><i class="fa fa-pencil-square-o "></i> ثبت تغییرات </button>
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

//        var objCal1 = new AMIB.persianCalendar( 'pcal1',{
//            extraInputID: 'pcal1',
//            extraInputFormat: 'yyyy/mm/dd',
//            initialDate: '1396/02/01'
//        } );
        var objCal2 = new AMIB.persianCalendar( 'pcal2',{
            extraInputID: 'pcal2',
            extraInputFormat: 'yyyy/mm/dd',
            initialDate: '1396/02/01'
        } );
//        var objCal3 = new AMIB.persianCalendar( 'pcal3',{
//            extraInputID: 'pcal3',
//            extraInputFormat: 'yyyy/mm/dd',
//            initialDate: '1396/02/01'
//        } );
//        $('document').ready(function () {
//            $('#show').hide();
//            $("input[name='deficit']").val();
//            $("input[name='timedispatch']").val('0');
//            $("input[name='timearrival']").val('0');
//            $("input[name='timefinish']").val('0');
//            $('#change').change(function () {
//                var val = $(this).val();
//                if(val == 1 || val == 3){
//                    $('#show').show('250');
//                }else{
//                    $('#show').hide('250');
//                    $("input[name='deficit']").val();
//                    $("input[name='timedispatch']").val('0');
//                    $("input[name='timearrival']").val('0');
//                    $("input[name='timefinish']").val('0');
//                }
//            });
//        });
    </script>
@endsection

