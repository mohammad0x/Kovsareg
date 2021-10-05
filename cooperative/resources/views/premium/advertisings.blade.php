<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | داشبورد اول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables/dataTables.bootstrap4.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/assets/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/assets/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/assets/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="/assets/dist/css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="/assets/dist/css/custom-style.css">
    <script rel="stylesheet" src="/assets/plugins/ckeditor/ckeditor.js"></script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">خانه</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->

        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">
            <!-- Messages Dropdown Menu -->

            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                        class="fa fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light">پنل مدیریت</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar" style="direction: ltr">
            <div style="direction: rtl">
                <!-- Sidebar user panel (optional) -->
                @include('partials.premium_sidebar')
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">لیست آگهی ها</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <!-- /.card-header -->
                            @if(\Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('error'))
                                <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('error')}}</div>
                            @endif

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>عنوان</th>
                                        <th>توضیحات</th>
                                        <th>قیمت</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
@foreach($advertisings as $advertising)
                                    <tr>

                                        <td>{{$advertising->title}}</td>
                                        <td>{{$advertising->description}}</td>
                                        <td>{{number_format($advertising->price)}}</td>
                                        <td>@if($advertising->verified == 0)تایید نشده@else  تایید شده @endif</td>
                                        <td>
                                            <a href="{{route('delete_advertising.premium',$advertising->id)}}" class="btn btn-danger">حذف</a>
                                            <a href="{{route('advertisingDetails.premium',$advertising->id)}}" class="btn btn-info">جزئیات</a>
                                        </td>
                                    </tr>
@endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="/assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "language": {

                "emptyTable": "هیچ داده‌ای در جدول وجود ندارد",
                "info": "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
                "infoEmpty": "نمایش 0 تا 0 از 0 ردیف",
                "infoFiltered": "(فیلتر شده از _MAX_ ردیف)",
                "infoThousands": ",",
                "lengthMenu": "نمایش _MENU_ ردیف",
                "processing": "در حال پردازش...",
                "search": "جستجو:",
                "zeroRecords": "رکوردی با این مشخصات پیدا نشد",
                "paginate": {
                    "first": "برگه‌ی نخست",
                    "last": "برگه‌ی آخر",
                    "next": "بعدی",
                    "previous": "قبلی"
                },
                "aria": {
                    "sortAscending": ": فعال سازی نمایش به صورت صعودی",
                    "sortDescending": ": فعال سازی نمایش به صورت نزولی"
                },
                "autoFill": {
                    "cancel": "انصراف",
                    "fill": "پر کردن همه سلول ها با ساختار سیستم",
                    "fillHorizontal": "پر کردن سلول های افقی",
                    "fillVertical": "پرکردن سلول های عمودی",
                    "info": "نمونه اطلاعات پرکردن خودکار"
                },
                "buttons": {
                    "collection": "مجموعه",
                    "colvis": "قابلیت نمایش ستون",
                    "colvisRestore": "بازنشانی قابلیت نمایش",
                    "copy": "کپی",
                    "copySuccess": {
                        "1": "یک ردیف داخل حافظه کپی شد",
                        "_": "%ds ردیف داخل حافظه کپی شد"
                    },
                    "copyTitle": "کپی در حافظه",
                    "excel": "اکسل",
                    "pageLength": {
                        "-1": "نمایش همه ردیف‌ها",
                        "1": "نمایش 1 ردیف",
                        "_": "نمایش %d ردیف"
                    },
                    "print": "چاپ",
                    "copyKeys": "برای کپی داده جدول در حافظه سیستم کلید های ctrl یا ⌘ + C را فشار دهید",
                    "csv": "فایل CSV",
                    "pdf": "فایل PDF"
                },
                "searchBuilder": {
                    "add": "افزودن شرط",
                    "button": {
                        "0": "جستجو ساز",
                        "_": "جستجوساز (%d)"
                    },
                    "clearAll": "خالی کردن همه",
                    "condition": "شرط",
                    "conditions": {
                        "date": {
                            "after": "بعد از",
                            "before": "بعد از",
                            "between": "میان",
                            "empty": "خالی",
                            "equals": "برابر",
                            "not": "نباشد",
                            "notBetween": "میان نباشد",
                            "notEmpty": "خالی نباشد"
                        },
                        "number": {
                            "between": "میان",
                            "empty": "خالی",
                            "equals": "برابر",
                            "gt": "بزرگتر از",
                            "gte": "برابر یا بزرگتر از",
                            "lt": "کمتر از",
                            "lte": "برابر یا کمتر از",
                            "not": "نباشد",
                            "notBetween": "میان نباشد",
                            "notEmpty": "خالی نباشد"
                        },
                        "string": {
                            "contains": "حاوی",
                            "empty": "خالی",
                            "endsWith": "به پایان می رسد با",
                            "equals": "برابر",
                            "not": "نباشد",
                            "notEmpty": "خالی نباشد",
                            "startsWith": "شروع  شود با"
                        },
                        "array": {
                            "equals": "برابر",
                            "empty": "خالی",
                            "contains": "حاوی",
                            "not": "نباشد",
                            "notEmpty": "خالی نباشد",
                            "without": "بدون"
                        }
                    },
                    "data": "اطلاعات",
                    "deleteTitle": "حذف عنوان",
                    "logicAnd": "و",
                    "logicOr": "یا",
                    "title": {
                        "0": "جستجو ساز",
                        "_": "جستجوساز (%d)"
                    },
                    "value": "مقدار"
                },
                "select": {
                    "1": "%d ردیف انتخاب شد",
                    "_": "%d ردیف انتخاب شد",
                    "cells": {
                        "1": "1 سلول انتخاب شد",
                        "_": "%d سلول انتخاب شد"
                    },
                    "columns": {
                        "1": "یک ستون انتخاب شد",
                        "_": "%d ستون انتخاب شد"
                    },
                    "rows": {
                        "0": "%d ردیف انتخاب شد",
                        "1": "1ردیف انتخاب شد",
                        "_": "%d  انتخاب شد"
                    }
                },
                "thousands": ",",
                "decimal": "اعشاری",
                "searchPanes": {
                    "clearMessage": "همه را پاک کن",
                    "collapse": {
                        "0": "صفحه جستجو",
                        "_": "صفحه جستجو (٪ d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "صفحه جستجو وجود ندارد",
                    "loadMessage": "در حال بارگیری صفحات جستجو ...",
                    "title": "فیلترهای فعال - %d"
                },
                "loadingRecords": "در حال بارگذاری...",
                "datetime": {
                    "previous": "قبلی",
                    "next": "بعدی",
                    "hours": "ساعت",
                    "minutes": "دقیقه",
                    "seconds": "ثانیه",
                    "amPm": [
                        "صبح",
                        "عصر"
                    ]
                },
                "editor": {
                    "close": "بستن",
                    "create": {
                        "button": "جدید",
                        "title": "ثبت جدید",
                        "submit": "ایجــاد"
                    },
                    "edit": {
                        "button": "ویرایش",
                        "title": "ویرایش",
                        "submit": "به‌روزرسانی"
                    },
                    "remove": {
                        "button": "حذف",
                        "title": "حذف",
                        "submit": "حذف"
                    },
                    "multi": {
                        "restore": "واگرد"
                    }
                }
            },

            "info": false,

        })
    })
</script>
</body>
</html>
