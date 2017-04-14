@extends('admin.masteradmin')
@section('content')
    <div class="page-header t#455a64" style="color: rgb(69, 90, 100);">
        <h2 class="page-title">ویرایش پروفایل</h2>
        <ol class="breadcrumb">
            <li><a href="index.html">پنل ادمین</a></li>
            <li><span>ویرایش پروفایل</span></li>
        </ol>
    </div>
    <div class="panel tabing panel-primary" style="border-radius: 0px;">
        <div class="panel-heading" style="border-top-left-radius: 0px; border-top-right-radius: 0px;">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1primary" data-toggle="tab">ویرایش مشخصات</a></li>
                <li><a href="#tab2primary" data-toggle="tab">تغییر رمز</a></li>

            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1primary">
                    @if(!empty($message))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>توجه!</strong>{!! $message !!}
                        </div>
                    @endif
                    {!! form_open('admin/index','class="form-horizontal" ') !!}
                        <div class="form-group ">
                            <label class="col-sm-2 text-right  control-label">کد پرسنلی</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="کد پرسنلی" value="{{$user->id}}" disabled required>
                            </div>
                            <label class="col-sm-2  control-label"> کد ملی</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder=" کد ملی" value="{{$user->nationalcode}}" disabled required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">نام</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="نام" value="{{$user->name}}" disabled required>
                            </div>
                            <label class="col-sm-2  control-label">نام خانوادگی </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="نام خانوادگی" value="{{$user->family}}" disabled required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">نام پدر</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="نام پدر" value="{{$user->father}}" disabled required>
                            </div>
                            <label class="col-sm-2  control-label">دین </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="دین" value="{{$user->adress}}" disabled required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">درجه</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="درجه" value="{{$user->rating}}" disabled required>
                            </div>
                            <label class="col-sm-2  control-label">شماره شناسنامه </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="نام خانوادگی" value="{{$user->birthcertificate}}" disabled required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">مدرک تحصیلی</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="مدرک تحصیلی" value="{{$user->education}}" disabled required>
                            </div>
                            <label class="col-sm-2  control-label">رشته</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="رشته" value="{{$user->fieldofStudy}}" disabled required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">محل صدور شناسنامه</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="درجه" value="{{$user->registercertificate}}" disabled required>
                            </div>
                            <label class="col-sm-2  control-label">تاریخ شروع خدمت </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="آدرس" value="{{$user->timearrival}}" disabled required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">شماره تلفن</label>
                            <div class="col-sm-4">
                                <input name="tell" type="text" class="form-control"  placeholder="شماره تلفن" value="{{$user->tell}}"  required>
                            </div>
                            <label class="col-sm-2  control-label">موبایل </label>
                            <div class="col-sm-4">
                                <input name="mob" type="text" class="form-control"  placeholder="موبایل" value="{{$user->mob}}"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">  آدرس</label>
                            <div class="col-sm-4">
                                <input name="adress" type="text" class="form-control"  placeholder="آدرس" value="{{$user->adress}}"  required>
                            </div>
                            <label class="col-sm-2  control-label">موبایل آشنا</label>
                            <div class="col-sm-4">
                                <input name="familarmob" type="text" class="form-control"  placeholder="موبایل آشنا" value="{{$user->familarmob}}"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">  آدرس آشنا</label>
                            <div class="col-sm-4">
                                <input type="text" name="familiarlocation" class="form-control"  placeholder="  آدرس آشنا" value="{{$user->familiarlocation}}"  required>
                            </div>
                            <label class="col-sm-2  control-label">تلفن آشنا</label>
                            <div class="col-sm-4">
                                <input name="familartell" type="text" class="form-control"  placeholder="تلفن آشنا" value="{{$user->familartell}}"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">شغل پدر</label>
                            <div class="col-sm-4">
                                <input name="fatherwork" type="text" class="form-control"  placeholder="شغل پدر" value="{{$user->fatherwork}}"  required>
                            </div>
                            <label class="col-sm-2  control-label">شغل مادر</label>
                            <div class="col-sm-4">
                                <input name="motherwork" type="text" class="form-control"  placeholder="شغل مادر" value="{{$user->motherwork}}"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">تعداد خواهر</label>
                            <div class="col-sm-4">
                                <input name="sister" type="text" class="form-control"  placeholder="تعداد خواهر" value="{{$user->sister}}"  required>
                            </div>
                            <label class="col-sm-2  control-label">تعداد برادر</label>
                            <div class="col-sm-4">
                                <input type="brother" class="form-control"  placeholder="تعداد برادر" value="{{$user->brother}}"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">تعداد خواهر</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="تعداد خواهر" value="{{$user->adress}}"  required>
                            </div>
                            <label class="col-sm-2  control-label">تعداد افراد خانواده</label>
                            <div class="col-sm-4">
                                <input name="familyno" type="text" class="form-control"  placeholder="تعداد افراد خانواده" value="{{$user->familyno}}"  required>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-sm-2  control-label">گروه خونی</label>
                            <div class="col-sm-4">
                                <input name="blood" type="text" class="form-control"  placeholder="گروه خونی" value="{{$user->blood}}"  required>
                            </div>
                            <label class="col-sm-2  control-label">رنگ مو</label>
                            <div class="col-sm-4">
                                <input type="text" name="hair" class="form-control"  placeholder="رنگ مو" value="{{$user->hair}}"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">قد</label>
                            <div class="col-sm-4">
                                <input name="stature" type="text" class="form-control"  placeholder="فد" value="{{$user->stature}}"  required>
                            </div>
                            <label class="col-sm-2  control-label">وزن</label>
                            <div class="col-sm-4">
                                <input type="text" name="weight" class="form-control"  placeholder="وزن" value="{{$user->weight}}"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label" > رنگ چشم</label>
                            <div class="col-sm-4">
                                <input name="eye" type="text" class="form-control"  placeholder="رنگ چشم" value="{{$user->eye}}"  required>
                            </div>
                            <label class="col-sm-2  control-label">وضعیت تاهل</label>
                            <div class="col-sm-4">
                                <input name="married" type="text" class="form-control"  placeholder="وضعیت تاهل" value="{{$user->married}}"  required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label" >وضعیت سلامتی</label>
                            <div class="col-sm-4">
                                <input type="text" name="health" class="form-control"  placeholder="وضعیت سلامتی" value="{{$user->health}}"  required>
                            </div>

                        </div>
                        <div class="form-group ">
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-block btn-primary pressure waves-effect" type="submit" ><i class="fa fa-pencil-square-o "></i> ویرایش </button>
                            </div>

                        </div>
                    {!! form_close() !!}



                </div>
                <div class="tab-pane fade" id="tab2primary">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</div>

            </div>
        </div>
    </div>
@endsection