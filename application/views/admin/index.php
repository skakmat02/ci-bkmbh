<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Badan Konsultasi, Mediasi dan Bantuan Hukum</title>
  <link rel="icon" type="image/png" sizes="56x56" href="http://journals.upnjatim.ac.id/images/fav-icon/icon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>BKM</b>BH</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>BKM</b>BH</span>
        </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
			  <a href="<?php echo base_url(); ?>../" target="_BLANK">
                <i class="fa fa-home"></i> <span>Halaman Depan</span>
              </a>

          </li>
          <!-- Notifications: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs"><?php  echo $this->session->userdata('admin_nama');?></span>
              <span class="pull-down-container">
              <i class="fa fa-angle-down pull-down"></i>
            </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li style="height:70px;" class="user-header">
               <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
-->
                <p>
                  Selamat Datang,
                  <small><?php  echo $this->session->userdata('admin_nama');?></small>
                </p>
              </li>
              <!-- Menu Body -->



              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">

                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if($page == 'home'){echo 'active';} ?>">
              <a href="<?php echo base_url(); ?>admin/index">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
          <!--  <li class="<?php if($page == 'data_utama' && $page == 'data_utama_tidak'){echo 'active';} ?> treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Data Admin Web</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                <li class="<?php if($page == 'data_utama'){echo 'active';} ?>">
                  <a href="<?php echo base_url(); ?>admin/data_utama">
                    <i class="fa fa-circle"></i> <span>Admin Aktif</span>
                    <span class="pull-right-container">
                      <span class="label label-primary pull-right"><?php echo $data_utama ?></span>
                    </span>
                  </a>

                </li>
                <li class="<?php if($page == 'data_utama_tidak'){echo 'active';} ?>">
                  <a href="<?php echo base_url(); ?>admin/data_utama_tidak">
                    <i class="fa fa-circle"></i> <span>Admin Tidak Aktif</span>
                    <span class="pull-right-container">
                      <span class="label label-primary pull-right"><?php echo $data_utama_tidak ?></span>
                    </span>
                  </a>
                </li>
              </ul>
            </li> --->


 <?php  $admin_kode = $this->session->userdata('admin_kode'); if($admin_kode == '5'){?>
            <li class="<?php if($page == 'data_surat'){echo 'active';} ?>">
              <a href="<?php echo base_url(); ?>admin/data_surat">
                <i class="fa fa-envelope"></i> <span>Surat</span>
                <span class="pull-right-container">
                  <span class="label bg-green pull-right"><?php echo $tampil_surat_ht; ?></span>
                </span>
              </a>

            </li>

            <li class="<?php if($page == 'data_keluhan'){echo 'active';} ?>">
              <a href="<?php echo base_url(); ?>admin/data_keluhan">
                <i class="fa fa-bullhorn"></i> <span>Keluhan</span>
                <span class="pull-right-container">
                  <span class="label bg-green pull-right"><?php echo $tampil_keluhan_ht; ?></span>
                </span>
              </a>

            </li>

            <li class="<?php if($page == 'data_konsultasi' || $page == 'data_konsultasi_sd'){echo 'active';} ?> treeview">
                <a href="#">
                  <i class="fa fa-balance-scale"></i> <span>Data Konsultasi</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
<?php } ?>
                  <li class="<?php if($page == 'data_konsultasi'){echo 'active';} ?>">
                    <a href="<?php echo base_url(); ?>admin/data_konsultasi">
                      <i class="fa fa-book"></i> <span>Data Konsultasi</span>
                      <span class="pull-right-container">
                        <span class="label bg-purple pull-right"><?php    $admin_kode = $this->session->userdata('admin_kode'); if($admin_kode == '5'){ echo $tampil_konsultasi_admin_ht;} else{  echo $tampil_konsultasi_ht;} ?></span>
                      </span>
                    </a>
<?php  $admin_kode = $this->session->userdata('admin_kode'); if($admin_kode == '5'){?>
                  </li>
                  <li class="<?php if($page == 'data_konsultasi_sd'){echo 'active';} ?>">
                    <a href="<?php echo base_url(); ?>admin/data_konsultasi_sd">
                      <i class="fa fa-book"></i> <span>Data Konsultasi Selesai</span>
                      <span class="pull-right-container">
                        <span class="label bg-purple pull-right"><?php     echo $tampil_konsultasi_admin_sd_ht; ?></span>
                      </span>
                    </a>

                  </li>
                </ul>
              </li>


<li class="<?php if($page == 'data_bh' || $page == 'data_bh_sd'){echo 'active';} ?> treeview">
    <a href="#">
      <i class="fa fa-key"></i> <span>Data Bantuan & Mediasi</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
<?php } ?>
      <li class="<?php if($page == 'data_bh'){echo 'active';} ?>">
        <a href="<?php echo base_url(); ?>admin/data_bh">
          <i class="fa fa-book"></i> <span>Data Bantuan & Mediasi</span>
          <span class="pull-right-container">
            <span class="label bg-purple pull-right"><?php    $admin_kode = $this->session->userdata('admin_kode'); if($admin_kode == '5'){ echo $tampil_bh_admin_ht;} else{  echo $tampil_bh_ht;} ?></span>
          </span>
        </a>
<?php  $admin_kode = $this->session->userdata('admin_kode'); if($admin_kode == '5'){?>
      </li>
      <li class="<?php if($page == 'data_bh_sd'){echo 'active';} ?>">
        <a href="<?php echo base_url(); ?>admin/data_bh_sd">
          <i class="fa fa-book"></i> <span>Data Selesai</span>
          <span class="pull-right-container">
            <span class="label bg-purple pull-right"><?php echo $tampil_bh_admin_sd_ht; ?></span>
          </span>
        </a>

      </li>
    </ul>
  </li>
  <li class="<?php if($page == 'data_user'){echo 'active';} ?>">
    <a href="<?php echo base_url(); ?>admin/data_user">
      <i class="fa fa-user"></i> <span>Data User</span>
      <span class="pull-right-container">

      </span>
    </a>

  </li>
<?php } ?>


            <?php  $admin_kode = $this->session->userdata('admin_kode');
					if ($admin_kode== 5 ) {
            ?>

            <?php } ?>
            <!--
            <li class="<?php if($page == 'jurnal_marquee'){echo 'active';} ?>">
              <a href="<?php echo base_url(); ?>admin/jurnal_marquee">
                <i class="fa fa-newspaper-o"></i> <span>Daftar Tulisan Berjalan</span>
              </a>
            </li> -->

         <!--   <li class="<?php //if($page == 'config'){echo 'active';} ?>">
              <a href="<?php //echo base_url(); ?>admin/config">
                <i class="fa fa-cog"></i> <span>Konfigurasi</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

 <?php $this->load->view('admin/'.$page); ?>

  <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>--</b>
        </div>
        <strong>Copyright &copy; <?php echo date('Y') ?> <a href="#"></a>.</strong> All rights reserved.
      </footer>

  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">

        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->

      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<script>
//$(document).ready(function(){
//	$('#upload_form').on('submit', function(e){
	////	e.preventDefault();
	//	if($('#image_file').val() == '')
	//	{
	//		alert("Please Select the File");
	//	}
	//	else
	//	{
	//		$.ajax({
	//			url:"<?php echo base_url(); ?>admin/do_upload",
				//base_url() = http://localhost/tutorial/codeigniter
	//			method:"POST",
	//			data:new FormData(this),
	//			contentType: false,
	//			cache: false,
	//			processData:false,
	//			success:function(data)
	//			{
	//				$('#uploaded_image').html(data);
		//		}
	//		});
	//	}
	//});
//});

 //$(document).ready(function()
 //                 { $('#cancel').hide();
 ////                 $('#ganti').hide();
    //              $('#urls').hide();
//					   $('#form-group').hover(function() {
  //  $('#urls').val($('#url').val());
//});
// $('#content').hover(function() {
 //   $('#urls').val($('#url').val());
//});

//$('#simpan').click(function() {
	//if ( $('#url').val() == null || $('#url').val() == "" ){
	//	$('#urls').val($('#urlse').val());
	//	}
  /// else{  $('#urls').val($('#url').val());}

//});

//$('#upload').click(function() {
  // / $('#cancel').show();
  //                $('#ganti').show();
//});
//$('#cancel').click(function() {
 //   $('#url').val('');
 //   $('#url').hide();
 //   $('#uploadsss').hide();
  //  $('#cancel').hide();
  //  $('#ganti').hide();
//});
     //   {

              //    $("#jeniss").change(function()
     //   {
     //        if($(this).val() == "2" )
     //   {
     //       $("#upload").show();
     //       $("input[name=image_file]").show();
       //     $("input[name=url]").hide();
       //     $("sup[name=url]").hide();
      //      $("#isi").hide();
      //      $("#labelurl").show();
     //   }
     //   else
     //   {
       //     $("#upload").hide();
         //   $("input[name=image_file]").hide();
         //   $("input[name=url]").hide();
        //    $("sup[name=url]").hide();
        //    $("#labelurl").hide();
         //   $("#isi").show();
      //  }
      //      });
       //  $("#upload").hide();
       //  $("input[name=image_file]").hide();
       //  $("#labelurl").show();
        // $("#isi").hide();



          $(function() {
          $( "#tgl_jurnal" ).datepicker({
            autoclose: true
          });
        });




    </script>

    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <!-- page script -->
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>



<script>
  $(function () {
    $("#example1").DataTable({
		});

  });
</script>
</body>
</html>
