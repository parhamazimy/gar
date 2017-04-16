@extends('admin.masteradmin')
@section('css')
<link rel="stylesheet" href="{{$root}}public/css/jquery.bootgrid.css">
@endsection
@section('content')
    <div class="page-header t#455a64" style="color: rgb(69, 90, 100);">
        <h2 class="page-title">مدیریت و ویرایش کاربران</h2>
        <ol class="breadcrumb">
            <li><a href="{{base_url('admin/index')}}.html">پنل ادمین</a></li>
            <li><span>ویرایش پروفایل</span></li>
        </ol>
    </div>
    <div class="panel" id="basic">
        <div class="panel-heading b#ffe7ff">
            <i class="fa fa-users sort-hand"></i>
            کاربران
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
                    <a target="_blank" class="btn btn-primary" href="{{$root}}backup.html"><i class="fa fa-archive"></i>  پشتیبان گیری به صورت فایل اکسل </a>
                </div>
            </div>

            <table id="grid-basic" class="table table-condensed table-hover table-striped">
                <thead>
                <tr>
                    <th data-column-id="s1" data-type="numeric" data-visible="true">ردیف</th>
                    <th data-column-id="s2">نام</th>
                    <th data-column-id="s3"> کد ملی</th>
                    <th data-column-id="s4">نام پدر</th>
                    <th data-column-id="s5"  data-visible='false'>درجه</th>
                    <th data-column-id="s6"  data-visible='false'>پست</th>
                    <th data-column-id="s7">تاریخ اعزام</th>
                    <th data-column-id="s8">تاریخ پایان خدمت</th>
                    <th data-column-id="s9"  data-visible='false'>شماه تماس</th>
                    <th data-column-id="expenseId" data-formatter="expenseReportEdit">عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($users as $user)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$user->name.' '.$user->family}}</td>
                    <td>{{$user->nationalcode}}</td>
                    <td>{{$user->father}}</td>
                    <td>{{$user->rating}}</td>
                    <td>
                        @if($user->access == 1)
                            وظیفه گردان
                        @elseif($user->access == 2)
                            کادر گردان
                        @elseif($user->access == 3)
                            وظیفه نیروی انسانی
                        @elseif($user->access == 4)
                            کادر انسانی
                        @endif
                    </td>
                    <td>
                        @if($user->timedispatch == 0)
                            0
                        @else
                            {{mds_date('Y/m/d',$user->timedispatch)}}
                        @endif
                    </td>
                    <td>
                        @if($user->timefinish == 0)
                            0
                        @else
                            {{mds_date('Y/m/d',$user->timefinish)}}
                        @endif

                    </td>
                    <td>{{$user->tell}}</td>
                    <td>{{$user->id}}</td>
                    <?php $i++ ?>

                </tr>
                @endforeach


                </tbody>
            </table>

        </div>
    </div>
    <!-- /End Basic table -->
    {!! form_open('admin/users','style="display: none" id="delete" ') !!}
    {!! form_close() !!}
    {!! form_open('admin/edit','style="display: none" id="edit" ') !!}
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
                         "<div class='btn-group'><button type='submit' form=\"edit\" name='editid' value='"+ row.expenseId +"' class=\"btn btn-danger waves-effect\">ویرایش </button></div> "+
                         "<div class='btn-group'><button  form=\"delete\" type='submit' name='deleteid' value='"+ row.expenseId +"' class=\"btn btn-danger waves-effect\">حذف</button></div> "+
                        "</div>";

                }
            }
        });

    });
</script>
@endsection
