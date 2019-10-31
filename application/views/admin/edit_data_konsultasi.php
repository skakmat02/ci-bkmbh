<script>
function resizeTextarea (id) {
  var a = document.getElementById(id);
  a.style.height = 'auto';
  a.style.height = a.scrollHeight+'px';
}

function init() {
  var a = document.getElementsByTagName('textarea');
  for(var i=0,inb=a.length;i<inb;i++) {
     if(a[i].getAttribute('data-resizable')=='true')
      resizeTextarea(a[i].id);
  }
}

addEventListener('DOMContentLoaded', init);

</script>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Edit
              <small>Data</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/data_konsultasi">Data Konsultasi</a></li>
              <li class="active">Edit</li>
              <!--
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
              -->
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Edit Data</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('admin/update_data_konsultasi'); ?>
                <?php
                foreach ($editdata as $data):
                ?>

                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori</label>
                    <select  name="kategori" id="kategori" class="form-control" required>
                    <option value="<?php echo $data->kategori ?>"><?php echo $data->kategori ?></option>
                    <option  value="Hukum Perdata">Hukum Perdata</option>
                    <option  value="Hukum Pidana">Hukum Pidana</option>
                    <option  value="Hukum Kenegaraan">Hukum Kenegaraan</option>
                    <option  value="Hukum Ketenagakerjaan">Hukum Ketenagakerjaan</option>
                    <option  value="Hukum Perusahaan">Hukum Perusahaan</option>
                    <option  value="Hukum Pertahanan dan Perumahan">Hukum Pertahanan dan Perumahan</option>
                    <option  value="Hukum Perlindungan Konsumen">Hukum Perlindungan Konsumen</option>
                    <option  value="Hak Kekayaan Intelektual">Hak Kekayaan Intelektual</option>
                    <option  value="Hukum Adat">Hukum Adat</option>
                    <option  value="Hukum Islam">Hukum Islam</option>
                    <option  value="Hukum Kesehatan">Hukum Kesehatan</option>
                    </select>
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Isi Konsultasi</label>
                      <textarea onkeyup="resizeTextarea('isi_konsultasi')" id="isi_konsultasi" class="form-control" name="isi_konsultasi" placeholder="Isi Konsultasi" required > <?php echo $data->isi_konsultasi ?></textarea>
                  </div>

                  <div class="form-group" >
                    <?php  $admin_kode = $this->session->userdata('admin_kode');
                  if ($admin_kode== 5 ) { ?>
                    <label for="exampleInputEmail1">Tanggapan</label>
                    <textarea onkeyup="resizeTextarea('tanggapan')" id="tanggapan" class="form-control" name="tanggapan" placeholder="Tanggapan"/><?php echo $data->tanggapan ?></textarea><?php }else{ ?>
                        <textarea readonly onkeyup="resizeTextarea('tanggapan')" id="tanggapan" class="form-control" name="tanggapan" placeholder="<?php if($data->tanggapan==''){echo 'Belum Ditanggapi';}else{echo ucwords($data->tanggapan);} ?>"/><?php echo $data->tanggapan ?></textarea> <?php } ?>
                   </div>

                  <div class="form-group" >
                    <?php  $admin_kode = $this->session->userdata('admin_kode');
                  if ($admin_kode== 5 ) { ?>
                    <label for="exampleInputEmail1">Status</label>
                    <select  name="status" id="status" class="form-control" >
                    <option value="<?php echo $data->status ?>"><?php echo $data->status ?></option>
                    <option value="">Open</option>
                    <option  value="Closed">Closed</option></select
                  <?php }else{ ?>
                      <input readonly type="hidden" value="<?php echo $data->status ?>" class="form-control" name="status"/> <?php } ?>
                   </div>

                   <div class="form-group" >
                     <input readonly type="hidden" value="<?php echo $data->tgl_konsultasi; ?>" class="form-control" name="tgl_konsultasi"/>
                    </div>

                    <div class="form-group" >
                      <?php  $admin_kode = $this->session->userdata('admin_kode');
                    if ($admin_kode== 5 ) { ?>
                        <input readonly type="hidden" value="<?php echo date("Y/m/d h:i:sa") ; ?>" class="form-control" name="tgl_tanggapan"/><?php }else{ ?>
                        <input readonly type="hidden" value="<?php echo $data->tgl_tanggapan ?>" class="form-control" name="tgl_tanggapan"/> <?php } ?>
                     </div>

                   <div class="form-group" >
                       <input readonly type="hidden" value="<?php echo $data->id_konsultasi ?>" class="form-control" name="id"/>
                    </div>



                     <div class="form-group" >
                         <input readonly type="hidden" value="<?php echo $data->id_user ?>" class="form-control" name="id_user"/>
                      </div>

                  <div class="form-group">
                    <?php  $admin_kode = $this->session->userdata('admin_kode');
                  if ($admin_kode== 5 ) { ?>
                  <input readonly type="hidden" value="<?php  echo $this->session->userdata('admin_id');?>" class="form-control" name="id_ut" placeholder="<?php  echo $this->session->userdata('admin_id');?>"/> <?php }else{ ?>
                     <input readonly type="hidden" value="<?php echo $data->id_ut ?>" class="form-control" name="id_ut"/> <?php } ?>
                  </div>

                  <div class="form-group">
                    <?php  $admin_kode = $this->session->userdata('admin_kode');
                  if ($admin_kode== 5 ) {

                    $sql ="SELECT * FROM tb_login WHERE id_user = '$data->id_user'";
                    $query = $this->db->query($sql);
                    if ($query->num_rows() > 0) {
                      foreach ($query->result() as $row) {?>
                        <label for="exampleInputEmail1">Nama Pengguna</label>
                        <input readonly type="text" value="<?php  echo $row->nama;?>" class="form-control" name="nama_pengguna" placeholder="<?php echo $row->nama;?>"/>
                  <?php }}} ?>
                  </div>



                  <a href="<?php echo base_url(); ?>admin/data_konsultasi" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" id="simpan" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>

              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>
