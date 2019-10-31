<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Konsultasi
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Konsultasi</li>
          </ol>
          <br/>
          <?php echo $this->session->flashdata('success'); ?><?php echo $this->session->flashdata('error'); ?>
        </section>

        <!-- Main content -->
        <section class="content">

        	<div class="row">
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                  <a href="<?php echo base_url(); ?>admin/tambah_data_konsultasi" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
                  </h3>
                  <div class="box-tools">
                  	<!--
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    -->
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Isi</th>
                        <th>Kategori</th>
                        <th>Tanggal Konsultasi</th>
                        <th>Tanggapan</th>
                        <th>Tanggal Tanggapan</th>
                      <th>Status</th>


                        <th>Aksi</th>
                    </thead>
                    <tbody>
                      	<?php
                          $no = 1;

                        $admin_kode = $this->session->userdata('admin_kode'); if ($admin_kode == '5') {
                            foreach ($tampil_konsultasi_admin as $lihat) :
                          ?>
                    	<tr>
                        <td><?php echo $no++ ?></td>
                    	<td><?php echo ucwords($lihat->id_konsultasi) ?></td>
                      <td><?php echo ucwords($lihat->isi_konsultasi) ?></td>
                      <td><?php echo ucwords($lihat->kategori) ?></td>
                      <td><?php echo ucwords($lihat->tgl_konsultasi) ?></td>
<td><?php if($lihat->tanggapan==''){echo 'Belum Ditanggapi';}else{echo ucwords($lihat->tanggapan);} ?></td>
  <td><?php if($lihat->tgl_tanggapan==''){echo 'Belum Ditanggapi';}else{echo ucwords($lihat->tgl_tanggapan);} ?></td>
                    <td><?php if($lihat->status==''){echo 'Open';}else{echo ucwords($lihat->status);} ?></td>


                        <td align="center">
                          <div class="btn-group" role="group">
                            <a href="<?php echo base_url(); ?>admin/edit_data_konsultasi/<?php echo $lihat->id_konsultasi ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                            <a href="<?php echo base_url(); ?>admin/hapus_data_konsultasi/<?php echo $lihat->id_konsultasi ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
                          </div>
                        </td>
                    	</tr>
                    <?php endforeach;
                        } else {
                            foreach ($tampil_konsultasi as $lihat) :
                    ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo ucwords($lihat->id_konsultasi) ?></td>
                    <td><?php echo ucwords($lihat->isi_konsultasi) ?></td>
                    <td><?php echo ucwords($lihat->kategori) ?></td>
                    <td><?php echo ucwords($lihat->tgl_konsultasi) ?></td>
<td><?php if($lihat->tanggapan==''){echo 'Belum Ditanggapi';}else{echo ucwords($lihat->tanggapan);} ?></td>
<td><?php if($lihat->tgl_tanggapan==''){echo 'Belum Ditanggapi';}else{echo ucwords($lihat->tgl_tanggapan);} ?></td>
                  <td><?php if($lihat->status==''){echo 'Open';}else{echo ucwords($lihat->status);} ?></td>


                    <td align="center">
                      <div class="btn-group" role="group">
                      <?php if($lihat->status==''){ ?>  <a href="<?php echo base_url(); ?>admin/edit_data_konsultasi/<?php echo $lihat->id_konsultasi ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                        <?php if($lihat->tanggapan==''){ ?> <a href="<?php echo base_url(); ?>admin/hapus_data_konsultasi/<?php echo $lihat->id_konsultasi ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a><?php } } else { echo '-'; } ?>
                      </div>
                    </td>
                  </tr>
                <?php endforeach;
                        }?>
                    </tbody>
                  </table>


                </div><!-- /.box-body -->
                </div>
             </div>
          </div>



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
