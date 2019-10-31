<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Small boxes (Stat box) -->
          <div>
          <div class="row">


             <?php  $admin_kode = $this->session->userdata('admin_kode'); if($admin_kode == '5'){?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $tampil_surat_ht ?></h3>
                  <p>Surat</p>
                </div>
                <div class="icon">
                  <i class="fa fa-envelope"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/data_surat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>


            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-orange">
                <div class="inner">
                  <h3><?php echo $tampil_keluhan_ht ?></h3>
                  <p>Keluhan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-bullhorn"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/data_keluhan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div> <?php } ?>

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3><?php if($admin_kode == '5'){ echo $tampil_konsultasi_admin_ht;} else{  echo $tampil_konsultasi_ht;} ?></h3>
                  <p>Konsultasi</p>
                </div>
                <div class="icon">
                  <i class="fa fa-balance-scale"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/data_konsultasi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php if($admin_kode == '5'){ echo $tampil_bh_admin_ht;} else{  echo $tampil_bh_ht;} ?></h3>
                  <p>Bantuan Hukum dan Mediasi</p>
                </div>
                <div class="icon">
                  <i class="fa fa-key"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/data_bh" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- /.col -->
          </div>
          <!-- /.row -->

          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
