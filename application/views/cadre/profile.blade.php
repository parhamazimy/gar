@extends('cadre.mastercadre')
@section('content')
    <div class="page-header t#455a64" style="color: rgb(69, 90, 100);">
        <h2 class="page-title">ویرایش پروفایل</h2>
        <ol class="breadcrumb">
            <li><a href="">پنل ادمین</a></li>
            <li><span>ویرایش پروفایل</span></li>
        </ol>
    </div>
    <div class="panel tabing panel-primary" style="border-radius: 0px;">
        <div class="panel-heading" style="border-top-left-radius: 0px; border-top-right-radius: 0px;">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1primary" data-toggle="tab">ویرایش مشخصات</a></li>
                <li><a href="#tab2primary" data-toggle="tab">تغییر رمز</a></li>
                <li><a href="#tab3primary" data-toggle="tab">تغییر تصویر</a></li>

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
                        {!! form_open('','class="form-horizontal" ') !!}
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
                            <label class="col-sm-2  control-label">درجه</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="درجه" value="{{$user->rating}}" disabled required>
                            </div>

                        </div>
                        <div class="form-group ">

                            <label class="col-sm-2  control-label">شماره شناسنامه </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="نام خانوادگی" value="{{$user->birthcertificate}}" disabled required>
                            </div>
                            <label class="col-sm-2  control-label">تاریخ شروع خدمت </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="آدرس" value="{{mds_date('Y/m/d',$user->timearrival)}}" disabled required>
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
                            <label class="col-sm-2  control-label">شماره تلفن</label>
                            <div class="col-sm-4">
                                <input name="tell" type="text" class="form-control"  placeholder="شماره تلفن" value="{{$user->tell}}"  required>
                            </div>
                            <label class="col-sm-2  control-label">  کد پستی</label>
                            <div class="col-sm-4">
                                <input type="text" name="postalcode" class="form-control"  placeholder="  آدرس آشنا" value="{{$user->postalcode}}"  required>
                            </div>

                        </div>
                        <div class="form-group ">
                            <label class="col-sm-2  control-label">  آدرس</label>
                            <div class="col-sm-4">
                                <input name="adress" type="text" class="form-control"  placeholder="آدرس" value="{{$user->adress}}"  required>
                            </div>
                            <label class="col-sm-2  control-label">موبایل </label>
                            <div class="col-sm-4">
                                <input name="mob" type="text" class="form-control"  placeholder="موبایل" value="{{$user->mob}}"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2  control-label">تلفن آشنا</label>
                            <div class="col-sm-4">
                                <input name="familartell" type="text" class="form-control"  placeholder="تلفن آشنا" value="{{$user->familartell}}"  required>
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

                        </div>


                        <div class="form-group ">
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-block btn-primary pressure waves-effect" type="submit" ><i class="fa fa-pencil-square-o "></i> ویرایش </button>
                            </div>

                        </div>
                        {!! form_close() !!}


                </div>
                <div class="tab-pane fade" id="tab2primary">
                    {!! form_open('cadre/index','class="form-horizontal" ') !!}
                    <div class="form-group ">
                        <label class="col-sm-2 text-right  control-label">رمز فعلی :</label>
                        <div class="col-sm-10">
                            <input type="text" name="old" class="form-control"  placeholder="رمز فعلی"   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2  control-label">رمز جدید</label>
                        <div class="col-sm-10">
                            <input type="text" name="new" class="form-control"  placeholder="رمز جدید"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2  control-label">تکرار رمز جدید</label>
                        <div class="col-sm-10">
                            <input type="text" name="rep" class="form-control"  placeholder="تکرار رمز جدید"   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-block btn-primary pressure waves-effect" type="submit"><i class="fa fa-lock"></i>  تغییر رمز</button>
                        </div>
                    </div>

                    {!! form_close() !!}
                </div>
                <div class="tab-pane fade" id="tab3primary">
                    <div class="row">
                        <div class="col-lg-4 text-center">
                            <img src="{{$root}}public/img/users/{{$img}}" class="img img-rounded" width="150" height="150">
                        </div>
                        <div class="col-lg-8 text-center">
                            <p>فایل ارسالی را با فرمت jpg|jpeg ، حداکثر وضوح 1024 و حداقل وضوح 180 انتخاب کنید.</p>
                            {!! form_open_multipart('cadre','class="form-horizontal" ')  !!}
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="exampleInputFile">بارگذاری فایل</label>
                                <div class="col-sm-8">
                                    <input required="" name="userfile" type="file" class="form-control form-control-file">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-block btn-info mt-5"><i class="fa fa-send-o ml-2"></i>ارسال تصویر</button>
                                </div>
                            </div>

                            {!! form_close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection