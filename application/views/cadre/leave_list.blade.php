@extends('cadre.mastercadre')
@section('css')
    <link rel="stylesheet" href="{{$root}}public/css/jquery.bootgrid.css">
@endsection
@section('content')
    <div class="page-header t#455a64" style="color: rgb(69, 90, 100);">
        <h2 class="page-title">مرخصی ها</h2>
        <ol class="breadcrumb">
            <li><a href="{{base_url('admin/index')}}.html">پنل کادر</a></li>
            <li><span>مرخصی ها</span></li>
        </ol>
    </div>
    <div class="panel" id="basic">
        <div class="panel-heading b#ffe7ff">
            <i class="fa fa-bed sort-hand"></i>
            مرخصی ها
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
                    <a target="_blank" class="btn btn-primary" href="{{base_url('backup/leave')}}"><i class="fa fa-archive"></i>  پشتیبان گیری به صورت فایل اکسل </a>
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
                    <th data-column-id="s6"  data-visible="false">ساعت شروع</th>
                    <th data-column-id="s7"  data-visible="false">تاریخ شروع</th>
                    <th data-column-id="s8"  data-visible="false">ساعت پایان</th>
                    <th data-column-id="s9" data-visible="false">تاریخ پایان</th>
                    <th data-column-id="s10" data-type="numeric" data-visible="true">مدت (روز)</th>
                    <th data-column-id="b10"  data-visible="true">علت</th>
                    <th data-column-id="b11"  data-visible="false">تعطیلی</th>
                    <th data-column-id="b12"  data-visible="false">استحقاقی</th>
                    <th data-column-id="b13"  data-visible="false">بین راهی</th>
                    <th data-column-id="b14"  data-visible="false">تشویقی</th>
                    <th data-column-id="b15"  data-visible="false">استراحتی</th>



                    <th data-column-id="expenseId" data-formatter="expenseReportEdit">عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($vacations as $vacation)
                    <tr>
                        <td>{{$i}}</td>
                        <td>
                            @if($vacation->condition == 0)
                                مرخصی بلند مدت
                            @else
                               {{$vacation->condition}}
                            @endif
                        </td>
                        <td>{{$vacation->number}}</td>
                        <td>{{mds_date('Y/m/d h:i',$vacation->inserttime)}}</td>
                        <td>{{$vacation->name.' '.$vacation->family}}</td>
                        <td>
                                {{mds_date(' h:i',$vacation->times)}}
                        </td>
                        <td>
                            {{mds_date('Y/m/d',$vacation->times)}}
                        </td>
                        <td>
                                {{mds_date(' h:i',$vacation->timef)}}
                        </td>
                        <td>
                            {{mds_date('Y/m/d',$vacation->timef)}}
                        </td>
                        <td>{{$vacation->time}}</td>
                        <td>{{$vacation->text}}</td>
                        <td>{{$vacation->closures}}</td>
                        <td>{{$vacation->entitlement}}</td>
                        <td>{{$vacation->way}}</td>
                        <td>{{$vacation->encouragement}}</td>
                        <td>{{$vacation->rest}}</td>


                        <td>{{$vacation->leaveid}}</td>

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
    {!! form_open('printer/vacation','style="display: none" id="print" ') !!}
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
