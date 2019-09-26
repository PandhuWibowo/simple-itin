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
    <!-- jvectormap -->

    <link rel="stylesheet" href="{!! asset('asset_dashboard/bower_components/select2/dist/css/select2.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('asset_dashboard/dist/css/AdminLTE.min.css') !!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!! asset('asset_dashboard/dist/css/skins/_all-skins.min.css') !!}">

    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{!! asset('asset_dashboard/plugins/timepicker/bootstrap-timepicker.min.css') !!}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
                Edit
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" autocomplete="off" method="post" action="{{ url('/backend/tourist-attractions/update') }}" enctype="multipart/form-data">
                            {{method_field('PUT')}}
                            <div class="box-body">
                                @include("dashboard_admin.include.flash-message")
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="nama_wisata">Attraction Name</label>
                                    <input type="hidden" class="form-control" id="wisata_id" name="wisata_id" value="{{$editWisata->wisata_id}}" readonly>
                                    <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" placeholder="Attraction Name" value="{{ucwords($editWisata->nama_wisata)}}">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control select2" style="width: 100%;" id="city_id" name="city_id">
                                        <option></option>
                                        @foreach($kota as $row)
                                            <option value="{{$row->kota_id}}" <?php echo ($editWisata->kota_id == $row->kota_id) ? "selected" : "";?>>{{$row->nama_kota}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." id="address" name="address">{{ucfirst($editWisata->alamat)}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{trim($editWisata->kontak)}}">
                                </div>
                                <div class="form-group">
                                    <label>Office Hours</label>
                                    <input type="text" class="form-control timepicker" name="office_hours" id="office_hours" value="{{trim($editWisata->waktu_operasional)}}">
                                </div>

                                <div class="form-group">
                                    <label>Timezone</label>
                                    <select class="form-control select2" style="width: 100%;" id="timezone" name="timezone">
                                        <option></option>
                                        <option value="WIB" <?php echo (ucwords($editWisata->waktu_bagian) == "WIB") ? "selected" : "";?>>WIB</option>
                                        <option value="WITA" <?php echo (ucwords($editWisata->waktu_bagian) == "WITA") ? "selected" : "";?>>WITA</option>
                                        <option value="WIT" <?php echo (ucwords($editWisata->waktu_bagian) == "WIT") ? "selected" : "";?>>WIT</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="website">Website <span>(http or https is required)</span></label>
                                    <input type="text" class="form-control" id="website" name="website" placeholder="Website" value="{{strtolower($editWisata->website)}}">
                                </div>

                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Company" value="{{ucwords($editWisata->alt)}}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="5" placeholder="Enter ..." id="description" name="description">{{ucfirst($editWisata->deskripsi)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Tags</label>
                                    <select id="tag_id" name="tag_id[]" class="form-control tag_id" required multiple="multiple">
                                        <option value=""></option>
                                        @foreach($tag as $v)
                                            <option value="{{$v->nama_tag}}" @foreach($editWisata->getTag as $row) @if($v->nama_tag == $row->nama_tag) selected @endif @endforeach>{{$v->nama_tag}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-flat">Save</button>
                            </div>
                        </form>
                    </div>
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
<!-- Select2 -->
<script src="{!! asset('asset_dashboard/bower_components/select2/dist/js/select2.full.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('asset_dashboard/bower_components/fastclick/lib/fastclick.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('asset_dashboard/dist/js/adminlte.min.js') !!}"></script>
<!-- Sparkline -->
<script src="{!! asset('asset_dashboard/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}"></script>
<!-- jvectormap  -->
<script src="{!! asset('asset_dashboard/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}"></script>
<script src="{!! asset('asset_dashboard/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}"></script>
<!-- SlimScroll -->
<script src="{!! asset('asset_dashboard/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
<!-- ChartJS -->
<script src="{!! asset('asset_dashboard/bower_components/chart.js/Chart.js') !!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{!! asset('asset_dashboard/dist/js/pages/dashboard2.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('asset_dashboard/dist/js/demo.js') !!}"></script>

<script src="{!! asset('asset_dashboard/plugins/timepicker/bootstrap-timepicker.min.js') !!}"></script>
<script>
    $(function () {
        $('.select2').select2({
            placeholder : "Please select the city",
            allowClear: true
        });

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        });

        $(".tag_id").select2({
            placeholder: "Please Select Tag first",
            tags: true,
            tokenSeparators: [',', ' '],
            maximumSelectionLength: 5,
            // matcher : function(term,res){
            //     return false;
            // },
            "language": {
                'noResults': function(){
                    return "Type keywords separated by commas";
                }
            }
        }).on("change",function(e){
            if($(this).val().length>5){
                $(this).val($(this).val().slice(0,5));
            }
        });
    });
</script>
</body>
</html>



{{--@if (session('status'))--}}
{{--    <div class="alert alert-success" role="alert">--}}
{{--        {{ session('status') }}--}}
{{--    </div>--}}
{{--@endif--}}

{{--You are logged in!--}}
