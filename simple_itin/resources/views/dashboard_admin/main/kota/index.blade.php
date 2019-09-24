<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Atourin') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{!! asset('asset_dashboard/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! asset('asset_dashboard/bower_components/font-awesome/css/font-awesome.min.css') !!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{!! asset('asset_dashboard/bower_components/Ionicons/css/ionicons.min.css') !!}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{!! asset('asset_dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('asset_dashboard/dist/css/AdminLTE.min.css') !!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!! asset('asset_dashboard/dist/css/skins/_all-skins.min.css') !!}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{!! asset('css/self_customize/modals.custom.css') !!}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!--Header-->
@include("dashboard_admin.include.path_logout")

<!-- Navbar -->
@include("dashboard_admin.include.navbar")
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Cities
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('backend/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cities</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">


            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <!-- ./box-header -->
                        <div class="box-header">
                            <h3 class="box-title">Cities</h3>
                        </div>

                        <!-- ./box-body -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cities as $seq=>$row)
                                        <tr>
                                            <td>{{$seq+1}}</td>
                                            <td>{{$row->nama_kota}}</td>
                                            <td>
                                                <a class="btn btn-warning btn-md btn-flat btnEditCity" data-toggle="tooltip" title="Edit" data-city_id="{{$row->kota_id}}" data-city="{{$row->nama_kota}}">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn btn-danger btn-md btn-flat btnRemoveCity" data-toggle="tooltip" title="Remove" data-city_id="{{$row->kota_id}}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>

                            @include("dashboard_admin.main.kota.edit_modal")
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->



        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
@include("dashboard_admin.include.footer")
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{!! asset('asset_dashboard/bower_components/jquery/dist/jquery.min.js') !!}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{!! asset('asset_dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('asset_dashboard/bower_components/fastclick/lib/fastclick.js') !!}"></script>
<!-- DataTables -->
<script src="{!! asset('asset_dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('asset_dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('asset_dashboard/dist/js/adminlte.min.js') !!}"></script>
<!-- SlimScroll -->
<script src="{!! asset('asset_dashboard/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('asset_dashboard/dist/js/demo.js') !!}"></script>
<script>
    $(function () {
        $('#example1').DataTable()
        // $('#example2').DataTable({
        //     'paging'      : true,
        //     'lengthChange': false,
        //     'searching'   : false,
        //     'ordering'    : true,
        //     'info'        : true,
        //     'autoWidth'   : false
        // })
    })
</script>

<script src="{!! asset('js/ajax/city.js') !!}"></script>
</body>
</html>



{{--@if (session('status'))--}}
{{--    <div class="alert alert-success" role="alert">--}}
{{--        {{ session('status') }}--}}
{{--    </div>--}}
{{--@endif--}}

{{--You are logged in!--}}
