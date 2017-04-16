@extends('cadre.mastercadre')
@section('css')
    <link rel="stylesheet" href="{{$root}}public/css/jspc-gray.css">
@endsection
@section('content')
    <div class="page-header t#455a64" style="color: rgb(69, 90, 100);">
        <h2 class="page-title">ثبت مرخصی</h2>
        <ol class="breadcrumb">
            <li><a href="{{base_url('cadre')}}.html">پنل کادر</a></li>
            <li><span>ثبت مرخصی</span></li>
        </ol>
    </div>
    <div class="panel">

        <div class="panel-heading b#c6f9ff ">
            <i class="fa fa-bed sort-hand"></i> ثبت مرخصی
            <div class="pan-btn min"></div>
        </div>
        <div class="panel-body ">
            @if(!empty($message))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>توجه!</strong>{!! $message !!}
                </div>
            @endif
            {!! form_open('','class="form-horizontal" ') !!}
            <div class="form-group">
                <label class="control-label col-sm-2">نوع مرخصی</label>
                <section class="col-sm-4">
                    <select name="status" class="form-control">
                        <option value="0">ساعتی</option>
                        <option value="1">تشویقی</option>
                        <option value="2">استحقاقی</option>
                        <option value="3">استعلاجی</option>
                        <option value="4">استراحتی</option>
                    </select>
                </section>
                <label class="control-label col-sm-2">کد پرسنلی وظیفه</label>
                <section  class="col-sm-4">
                    <div class="input-group">
                        <input type="hidden" id="userid" name="userid">
                        <input id="nameid" class="form-control" type="text" required disabled>
                        <span id="add" data-toggle="modal" data-target="#greenModal" style="cursor: pointer" class="input-group-addon"><i class="fa fa-plus"></i></span>
                    </div>
                </section>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">تاریخ شروع</label>
                <section class="col-sm-4">
                    <input  readonly placeholder="تاریخ " type="text" id="pcal1" class="pdate full-width has-padding has-border" name="times" required>
                </section>
                <label class="control-label col-sm-2">ساعت شروع</label>
                <section class="col-sm-4">
                    <input type="time" name="htimes" class="form-control" required>
                </section>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">تاریخ پایان</label>
                <section class="col-sm-4">
                    <input readonly placeholder="تاریخ " type="text" id="pcal2" class="pdate full-width has-padding has-border" name="timef" required>
                </section>
                <label class="control-label col-sm-2">ساعت پایان</label>
                <section class="col-sm-4">
                    <input type="time" class="form-control" name="htimef" required>
                </section>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">توضیحات</label>
                <section class="col-sm-10">
                   <textarea required name="description" class="form-control" rows="5"></textarea>
                </section>
            </div>
            <div class="form-group ">
                <div class="col-sm-12 text-center">
                    <button type="" class="btn btn-block btn-primary pressure waves-effect" ><i class="fa fa-pencil-square-o "></i> ویرایش </button>
                </div>
            </div>
            {!! form_close() !!}

        </div>
    </div>





    {{--modal--}}
    <div id="greenModal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header b#78CD51">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">انتخاب وظیفه</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>نام پدر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $j = 1 ?>

                        @foreach($users as $user)
                            <tr>
                                <th>{{$j}}</th>
                                <?php $j++ ?>
                                <th>{{$user->name}}</th>
                                <th>{{$user->family}}</th>
                                <th>{{$user->father}}</th>
                                <th><button data-dismiss="modal" class="btn btn-info btn-block userid" value="{{$user->id}}" href="profile.html"><i class="fa fa-check"></i> انتخاب</button> </th>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{$root}}public/js/js-persian-cal.min.js"></script>
    <script>

        var objCal1 = new AMIB.persianCalendar( 'pcal1',{
            extraInputID: 'pcal1',
            extraInputFormat: 'yyyy/mm/dd',
            initialDate: '1370/01/01'
        } );
        var objCal2 = new AMIB.persianCalendar( 'pcal2',{
            extraInputID: 'pcal2',
            extraInputFormat: 'yyyy/mm/dd',
            initialDate: '1370/01/01'
        } );
        $(document).ready(function () {
           $('.userid').click(function () {
              var userid = $(this).val();
              $('#userid').val(userid);
              $('#nameid').val(userid);
           });
        });

    </script>
@endsection