@extends('cadre.mastercadre')
@section('css')
    <link rel="stylesheet" href="{{$root}}public/css/jquery.bootgrid.css">
@endsection
@section('content')
    <div class="page-header t#455a64" style="color: rgb(69, 90, 100);">
        <h2 class="page-title">تنبیهات و تشویقات</h2>
        <ol class="breadcrumb">
            <li><a href="{{base_url('admin/index')}}.html">پنل کادر</a></li>
            <li><span>تنبیهات و تشویقات</span></li>
        </ol>
    </div>
    <div class="panel" id="basic">
        <div class="panel-heading b#ffe7ff">
            <i class="fa fa-road sort-hand"></i>
            تنبیهات و تشویقات
            <div class="pan-btn expand min"></div>
        </div>
        <div class="panel-body">
            @if(!empty($message))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>توجه!</strong>{!! $message !!}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-3 text-center">
                    <a target="_blank" class="btn btn-primary" href="{{base_url('backup/event')}}"><i class="fa fa-archive"></i>  پشتیبان گیری به صورت فایل اکسل </a>
                </div>
            </div>

            <table id="grid-basic" class="table table-condensed table-hover table-striped">
                <thead>
                <tr>
                    <th data-column-id="s1" data-type="numeric" data-visible="true">ردیف</th>
                    <th data-column-id="s2"  data-visible="true">نوع رویداد</th>
                    <th data-column-id="s3" data-type="numeric" data-visible="true">شماره</th>
                    <th data-column-id="s4"  data-visible="true">تاریخ ثبت</th>
                    <th data-column-id="s5"  data-visible="true">نام</th>
                    <th data-column-id="s300"  data-visible="false">نام پیشنهاد دهنده</th>
                    <th data-column-id="s300"  data-visible="false">درجه پیشنهاد دهنده</th>
                    <th data-column-id="s7"  data-visible="false">تاریخ شروع</th>
                    <th data-column-id="s9" data-visible="false">تاریخ پایان</th>
                    <th data-column-id="s10"  data-visible="false">مدت تاخیر</th>
                    <th data-column-id="s11"  data-visible="true">مدت تشویقی یا اضافه خدمت</th>
                    <th data-column-id="s11" data-visible="true">آیین نامه</th>
                    <th data-column-id="s11"  data-visible="true">نوع عمل</th>
                    <th data-column-id="s11"  data-visible="false">توضیحات</th>
                    <th data-column-id="expenseId" data-formatter="expenseReportEdit">عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($vacations as $vacation)
                    <tr>
                        <td>{{$i}}</td>
                        <td>
                            @if($vacation->stat == 0)
                                خلا و اضافه خدمت ناشی از خلا
                            @elseif($vacation->stat == 1)
                                تشویقی
                            @else
                               تنبیهی
                            @endif
                        </td>
                        <td>{{$vacation->number}}</td>
                        <td>{{mds_date('Y/m/d h:i',$vacation->inserttime)}}</td>
                        <td>{{$vacation->name.' '.$vacation->family}}</td>
                        <td>{{$vacation->cadrename.' '.$vacation->cadrefamily}}</td>
                        <td>{{$vacation->cadrerating}}</td>

                        <td>
                            {{mds_date('Y/m/d',$vacation->times)}}
                        </td>
                        <td>
                                {{mds_date(' h:i',$vacation->timef)}}
                        </td>
                        <td>
                            {{$vacation->delay}}
                        </td>
                        <td>{{$vacation->day}}</td>
                        <td>{{$vacation->rule}}</td>
                        <td>{{$vacation->action}}</td>
                        <td>{{$vacation->text}}</td>


                        <td>{{$vacation->eventid}}</td>

                        <?php $i++ ?>

                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>
    </div>
    <!-- /End Basic table -->
    {!! form_open('','style="display: none" id="delete" ') !!}
    {!! form_close() !!}
    {!! form_open('admin/edit','style="display: none" id="edit" ') !!}
    {!! form_close() !!}
    {!! form_open('printer/event','style="display: none" id="print" ') !!}
    {!! form_close() !!}
@endsection
@section('js')
    <script src="{{$root}}public/js/jquery.bootgrid.js"></script>
    <script>
        $(document).ready(function () {
            // Basic table

            $("#grid-basic").bootgrid({
                formatters: {
                    expenseReportEdit: function (column, row) {
                        return "<div class=\"btn-group btn-group-justified round\"> " +
                            "<div class='btn-group'><button  form=\"delete\" type='submit' name='deleteid' value='"+ row.expenseId +"' class=\"btn btn-danger waves-effect\">حذف</button></div> "+
                            "<div class='btn-group'><button  form=\"print\" type='submit' name='printid' value='"+ row.expenseId +"' class=\"btn btn-danger waves-effect\">چاپ</button></div> "+
                            "</div>";

                    }
                }
            });

        });
    </script>
@endsection
