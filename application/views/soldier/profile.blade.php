@extends('soldier.mastersoldier')
@section('content')
    <div class="page-header t#455a64" style="color: rgb(69, 90, 100);">
        <h2 class="page-title">ویرایش پروفایل</h2>
        <ol class="breadcrumb">
            <li><a href="">پنل وظیفه</a></li>
            <li><span>ویرایش پروفایل</span></li>
        </ol>
    </div>
    <div class="panel tabing panel-primary" style="border-radius: 0px;">
        <div class="panel-heading" style="border-top-left-radius: 0px; border-top-right-radius: 0px;">
            <ul class="nav nav-tabs">

                <li class="active"><a href="#tab2primary" data-toggle="tab">تغییر رمز</a></li>


            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">

                <div class="tab-pane fade in active" id="tab2primary">
                    @if(!empty($message))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>توجه!</strong>{!! $message !!}
                        </div>
                    @endif
                    {!! form_open('soldier/index','class="form-horizontal" ') !!}
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


            </div>
        </div>
    </div>
@endsection