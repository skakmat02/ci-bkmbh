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
              <li><a href="<?php echo base_url(); ?>admin/data_surat">Data Surat</a></li>
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
                <?php echo form_open('admin/update_data_surat'); ?>
                <?php
                foreach ($editdata as $data):
                ?>

                  <div class="form-group" >
                    <label for="exampleInputEmail1">Isi </label>
                      <textarea onkeyup="resizeTextarea('isi_surat')" id="isi_surat" class="form-control" name="isi_surat" placeholder="isi_surat" required > <?php echo $data->isi_surat ?></textarea>
                  </div>



                  <div class="form-group" >
                    <?php  $admin_kode = $this->session->userdata('admin_kode');
                  if ($admin_kode== 5 ) { ?>
                    <label for="exampleInputEmail1">Status</label>
                    <select  name="status" id="status" class="form-control" >
                    <option value="<?php echo $data->status ?>"><?php echo $data->status ?></option>
                    <option value="">Belum Dibaca</option>
                    <option  value="Dibaca">Sudah Dibaca</option></select
                  <?php }else{ ?>
                      <input readonly type="hidden" value="<?php echo $data->status ?>" class="form-control" name="status"/> <?php } ?>
                   </div>

                   <div class="form-group" >
                     <input readonly type="hidden" value="<?php echo $data->tgl_surat; ?>" class="form-control" name="tgl_surat"/>
                    </div>


                   <div class="form-group" >
                       <input readonly type="hidden" value="<?php echo $data->id_surat ?>" class="form-control" name="id"/>
                    </div>




                  <div class="form-group">
                    <div class="form-group" >
                      <label for="exampleInputEmail1">Nama Pengirim</label>
                        <input readonly type="text" value="<?php echo $data->nama ?>" class="form-control" name="nama"/>
                     </div>
                  </div>
                  <div class="form-group">
                    <div class="form-group" >
                      <label for="exampleInputEmail1">Alamat</label>
                        <input readonly type="text" value="<?php echo $data->alamat ?>" class="form-control" name="alamat"/>
                     </div>
                  </div>
                  <div class="form-group">
                    <div class="form-group" >
                      <label for="exampleInputEmail1">Email</label>
                        <input readonly type="text" value="<?php echo $data->email ?>" class="form-control" name="email"/>
                     </div>
                  </div>

                  <div class="form-group">
                    <div class="form-group" >
                      <label for="exampleInputEmail1">No. HP</label>
                        <input readonly type="text" value="<?php echo $data->no_hp ?>" class="form-control" name="no_hp"/>
                     </div>
                  </div>

                  <a href="<?php echo base_url(); ?>admin/data_surat" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" id="simpan" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>

              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>
