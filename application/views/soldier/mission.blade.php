@extends('soldier.mastersoldier')
@section('css')
    <link rel="stylesheet" href="{{$root}}public/css/jquery.bootgrid.css">
@endsection
@section('content')
    <div class="page-header t#455a64" style="color: rgb(69, 90, 100);">
        <h2 class="page-title">ماموریت ها</h2>
        <ol class="breadcrumb">
            <li><a href="{{base_url('soldier/index')}}.html">پنل کادر</a></li>
            <li><span>ماموریت ها</span></li>
        </ol>
    </div>
    <div class="panel" id="basic">
        <div class="panel-heading b#ffe7ff">
            <i class="fa fa-bed sort-hand"></i>
            ماموریت ها
            <div class="pan-btn expand min"></div>
        </div>
        <div class="panel-body">
            @if(!empty($message))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>توجه!</strong>{!! $message !!}
                </div>
            @endif


            <table id="grid-basic" class="table table-condensed table-hover table-striped">
                <thead>
                <tr>
                    <th data-column-id="s1" data-type="numeric" data-visible="true">ردیف</th>
                    <th data-column-id="s2" data-type="numeric">کد پرسنل</th>
                    <th data-column-id="s3" data-type="numeric" data-visible='false'> کد ملی</th>
                    <th data-column-id="s4">نام</th>
                    <th data-column-id="s5"  data-visible='false'>نام پدر</th>
                    <th data-column-id="s6"  data-visible='false'>درجه</th>
                    <th data-column-id="s7">تاریخ شروع</th>
                    <th data-column-id="s8">تاریخ پایان </th>
                    <th data-column-id="s10"  data-visible='false'>توضیحات</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($vacations as $vacation)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$vacation->userid}}</td>
                        <td>{{$vacation->nationalcode}}</td>
                        <td>{{$vacation->name.' '.$vacation->family}}</td>
                        <td>{{$vacation->father}}</td>
                        <td>{{$vacation->rating}}</td>
                        <td>
                            {{mds_date('Y/m/d h:i',$vacation->times)}}
                        </td>
                        <td>
                            {{mds_date('Y/m/d h:i',$vacation->timef)}}
                        </td>
                        <td>{{$vacation->description}}</td>


                        <?php $i++ ?>

                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>
    </div>
    <!-- /End Basic table -->

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
                            "</div>";

                    }
                }
            });

        });
    </script>
@endsection
